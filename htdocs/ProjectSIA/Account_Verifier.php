<?php
include "connection_db.php";



if(isset($_POST['submit'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $Username = validate($_POST['username']);
    $Password = validate($_POST['password']); 
    
        $sqlUser = "SELECT * FROM user WHERE username='$Username' AND password='$Password'";
        $result = mysqli_query($conn, $sqlUser);
        $sqlAdmin = "SELECT * FROM admin WHERE username='$Username' AND password='$Password'";
        $resultAdmin = mysqli_query($conn, $sqlAdmin);
        

    if(empty($Username) && !empty($Password)){
        header("Location: login.php?error=Username is Required");
        exit();
    }elseif(empty($Username) && empty($Password)){
        header("Location: login.php?error=Please fill out some form");
    }elseif(empty($Password) && !empty($Username)){
        header("Location: login.php?error=Password is Required");
        exit(); 
    }else{
        

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $Name = $row['name'];
            header("Location: index.php");
        }elseif(mysqli_num_rows($resultAdmin) > 0){
            $row = mysqli_fetch_assoc($resultAdmin);
            $Name = $row['name'];
            header("Location: Admin_index.php");
        } else {
            header("Location: login.php?error=Invalid Username or Password");
            exit();
        }
    }
}else{
    header("Location: login.php?error");
    exit(); 
}
?>