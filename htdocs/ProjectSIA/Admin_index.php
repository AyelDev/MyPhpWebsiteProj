<?php
include "connection_db.php";
include "config.php";

//if directly access the Admin index page will automatically directed to login page
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect to the login page
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css" media="screen,projection" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>
    <div class="mybackground"><br>



        <div class="row">


            <div class="col s2">
                <div class="grid-example col s12 white card-panel">
                    <h5><?php echo isset($_SESSION['admin']) ? "Hello Admin " . $_SESSION['admin'] : '' ; ?></h5>
                </div>
                <!-- Promo Content 1 goes here -->
                <a href="Admin_index.php" class="white-text">Home</a><br>
                <a href="Logout.php" class="white-text">Logout</a><br>
                <a href="Table.php" class="white-text">Tables</a><br>
                <a href="Dashboard.php" class="white-text">Dashboard</a>

            </div>
            <div class="col s3">
                <h1>asdsad</h1>
            </div>



        </div>





    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
</body>

</html>