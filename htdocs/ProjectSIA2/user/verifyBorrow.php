<?php
include "../connection_db.php";
include "../config.php";
$book_id = isset($_SESSION['book_id']) ? $_SESSION['book_id'] : 'not get book';
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : 'not get user';


if (isset($_GET['submit'])) {
    $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
    $dateNow = isset($_REQUEST['dateNow']) ? $_REQUEST['dateNow'] : '';



   //moving of admin book data to user book data
   $sql = "INSERT INTO user_library (book_id, title, author, published, cover, file, course_name) SELECT ";
   $sql .= "book_id, title, author, published, cover, file, course_name FROM admin_staff_library ";
   $sql .= "WHERE book_id = '$book_id'";
   $result = mysqli_query($conn, $sql);

   //update user_id
   $sql2 = "UPDATE user_library SET user_id = '$user_id', borrowed_date = '$dateNow', return_date = '$date' WHERE book_id = '$book_id'";
   $result2 = mysqli_query($conn, $sql2);
    //deletion or moving of books from admin_staff_libarary
   $sql3 = "DELETE FROM admin_staff_library WHERE book_id = '$book_id'";
   $result3 = mysqli_query($conn, $sql3);
   header("Location: index.php?success=The file has been borrowed");
}else{
    header("Location: bookList.php?error=Something went wrong");
}
    
 


?>