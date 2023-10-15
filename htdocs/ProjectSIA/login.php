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
    <style>
    .btn {
        margin-right: 10px;
        /* Adjust the margin as needed */
    }

    * {
        margin: 0;
        padding: 0;
    }

    section {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
    }

    section .air {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100px;
        background: url("image/wave.png");
        background-size: 1000px 100px
    }

    section .air.air1 {
        animation: wave 30s linear infinite;
        z-index: 1000;
        opacity: 1;
        animation-delay: 0s;
        bottom: 0;
    }

    section .air.air2 {
        animation: wave2 15s linear infinite;
        z-index: 999;
        opacity: 0.5;
        animation-delay: -5s;
        bottom: 10px;
    }

    section .air.air3 {
        animation: wave 30s linear infinite;
        z-index: 998;
        opacity: 0.2;
        animation-delay: -2s;
        bottom: 15px;
    }

    section .air.air4 {
        animation: wave2 5s linear infinite;
        z-index: 997;
        opacity: 0.7;
        animation-delay: -5s;
        bottom: 20px;
    }

    @keyframes wave {
        0% {
            background-position-x: 0px;
        }

        100% {
            background-position-x: 1000px;
        }
    }

    @keyframes wave2 {
        0% {
            background-position-x: 0px;
        }

        100% {
            background-position-x: -1000px;
        }
    }
    </style>
    <!-- for background -->
    <div class="mybackground">
        <section>
            <div class='air air1'></div>
            <div class='air air2'></div>
            <div class='air air3'></div>
            <div class='air air4'></div>
            <div class="container"><br><br><br><br><br><br><br><br><br><br><br><br>






                <div class="row">

                    <div class="col s6">
                        <h1 class="white-text center">Welcome!</h1>
                    </div>




                    <div class="col s6">
                        <!-- card panel -->
                        <div class="card-panel">
                            <p>
                                <?php 
                              echo isset($_GET['error']) ? "<p class=red-text>".$_GET['error']."</p>" : '' ;
                              echo isset($_GET['success']) ? "<p class=teal-text>".$_GET['success']."</p>" : '' ;
                              ?>
                            </p>


                            <form action="Account_Verifier.php" method="post">

                                <!-- animation text Username-->
                                <div class="input-field col s12 ">
                                    <label class="teal-text" for="name">Username</label>
                                    <input type="text" name="username">
                                </div>

                                <!-- animation text Password-->
                                <div class="input-field col s12">
                                    <label class="teal-text">Password</label>
                                    <input type="password" name="password" id="show">
                                </div>

                                <div>
                                    <label>
                                        <input type="checkbox" onclick="myfunction()" />
                                        <span class="teal-text">Show Password</span>
                                    </label>
                                </div><br>

                                <div>
                                    <input class="btn" type="submit" name="submit" value="login">
                                    <a href="CreateAccount.php" class="btn blue">Create
                                        Account</a>
                                </div>



                            </form>



                        </div>
                    </div>
                </div>




            </div>
        </section>
    </div>



    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
    <!-- my color pallete -->
    <!-- https://coolors.co/palette/264653-2a9d8f-e9c46a-f4a261-e76f51 -->
</body>

</html>