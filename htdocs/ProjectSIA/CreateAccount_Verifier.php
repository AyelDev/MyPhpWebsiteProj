<?php
include "connection_db.php";

if(isset($_REQUEST['submit'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $Username = validate($_POST['username']);
    $Password = validate($_POST['password']);
    $conPassword = validate($_POST['confrmpassword']);
    $Name = validate($_POST['name']);
    $Type = validate($_POST['type']);

     if(empty($Username) && !empty($Password) && !empty($conPassword) && !empty($Name) && !empty($Type)){
        header("Location:CreateAccount.php?errror=Username is required");
        exit();
    }elseif(!empty($Username) && empty($Password) && !empty($conPassword) && !empty($Name) && !empty($Type)){
        header("Location:CreateAccount.php?errror=Password is required");
        exit();
    }elseif(!empty($Username) && !empty($Password) && empty($conPassword) && !empty($Name) && !empty($Type)){
        header("Location:CreateAccount.php?error=Confirm password is required");
        exit();
    }elseif(empty(!$Username) && !empty($Password) && !empty($conPassword) && empty($Name) && !empty($Type)){
        header("Location:CreateAccount.php?error=Name is required");
        exit();
    }elseif(empty($Username && empty($Password && empty($conPassword && empty($Name && empty($Type)))))){
        header("Location:CreateAccount.php?error=Please fill up the form");
        exit();
    }elseif($Password != $conPassword){
        header("Location:CreateAccount.php?error=Password and Confirm password is not matched");
    }else{
        if($Type == "user"){
            $sqlCreateUser = "INSERT INTO user (username, password, name) VALUES ('$Username', '$Password', '$Name')";
            $resultUser = mysqli_query($conn, $sqlCreateUser);
           // $row = mysqli_fetch_assoc($resultUser);
           
            header("Location: CreateAccount.php");
            //echo "<p>Account has been created for User</p>";
            
        }elseif($Type == "staff"){
            $sqlCreateStaff = "INSERT INTO staff (username, password, staff_name) VALUES ('$Username', '$Password', '$Name')";
            $resultStaff = mysqli_query($conn, $sqlCreateStaff);
            //$row = mysqli_fetch_assoc($resultStaff);
            header("Location: CreateAccount.php");
            //echo "<p>Account has been created for Staff</p>";
        }else{
            header("Location: CreateAccount.php?error=Please fill-up the type");
        }
    }

}else{
    header("Location:CreateAccount.php?error?");
}

?>