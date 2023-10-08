<?php
include "connection_db.php";
include "config.php";


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
        header("Location: adminCreateAccount.php?error=Username is required");
        exit();
    }elseif(!empty($Username) && empty($Password) && !empty($conPassword) && !empty($Name) && !empty($Type)){
        header("Location: adminCreateAccount.php?error=Password is required");
        exit();
    }elseif(!empty($Username) && !empty($Password) && empty($conPassword) && !empty($Name) && !empty($Type)){
        header("Location: adminCreateAccount.php?error=Confirm password is required");
        exit();
    }elseif(empty(!$Username) && !empty($Password) && !empty($conPassword) && empty($Name) && !empty($Type)){
        header("Location: adminCreateAccount.php?error=Name is required");
        exit();
    }elseif(empty($Username && empty($Password && empty($conPassword && empty($Name && empty($Type)))))){
        header("Location:adminCreateAccount.php?error=Please fill up the form");
        exit();
    }elseif($Password != $conPassword){
        header("Location: adminCreateAccount.php?error=Password and Confirm password is not matched");
    }else{
        
        if($Type == "user"){
            $sql = "SELECT * FROM user WHERE username ='$Username'";
            $result = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($result);
            if($num_rows){
                header("Location: adminCreateAccount.php?error=Username already exist");
            }else{
            $sqlCreateUser = "INSERT INTO user (username, password, name) VALUES ('$Username', '$Password', '$Name')";
            $resultUser = mysqli_query($conn, $sqlCreateUser);
           // $row = mysqli_fetch_assoc($resultUser);
            header("Location: adminCreateAccount.php?success=Account has been created for User");
            
            }

        }elseif($Type == "staff"){
            $sql = "SELECT * FROM staff WHERE username ='$Username'";
            $result = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($result);
            if($num_rows){  
                header("Location: adminCreateAccount.php?error=Username already exist");
            }else{
            $sqlCreateStaff = "INSERT INTO staff (username, password, name) VALUES ('$Username', '$Password', '$Name')";
            $resultStaff = mysqli_query($conn, $sqlCreateStaff);
            //$row = mysqli_fetch_assoc($resultStaff);
            header("Location: adminCreateAccount.php?success=Account has been created for Staff");
            }
        }else{
            header("Location: adminCreateAccount.php?error=Please fill-up the other form/Type");
        }
    }

}else{
    header("Location:adminCreateAccount.php?error?");
}

?>