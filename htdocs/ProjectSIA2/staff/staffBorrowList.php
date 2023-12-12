<?php
include "../connection_db.php";
include "../config.php";

if (!isset($_SESSION['staff'])) {
    header("Location: ../login.php"); // Redirect to the login page
    exit;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link type="text/css" rel="stylesheet" href="/ProjectSIA2/materialize/css/materialize.min.css"
        media="screen,projection" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow List</title>
</head>

<body>


<div class="container">
<table  class="centered responsive-table highlight">


        <thead>
          <tr>
              <th>Name</th>
              <th>Item Name</th>
              <th>Item Borrowed</th>
              <th>Item Return</th>
          </tr>
        </thead>

        <tbody>
        <?php 

//check if the user's user_id is same in user=library
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
$name = $row['user_id'];
$stmt = "SELECT * FROM user_library";
$query = mysqli_query($conn, $stmt);
while($rows = mysqli_fetch_assoc($query)){
$names = $rows['user_id'];
if($names == $name){
    print '<tr>';
    print '<td>'.$row['name'].'</td>';
    print '<td>'.$rows['title'].'</td>';
    print '<td>'.$rows['borrowed_date'].'</td>';
    print '<td>'.$rows['return_date'].'</td>';
    print '</tr>';
}

}if(mysqli_num_rows($query) < 1){
print '<h4 class="white-text red center">No books borrowed<h4>'; break;
}
}
?>
        </tbody>
      </table><br>
<a href="Staff_index.php" class="btn red">Back</a>

</div>


<script type="text/javascript" src="/ProjectSIA2/materialize/js/materialize.js"></script>
</body>

</html>