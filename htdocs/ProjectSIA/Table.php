<?php
include "connection_db.php";
echo "Hello Admin";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>
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

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
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
                    <button>Update</button>
                    <button>Delete</button>
                </td>
            </tr>
            <?php } ?>


        </table>

        <h2>Staff Table</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
            </tr>

            <tr>
                <?php   
                
                $sql = "SELECT * FROM staff";
                $results = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($results)) {
                ?>
                <td> <?php echo $row['staff_id'];?></td>
                <td> <?php echo $row['staff_name'];?> </td>
                <td> <?php echo $row['username'];?> </td>
                <td> <?php echo $row['password'];?></td>
                <td>
                    <button>Update</button>
                    <button>Delete</button>

                </td>
            </tr>


            <?php }  echo "$count"; ?>





    </body>


</html>