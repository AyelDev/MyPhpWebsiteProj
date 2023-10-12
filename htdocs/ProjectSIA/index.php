<?php
include "connection_db.php";
session_start();


//if directly access the index page will automatically directed to login page
if (!isset($_SESSION['user'])) {
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
    <title>User</title>

</head>

<body>
    <div class="mybackground">
        <div class="container">




            <nav>
                <div class="nav-wrapper teal    ">
                    <label
                        class="white-text"><?php echo isset($_SESSION['user']) ? "Hello " . $_SESSION['user'] : '' ;?></label>
                    <label for="">....</label>
                    <a href="Logout.php">Logout</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="sass.html">Sass</a></li>
                        <li><a href="badges.html">Components</a></li>
                        <li><a href="collapsible.html">JavaScript</a></li>





                    </ul>
                </div>
            </nav>

           <div class="row">
           <div class="col s12 m2">
           <p class="z-depth-4">z-depth-4</p>
    </div>
    <div class="col s12 m2">
    <p class="z-depth-4">z-depth-4</p>
    </div>
    <div class="col s12 m2">
    <p class="z-depth-4">z-depth-4</p>
    </div>
    <div class="col s12 m2">
      <p class="z-depth-4">z-depth-4</p>
    </div>
    <div class="col s12 m2">
    <p class="z-depth-4">z-depth-4</p>
    </div>
           </div>
    




            <!--JavaScript at end of body for optimized loading-->
            <script type="text/javascript" src="materialize/js/materialize.js"></script>
            <!-- Jquery -->
            <script type="text/javascript" src="jquery/jquery.js"></script>
</body>

</html>