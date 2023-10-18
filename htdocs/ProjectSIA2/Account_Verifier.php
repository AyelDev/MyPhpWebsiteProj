<?php
include "connection_db.php";
include "config.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //isset($_POST['submit'])
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
    $sqlStaff = "SELECT * FROM staff WHERE username='$Username' AND password='$Password'";
    $resultStaff = mysqli_query($conn, $sqlStaff);

      

    if(empty($Username) && !empty($Password)){
        header("Location: login.php?error=Username is Required");
    }elseif(empty($Username) && empty($Password)){
        header("Location: login.php?error=Please fill out some form");
    }elseif(empty($Password) && !empty($Username)){
        header("Location: login.php?error=Password is Required");
        exit(); 
    }else{


        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $Name = $row['name'];
            $_SESSION['user']=$Name;
            header("Location: user/index.php");
        }elseif(mysqli_num_rows($resultAdmin) > 0){
            $row = mysqli_fetch_assoc($resultAdmin);
            $adminName = $row['name'];
            $_SESSION['admin']=$adminName;
            header("Location: admin/Admin_index.php");
            
           
        }elseif(mysqli_num_rows($resultStaff) > 0){
            $row = mysqli_fetch_assoc($resultStaff);
            $staffName = $row['name'];
            $_SESSION['staff']=$staffName;  
            header("Location: staff/Staff_index.php");
        }else{
            header("Location: login.php?error=Invalid Username or Password");
            exit();
        }


    }
}else{
    header("Location: login.php?error");
    exit(); 
}
?>