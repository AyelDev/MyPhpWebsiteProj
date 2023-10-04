<?php
include "connection_db.php";
include "config.php";


if(isset($_GET['id'])){

$user_id = $_GET['id'];

$sql = "SELECT * FROM user where user_id = '$user_id'";
$resultUser = mysqli_query($conn, $sql);

if(!$resultUser){
    die();
}else{
    $row = mysqli_fetch_assoc($resultUser);
   
}
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
    $conPassword = validate($_POST['confrmpassword']);
    $Name = validate($_POST['name']);
  

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }
    
        $sqlCreateUser = "UPDATE user SET username='$Username', password='$Password', name='$Name' where user_id = '$idnew'";
        $resultUser = mysqli_query($conn, $sqlCreateUser);

        if($resultUser){
            header("Location: Table.php?user-update-success=Account has been Updated for User");    
        }else{
            header("Location: Table.php?user-update-error=Account has not been Updated for User"); 
        }
       // $row = mysqli_fetch_assoc($resultUser);
      
}else{

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
    <form action="updateUser.php?id_new=<?php echo $user_id; ?>" method="POST">

        <label>Username</label>
        <input type="text" name="username" value="<?php echo $row['username']?>">
        <label>Password</label>
        <input type="text" name="password" value="<?php echo $row['password']?>">        
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $row['name']?>">
        <button type="submit" name="update-acc">
            <p>Update</p>
        </button>
        <a href="Table.php">Back</a>
    </form>
</body>

</html>