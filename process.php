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

        header("location:index.php");
    }else{
        header("location:signup.php");

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