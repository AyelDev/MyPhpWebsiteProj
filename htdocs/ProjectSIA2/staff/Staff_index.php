<?php
include "../connection_db.php";
include "../config.php";
//session_start();


//if directly access the index page will automatically directed to login page
if (!isset($_SESSION['staff'])) {
    header("Location: ../login.php"); // Redirect to the login page
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

</head>

<body>

    <p><?php echo isset($_SESSION['staff']) ? "Hello " . $_SESSION['staff'] : '' ;?></p>
    <a href="/folder/Logout.php">Logout</a>
</body>

</html>