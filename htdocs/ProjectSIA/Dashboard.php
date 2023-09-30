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

    <h1></h1>
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

<p>Number of Admin <?php echo "$admin";?></p>
<p>Number of Staff <?php echo "$staff";?></p>
<p>Number of User <?php echo "$user";?></p>


</body>

</html>