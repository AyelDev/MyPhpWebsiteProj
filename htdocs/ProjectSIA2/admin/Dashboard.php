<?php
include "../connection_db.php";
include "../config.php";

//if directly access the Dashboard page will automatically directed to login page
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php"); // Redirect to the login page
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link type="text/css" rel="stylesheet" href="/ProjectSIA2/materialize/css/materialize.css"
        media="screen,projection" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<?php
$admin = 0;
$sql = "SELECT * FROM admin";
$results = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($results)) {
    $admin++;
}

$staff = 0;
$sql = "SELECT * FROM staff";
$results = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($results)) {
    $staff++;
}

$user = 0;
$sql = "SELECT * FROM user";
$results = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($results)) {
    $user++;
}


$totalBooks = 0;
$sql = "SELECT book_id FROM admin_staff_library UNION SELECT book_id FROM user_library";
$results = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($results)){
    $totalBooks++;
}

$borrowedBooks = 0;
$sql = "SELECT book_id FROM admin_staff_library";
$results = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($results)){
    $borrowedBooks++;
}
?>

<body>


    <div class="mybackground">
        <nav>
            <div class="nav-wrapper white">
                <div class="row">
                    <div class="col s2">
                        <i class="black-text left">
                            <?php echo isset($_SESSION['admin']) ? "Hello Admin " . $_SESSION['admin'] : ''; ?>
                        </i>
                    </div>
                </div>




            </div>

            <!-- Navbar goes here -->

            <!-- Page Layout here -->
            <div class="row">

                <div class="col s2">
                    <ul class="left hide-on-med-and-down">
                        <li><a style="width:25vh" href="Admin_index.php">Home</a></li><br>
                        <li><a style="width:25vh" href="adminCreateAccount.php">Add User</a></li><br>
                        <li><a style="width:25vh" href="Table.php">Tables</a></li><br>
                        <li><a style="width:25vh" href="Dashboard.php">Dashboard</a></li><br>

                        <!-- Dropdown Trigger -->
                        <li><a class='dropdown-trigger btn' style="width:20vh" href='#'
                                data-target='dropdown1'>Courses</a></li>

                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><a href="Admin_library.php">Library</a></li>
                            <li class="divider" tabindex="-1"></li>
                            <li><a href="Add_books.php">Add Books</a></li>
                        </ul>
                        <li><a style="width:25vh" href="/ProjectSIA2/Logout.php">Logout</a></li><br>
                    </ul>
                </div>

                <div class="col s9 center">
                    <!-- Teal page content  -->


                    <h1>Number of accounts</h1>

                </div>

                <style>
                    .row .col {
                        margin-right: 10px;
                        /* Adjust the margin as needed */
                    }
                </style>

                <div class="row">
                    <div class="col s11 m5 l3 card">
                        <h4 class="teal-text center">No. of Admin :
                            <?php echo $admin; ?>
                        </h4>
                        <h4 class="teal-text center">No. of Staff :
                            <?php echo $staff; ?>
                        </h4>
                        <h4 class="teal-text center">No. of User :
                            <?php echo $user ?>
                        </h4>
                    </div>
                    <div class="col s11 m5 l3 card">
                        <h4 class="teal-text center">No. of Books :
                            <br><?php echo $borrowedBooks . "/" . $totalBooks; ?>
                        </h4>

                    </div>
                    <div class="col s11 m5 l3 card">
                        <h4 class="teal-text center">Soon :
                            <?php //echo $user ?>
                        </h4>


                    </div>
                </div>



            </div>
        </nav>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems);
        });
    </script>
    <script type="text/javascript" src="/ProjectSIA2/materialize/js/materialize.js"></script>
</body>

</html>