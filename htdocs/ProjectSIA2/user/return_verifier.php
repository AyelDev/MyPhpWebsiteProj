<?php
include "../connection_db.php";
include "../config.php";
$book_id = isset($_GET['book_id']) ? $_GET['book_id'] : 'not get book';
$sql = "SELECT * FROM user_library WHERE book_id = '$book_id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$title = $row['title'];
$author = $row['author'];
$publish = $row['published'];
$cover = $row['cover'];
$file = $row['file'];
$course_name = $row['course_name'];



// return of the book
if ($_POST['submit']) {
    $sql = "INSERT INTO admin_staff_library (book_id, title, author, published, cover, file, course_name) ";
    $sql .= "VALUES ('$book_id','$title','$author','$publish', ";
    $sql .= "'$cover','$file','$course_name')";
    $result = mysqli_query($conn, $sql);

    $sqldelete = "DELETE FROM user_library WHERE book_id = '$book_id'";
    mysqli_query($conn, $sqldelete);
    header("Location: /ProjectSIA2/user/index.php?success=returned successfully");
} else {
    header("Location: /ProjectSIA2/user/index.php?error=please try again");
}
?>