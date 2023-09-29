<?php

$lname="localhost";
$uname="root";
$password="";
$dbname="sia_login";


$conn = mysqli_connect($lname, $uname, $password, $dbname);

if(!$conn){
    echo "connection failed";
}
?>