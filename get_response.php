<?php 
include("connection.php");


// contactmail
if((isset($_POST['your_name'])&& $_POST['your_name'] !='') && (isset($_POST['your_email'])&& $_POST['your_email'] !=''))
{
 include("contact_mail.php");

$yourName = $con->real_escape_string($_POST['your_name']);
$yourEmail = $con->real_escape_string($_POST['your_email']);
$yourPhone = $con->real_escape_string($_POST['your_phone']);
$comments = $con->real_escape_string($_POST['comments']);

$sql = "INSERT INTO contact_form_info(firstName,email, phone, comments)VALUES('$yourName','$yourEmail','$yourPhone','$comments')";

if($con->query($sql)) {

    echo "There was an error running the query";

	}else{
    echo "Thank you! We will contact you soon";

    }

}else{
  echo "Please fill Name and Email";

}
?>