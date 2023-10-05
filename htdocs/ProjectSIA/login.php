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
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css" media="screen,projection" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <!-- for background -->
    <div class="mybackground">
        <div class="container"><br><br><br><br><br><br><br><br><br>





            <div class="row">

                <div class="col s6">
                    <h1 class="white-text center">Welcome!</h1>
                </div>




                <div class="col s6">
                    <!-- card panel -->
                    <div class="card-panel">
                        <label class="teal-text">
                            <?php 
                              echo isset($_GET['error']) ? $_GET['error'] : '' ;
                              echo isset($_GET['success']) ? $_GET['success'] : '' ;
                              ?>
                        </label>


                        <form action="Account_Verifier.php" method="post">

                            <!-- animation text Username-->
                            <div class="input-field col s12 ">
                                <label class="teal-text" for="name">Username</label>
                                <input type="text" name="username">
                            </div>

                            <!-- animation text Password-->
                            <div class="input-field col s12">
                                <label class="teal-text">Password</label>
                                <input type="password" name="password">
                            </div>


                            <input class="btn" type="submit" name="submit">

                            <a href="CreateAccount.php" onclick="M.toast({html: 'I am a toast'})" class="btn">Create
                                Account</a>
                        </form>
                    </div>
                </div>
            </div>




        </div>

    </div>



    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
    <!-- my color pallete -->
    <!-- https://coolors.co/palette/264653-2a9d8f-e9c46a-f4a261-e76f51 -->
</body>

</html>