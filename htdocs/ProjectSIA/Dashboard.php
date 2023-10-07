<?php
include "connection_db.php";
include "config.php";

//if directly access the Dashboard page will automatically directed to login page
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
    <title>Dashboard</title>
</head>

<?php
    $admin=0;    
    $sql = "SELECT * FROM admin";
    $results = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($results)) {
    $admin++;
    }

    $staff=0;    
    $sql = "SELECT * FROM staff";
    $results = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($results)) {
    $staff++;
    }

    $user=0;    
    $sql = "SELECT * FROM user";
    $results = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($results)) {
    $user++;
    }
    ?>

<body>


    <div class="mybackground">
        <nav>
            <div class="nav-wrapper white">
                <div class="row">
                    <div class="col s2">
                        <i
                            class="black-text left"><?php echo isset($_SESSION['admin']) ? "Hello Admin " . $_SESSION['admin'] : '' ; ?></i>
                    </div>
                </div>




            </div>

            <!-- Navbar goes here -->

            <!-- Page Layout here -->
            <div class="row">

                <div class="col s2">

                    <ul class="left hide-on-med-and-down">

                        <li><a href="Admin_index.php">Home</a></li><br>
                        <li><a href="Table.php">Tables</a></li><br>
                        <li><a href="Dashboard.php">Dashboard</a></li><br>
                        <li><a href="Logout.php">Logout</a></li>
                    </ul>
                </div>

                <div class="col s9 center">
                    <!-- Teal page content  -->
                    <h3>Number of Admin : <?php echo $admin;?></h3>
                    <h3>Number of Staff : <?php echo $staff;?></h3>
                    <h3>Number of User : <?php echo $user?></h3>



                </div>





            </div>
        </nav>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
</body>

</html>