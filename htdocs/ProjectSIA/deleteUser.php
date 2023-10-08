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
    $Name = validate($_POST['name']);
  

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }
        $sqlBinStaff = "INSERT INTO `bin`(`name`, `username`, `password`) VALUES ('$Name', '$Username','$Password')";
        $resultBinStaff = mysqli_query($conn, $sqlBinStaff);
        $sqlDeleteUser = "DELETE FROM user WHERE user_id = '$idnew'";
        $resultUser = mysqli_query($conn, $sqlDeleteUser);

        if($resultUser){
            header("Location: Table.php?user-update-success=Account has been Deleted for User");    
        }else{
            header("Location: Table.php?user-update-error=Account has not been Deleted for User"); 
        }
       // $row = mysqli_fetch_assoc($resultUser);
      
}else{

}


       




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css" media="screen,projection" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>

    <div class="mybackground">
        <div class="container"><br><br><br><br><br><br>
            <div class="card-panel">
                <h3>Are you sure you want to delete ID <?php echo $row['user_id']?>?</h3>
                <form action="deleteUser.php?id_new=<?php echo $user_id; ?>" method="POST">

                    <p>Name: <i><?php echo $row['name']?></i> Username: <i><?php echo $row['username']?></i> Password: <i><?php echo $row['password']?></i></p>
                    <input class="hidetext" type="text" name="username" value="<?php echo $row['username']?>" id="disabled">
                    <input class="hidetext" type="text" name="password" value="<?php echo $row['password']?>">
                    <input class="hidetext" type="text" name="name" value="<?php echo $row['name']?>">

                    <input class="btn red" type="submit" name="update-acc" id="" value="Delete">
                    <a class="btn blue" href="Table.php">Back</a>
                </form>
            </div>
        </div>

    </div>


    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
    <!-- Jquery -->
    <script type="text/javascript" src="jquery/jquery.js"></script>
</body>

</html>