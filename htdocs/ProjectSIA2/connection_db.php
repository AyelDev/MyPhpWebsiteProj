<?php
$lname="127.0.0.2:3307";
$uname="root";
$password="";
$dbname="siap_login";


$conn = mysqli_connect($lname, $uname, $password, $dbname);

if(!$conn){
    echo "connection failed";
}
?>