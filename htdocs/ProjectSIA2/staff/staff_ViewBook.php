<?php
include "../connection_db.php";
include "../config.php";
$book_id = isset($_GET['book_id']) ? $_GET['book_id'] : '';

$sql = "SELECT * FROM admin_staff_library WHERE book_id = '$book_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$title = $row['title'];
$author = $row['author'];
$publish = $row['published'];
$cover = $row['cover'];
$file = $row['file'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/ProjectSIA2/materialize/css/materialize.css"
        media="screen,projection" />
    <title>View Book</title>
</head>


<div class="container">
    <div class="row" style="margin-top:3%">

        <div class="col s5">
                <span class="white-text">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="/ProjectSIA2/admin/adminStaffImage/<?php echo $cover; ?>" style="height:35rem; width:30rem">
                    </div>

                </span>
          
            <a href="/ProjectSIA2/admin/adminStaffPdf/<?php echo $file; ?>" class="btn" style="width:100%; margin-bottom:2%; margin-top:2%">Read</a>
            <a href="/ProjectSIA2/staff/Staff_ReadBorrow.php?book_id=<?php echo $book_id; ?>" class="btn"
                style="width:100% ">borrow</a>
                <a href="/ProjectSIA2/staff/Staff_index.php" class="btn red" style="width:100%; margin-top:2%;">back</a>
        </div>
        <div class="col s7">
            <div class="row">
                <div class="card-panel blue">
                    <span class="white-text">
                        <h5>Title: <?php echo $title; ?></h5>
                        <h5>Author: <?php echo $author; ?></h5>
                        <h5>published: <?php echo $publish ?></h5>
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript" src="/ProjectSIA2/materialize/js/materialize.js">
</script>
</body>

</html>