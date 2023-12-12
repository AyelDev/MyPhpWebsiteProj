<?php 
//date today
$timezone = new DateTimeZone('Asia/Tokyo');
$date = new DateTime('now', $timezone);
$date->format('Y-m-d');

//checks the date return books
$sql = "SELECT * FROM user_library";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
//format borrow date
$returnDate = new DateTime($row['return_date']);
$returnDate->format('Y-m-d');
if($date < $returnDate){
}else{
"return it";
$book_id =$row["book_id"] . "<br>";
$title = $row['title'];
$author = $row['author'];
$publish = $row['published'];
$cover = $row['cover'];
$file = $row['file'];
$course_name = $row['course_name'];
$sql = "INSERT INTO admin_staff_library (book_id, title, author, published, cover, file, course_name) ";
$sql .= "VALUES ('$book_id','$title','$author','$publish', ";
$sql .= "'$cover','$file','$course_name')";
mysqli_query($conn, $sql);

$sqldelete = "DELETE FROM user_library WHERE book_id = '$book_id'";
mysqli_query($conn, $sqldelete);
}
}
?>