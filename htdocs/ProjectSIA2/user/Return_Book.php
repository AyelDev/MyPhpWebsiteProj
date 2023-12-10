<?php
include "../connection_db.php";
include "../config.php";



//if directly access the index page will automatically directed to login page
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php"); // Redirect to the login page
    exit;
}
$users = $_SESSION['user'];
$book_id = isset($_GET['book_id']) ? $_GET['book_id'] : '';

$sql = "SELECT * FROM user_library WHERE book_id = '$book_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$date = $row['borrowed_date'];


$timezone = new DateTimeZone('Asia/Tokyo');
$datenow = new DateTime($date);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link type="text/css" rel="stylesheet" href="/ProjectSIA2/materialize/css/materialize.css"
        media="screen,projection" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Book</title>

</head>

<body>
<div class="container">
    <div class="row">
        <div class="col s12 center">
        <h5>day to return the book</h5>
        <h2><?php echo $datenow->format('M d, Y'); ?></h2>
        <form action="return_verifier.php?book_id=<?php echo $book_id; ?>" method="POST"><input type="submit" name="submit" value="return" class="btn blue"></form>
        <br><a href="/ProjectSIA2/user/index.php" class="btn red">Back</a>
        </div>

    </div>

</div>




 <!--JavaScript at end of body for optimized loading-->
 <script type="text/javascript" src="/ProjectSIA2/materialize/js/materialize.js"></script>
    <!-- Jquery -->
    <script type="text/javascript" src="/ProjectSIA2/jquery/jquery.js"></script>    
</body>
</html