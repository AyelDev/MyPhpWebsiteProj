<?php
include "connection_db.php";
session_start();
//admin default password and user
$adminUsername = "admin";
$adminPassword = "admin";
$adminName = "Ariel";

//to check if already exist
$sql = "SELECT * FROM admin WHERE username = '$adminUsername'";
$admin_result = mysqli_query($conn, $sql);
if ($admin_result === false) {
    echo "Error: " . mysqli_error($conn);
} elseif (mysqli_num_rows($admin_result) == 0) {
    
    $insert_admin_query = "INSERT INTO admin (username, password, name) VALUES ('$adminUsername', '$adminPassword', '$adminName')";
    
    if (mysqli_query($conn, $insert_admin_query)) {
        header("Location: login.php?success=Default Admin has been created");
    } else {
        echo "Error: " . mysqli_error($conn);
    }


  
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <label>
        <?php 
        echo isset($_GET['error']) ? $_GET['error'] : '' ;
        echo isset($_GET['success']) ? $_GET['success'] : '' ;
        ?>
    </label>

    <form action="Account_Verifier.php" method="post">

        <label for="name">Username</label>
        <input type="text" name="username">
        <label>Password</label>
        <input type="password" name="password">
        <button type="submit" name="submit">
        <p>Login</p>
        </button>
        <a href="CreateAccount.php">Create Account</a>

    </form>

</body>

</html>