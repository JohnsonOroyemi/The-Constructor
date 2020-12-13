<?php
include("connection.php");

$sql = "CREATE TABLE user (
    userId int(11) AUTO_INCREMENT PRIMARY KEY,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    emailAddress varchar(100) NOT NULL,
    passwd varchar(100) NOT NULL,
    datecreated varchar(10) NOT NULL
  )";
  if (mysqli_query($con, $sql)) {
    echo "User Table created successfully<br>";
}
 else {
    echo "Error creating User table: " . mysqli_error($con)."<br>";
}


$sql = "CREATE TABLE newpost (
    ID int(11) AUTO_INCREMENT PRIMARY KEY,
    PostImage varchar(225) NOT NULL,
    PostHeading varchar(50) DEFAULT NULL,
    SubHeading varchar(200) DEFAULT NULL,
    PostContent text DEFAULT NULL,
    Author varchar(50) DEFAULT NULL,
    PostingDate datetime DEFAULT NULL,
    PostedBy int(11),
    FOREIGN KEY(PostedBy)
        REFERENCES user(userId)
  )";
  if (mysqli_query($con, $sql)) {
    echo "newpost Table created successfully<br>";
}
 else {
    echo "Error creating User table: " . mysqli_error($con)."<br>";
}

  


?>