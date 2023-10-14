<?php
include "connection_db.php";
include "config.php";

//if directly access the Table page will automatically directed to login page
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
    <title>Table</title>
</head>

<body>
    <style>
    .btn {
        margin-right: 10px;
        /* Adjust the margin as needed */
    }
    </style>


    <div class="mytablebackground">

        <nav>
            <div class="nav-wrapper white">
                <div class="row">
                    <div class="col s2">
                        <i
                            class="black-text left"><?php echo isset($_SESSION['admin']) ? "Hello Admin " . $_SESSION['admin'] : '' ; ?></i>
                    </div>
                </div>




            </div>


           
            <div class="row">

                <div class="col s2 ">
                    <ul class="left hide-on-med-and-down">

                        <li><a href="Admin_index.php">Home</a></li><br>
                        <li><a href="Table.php">Tables</a></li><br>
                        <li><a href="Dashboard.php">Dashboard</a></li><br>
                        <li><a href="Logout.php">Logout</a></li>
                        <br><br><br><br><br>
                    </ul>
                </div>
                <div class="col s8">
                    <h4>User Table</h4>
                    <!-- for updates -->
                    <p>
                        <?php if( isset($_GET['user-update-error'])){
echo $_GET['user-update-error'];}elseif(isset($_GET['user-update-success'])){
echo $_GET['user-update-success'];
}

?>
                    </p>

                    <a class="btn orange" href="adminCreateAccount.php">Add Account</a>
                    <table class="white-text">
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Options</th>
                        </tr>

                        <tr>
                            <?php 
                            $sql = "SELECT * FROM user";
                            $results = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($results)) {
                            ?>
                            <td> <?php echo $row['user_id'];?> </td>
                            <td> <?php echo $row['name'];?> </td>
                            <td> <?php echo $row['username'];?> </td>
                            <td> <?php echo $row['password'];?> </td>
                            <td>
                                <button class="btn blue"
                                    onclick="location.href = 'updateUser.php?id=<?php echo $row['user_id'];?>'">Update</button>

                                <button class="btn red"
                                    onclick="location.href = 'deleteUser.php?id=<?php echo $row['user_id'];?>'">Delete</button>
                            </td>
                        </tr>
                        <?php }?>


                    </table>
                    <!-- Teal page content  -->



                </div>


                <div class="container">
                    <div class="col s12">

                        <h4>Staff Table</h4>
                        <!-- for updates -->
                        <p>
                            <?php if( isset($_GET['staff-update-error'])){
echo $_GET['staff-update-error'];}elseif(isset($_GET['staff-update-success'])){
echo $_GET['staff-update-success'];
}
?>
                        </p>
                        <table class="white-text">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Options</th>
                            </tr>
                            <tr>
                                <?php   
        $sql = "SELECT * FROM staff";
        $results = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($results)) {
        ?>
                                <td> <?php echo $row['staff_id'];?></td>
                                <td> <?php echo $row['name'];?> </td>
                                <td> <?php echo $row['username'];?> </td>
                                <td> <?php echo $row['password'];?></td>
                                <td>
                                    <button class="btn blue"
                                        onclick="location.href = 'updateStaff.php?id=<?php echo $row['staff_id']; ?>'">Update</button>
                                    <button class="btn red"
                                        onclick="location.href = 'deleteStaff.php?id=<?php echo $row['staff_id'];?>'">Delete</button>
                                </td>
                            </tr>
                            <?php };
    ?>
                        </table>
                    </div>
        </nav>









    </div>



    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
    <!-- Jquery -->
    <script type="text/javascript" src="jquery/jquery.js"></script>
</body>


</html>