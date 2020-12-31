<?php
$host = 'localhost';
$dbname = 'admin';
$username = 'root';
$password = '';

$con = mysqli_connect($host, $username,$password, $dbname);

if($con)
{
    echo "";
}else{
    echo "Server and Database Not Connected";
}


?>