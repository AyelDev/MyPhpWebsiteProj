<?php
include "../connection_db.php";
include "../config.php";

//if directly access the Admin index page will automatically directed to login page
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
    <title>Admin Page</title>
</head>

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
                        <li><a style="width:25vh" href="adminBorrowList.php">Borrow List</a></li><br>

                        <!-- Dropdown Trigger -->
                        <li><a class='dropdown-trigger btn' style="width:20vh" href='#' data-target='dropdown1'>Courses</a></li>

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
                    <h1>Hello this is for admin page.</h1>
                </div>
            </div>
        </nav>
    </div>



    <!--JavaScript at end of body for optimized loading-->
    <script>
          document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
  });
    </script>
    <script type="text/javascript" src="/ProjectSIA2/materialize/js/materialize.js"></script>
    <!-- Jquery -->
    <script type="text/javascript" src="/ProjectSIA2/jquery/jquery.js"></script>
</body>

</html>