<?php
include "../connection_db.php";
include "../config.php";
$book_id = isset($_SESSION['book_id']) ? $_SESSION['book_id'] : 'not get book';
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : 'not get user';


if (isset($_GET['submit'])) {
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
    $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
    $dateNow = isset($_REQUEST['dateNow']) ? $_REQUEST['dateNow'] : '';
if(empty($user_id)){
    //need to fix
    header("Location: Admin_ReadBorrow.php?book_id=".$book_id."&error=Please check if forms are rightly filled");
}else{
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
   header("Location: Admin_library.php?success=The file has been borrowed");
}
    
 

}

?>