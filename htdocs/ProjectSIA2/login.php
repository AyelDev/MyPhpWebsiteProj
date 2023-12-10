<?php
include "connection_db.php";
include "config.php";

//checks the date return books
require('returnBookChecker.php');

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
    </style>
    <!-- for background -->
    <div class="mybackground">
        
        <section>

            <div class="container"><br><br><br><br><br><br><br><br><br><br><br><br>






                <div class="row">
                    
                    <div class="col s6">
                        <img src="/ProjectSIA2/admin/adminLogo/cec.png" alt="">
                        <!-- <h3 class="white-text center">Welcome!</h3> -->

                    </div>




                    <div class="col s6">
                        <!-- card panel -->
                        <div class="card-panel">
                            <p>
                                <?php
                                echo isset($_GET['error']) ? "<p class=red-text>" . $_GET['error'] . "</p>" : '';
                                echo isset($_GET['success']) ? "<p class=teal-text>" . $_GET['success'] . "</p>" : '';
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