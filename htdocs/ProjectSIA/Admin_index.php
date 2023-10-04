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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>
    <p><?php echo isset($_SESSION['admin']) ? "Hello Admin " . $_SESSION['admin'] : '' ; ?></p>
    <a href="Admin_index.php">Home</a>
    <a href="Logout.php">Logout</a>
    <a href="Table.php" class="">Tables</a>
    <a href="Dashboard.php" class="">Dashboard</a>
</body>

</html>