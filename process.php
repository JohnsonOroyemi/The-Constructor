<?php
session_start();
include("connection.php");
$statusMsg = '';
    

/**
 * Creating User
 */
if(isset($_POST["create_user"]))
{
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $datecreated = date('d-m-Y');
    

    //add to table
    $sql = "INSERT INTO User(firstName,lastName,emailAddress,passwd,datecreated)VALUES('$firstname','$lastname','$email','$password','$datecreated')";
   
    if($con->query($sql))
	{
    //echo 'congrates!! data saved';
    header("location:signin.php?r=congrates!!+Check+your+mail+to+Activate+your+Account");

	}else{
        echo 'oop!! data not saved';

    }

}

if(isset($_POST["login"]))
{ 
    $username = $_POST["username"];
    $password = $_POST["password"];
    //echo $username." - ".$password;
    //add to table
    $sql = "SELECT * from User where emailAddress = '$username' and passwd = '$password'";
    $result = $con->query($sql);
    //print_r($result);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        $_SESSION["user_id"] = $row["userId"];
        $_SESSION["firstname"] = $row["firstName"];
        $_SESSION["lastname"] = $row["lastName"];
        $_SESSION["email"] = $row["emailAddress"];

        if ($_SESSION["user_id"]!= 2){ 
          header("location:index.php");
          exit;
        }
        else if ($_SESSION["user_id"] == 2){
        header("location:dashboard.php");
        exit;
        }
        
        } else{
          header("location:signup.php");
          exit;

    }
  }

 
/**
 * Adding post to table
 */
if(isset($_POST["addPost"]) && !empty($_FILES["file"]["name"])) 
{
    $postHeading =  $_POST["postHeading"];
    $subHeading =  $_POST["subHeading"];                                                                                
    $postContent =  $_POST["postContent"];
    $author =  $_POST["author"];
    $postDate =  $_POST["postDate"];
    $postedby =  $_SESSION["user_id"];
    

    // File upload path
    $targetDir = "asset/uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
    
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                // $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
                $sql = "INSERT INTO newpost(PostImage,PostHeading,SubHeading,PostContent,Author,PostingDate,PostedBy)VALUES('".$fileName."','$postHeading','$subHeading','$postContent','$author',NOW(),'$postedby')";

                if($con->query($sql)){
                  //echo 'congrates!! data saved';
                  header("location:add_post.php?r=congrats!!+post+added");
                }else{
                  $statusMsg = 'oop!! post not added';
                }

                // if($insert){
                //     $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                // }else{
                //     $statusMsg = "File upload failed, please try again.";
                // } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
}else{
    $statusMsg = 'Please select a file to upload.';
}

    // Display status message
echo $statusMsg;


/**
 * Updating/Editing post 
 */

if(isset($_POST["update"])) 
{    
    $fileName = $_FILE["file"]["name"];
    $postHeading =  $_POST["postHeading"];
    $subHeading =  $_POST["subHeading"];
    $postContent =  $_POST["postContent"];
    $author =  $_POST["author"];
    $postDate =  $_POST["postDate"];
    //$postedby =  $_SESSION["user_id"];
    $id = $_POST["id"];

    $targetDir = "asset/uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
    
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
    //echo $postHeading;

    $sql = "UPDATE newpost SET PostImage = '$fileName',
                               PostHeading ='$postHeading',
                               SubHeading = '$subHeading',
                               PostContent = '$postContent',
                               Author = '$author',
                               PostingDate = NOW()
                                WHERE ID = '$id' ";


    if($con->query($sql)){
      //echo 'congrates!! data saved';
      header("location:view_post.php?r=congrats!!+post+updated");
    }else{
          echo 'oop!! post not updated';
    }
}
    }
  }


 // delete comment fromd database
 if (isset($_GET['delete'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM newpost WHERE id=$id";

  if($con->query($sql)){
    //echo 'congrates!! data saved';
    header("location:view_post.php?r=congrats!!+post+deleted");
  }else{
        echo 'oop!! post cannot be deleted';
  }

  // mysqli_query($conn, $sql);
  // exit();
}


//Paystack Payment Gateway
$curl = curl_init();

if(isset($_POST["pay"]))
{
$email = $_POST["email"];;
$amount = 100000;  //the amount in kobo. This value is actually NGN 1000
$transactionreference = ""; 

// url to go to after payment
$callback_url = 'blog/index.php';  

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'email'=>$email,
    'callback_url' => $callback_url
  ]),
  CURLOPT_HTTPHEADER => [
    "authorization: Bearer sk_test_8826aa03a5db3ae8ab956f88b9d4214e4d14e9d4", //replace this with your own test key
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response, true);

if(!$tranx['status']){
  // there was an error from the API
  print_r('API returned error: ' . $tranx['message']);
}

// comment out this line if you want to redirect the user to the payment page
print_r($tranx);
// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $tranx['data']['authorization_url']);



//VERIFICATION
//check if request was made with the right data
if(!$_SERVER['REQUEST_METHOD'] == 'POST' || !isset($_POST['reference'])){  
  die("Transaction reference not found");
}

//set reference to a variable @ref
$reference = $_POST['reference'];

//The parameter after verify/ is the transaction reference to be verified
$url = 'https://api.paystack.co/transaction/verify/'.$reference;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
  $ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer sk_test_8826aa03a5db3ae8ab956f88b9d4214e4d14e9d4']
);

//send request
$request = curl_exec($ch);
//close connection
curl_close($ch);
//declare an array that will contain the result 
$result = array();

if ($request) {
  $result = json_decode($request, true);
}

if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
  echo "success";
	//Perform necessary action
}else{
  echo "Transaction was unsuccessful";
}
}



// define variables and set to empty values
/*$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
*/


?>