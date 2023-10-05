<?php
include "connection_db.php";
include "config.php";

if(isset($_GET['id'])){

$staff_id = $_GET['id'];

$sql = "SELECT * FROM staff where staff_id = '$staff_id'";
$resultStaff = mysqli_query($conn, $sql);

if(!$resultStaff){
    die();
}else{
    $row = mysqli_fetch_assoc($resultStaff);
   
}
}else{
    echo "not get id";
} 

// need to revise
if(isset($_POST['update-acc'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $Username = validate($_POST['username']);
    $Password = validate($_POST['password']);
    $Name = validate($_POST['name']);
  

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }
    
        $sqlDeleteStaff = "DELETE FROM staff where staff_id = '$idnew'";
        $resultStaff = mysqli_query($conn, $sqlDeleteStaff);

        if($resultStaff){
            header("Location: Table.php?staff-update-success=Account has been Deleted for Staff");    
        }else{
            header("Location: Table.php?staff-update-error=Account has not been Deleted for Staff"); 
        }
       // $row = mysqli_fetch_assoc($resultUser);
      
}


       




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>
    <form action="deleteStaff.php?id_new=<?php echo $staff_id; ?>" method="POST">

        <label>Username</label>
        <input type="text" name="username" value="<?php echo $row['username']?>">
        <label>Password</label>
        <input type="text" name="password" value="<?php echo $row['password']?>">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $row['name']?>">
        <button type="submit" name="update-acc">
            <p>Delete</p>
        </button>
        <a href="Table.php">Back</a>
    </form>
</body>

</html>