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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>
    <a href="Admin_index.php">Home</a>
    <a href="Logout.php">Logout</a>
    <a href="Table.php" class="">Tables</a>
    <a href="Dashboard.php" class="">Dashboard</a>

    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>
    </head>

    <body>

        <h2>User Table</h2>

        <!-- for updates -->
        <label>
            <?php if( isset($_GET['user-update-error'])){
        echo $_GET['user-update-error'];}elseif(isset($_GET['user-update-success'])){
            echo $_GET['user-update-success'];
        }

        ?>
        </label>




        <table>
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
                    <button onclick="location.href = 'updateUser.php?id=<?php echo $row['user_id'];?>'">Update</button>
                    <button onclick="location.href = 'deleteUser.php?id=<?php echo $row['user_id'];?>'">Delete</button>
                </td>
            </tr>
            <?php }?>


        </table>

        <h2>Staff Table</h2>

        <!-- for updates -->
        <label>
            <?php if( isset($_GET['staff-update-error'])){
        echo $_GET['staff-update-error'];}elseif(isset($_GET['staff-update-success'])){
            echo $_GET['staff-update-success'];
        }

        ?>
        </label>




        </label>

        <table>
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
                    <button
                        onclick="location.href = 'updateStaff.php?id=<?php echo $row['staff_id'];?>'">Update</button>
                    <button
                        onclick="location.href = 'deleteStaff.php?id=<?php echo $row['staff_id'];?>'">Delete</button>

                </td>
            </tr>


            <?php };
            ?>





    </body>


</html>