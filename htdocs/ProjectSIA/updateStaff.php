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
    $conPassword = validate($_POST['confrmpassword']);
    $Name = validate($_POST['name']);
  

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }
    
        $sqlCreateStaff = "UPDATE staff SET username='$Username', password='$Password', name='$Name' where staff_id = '$idnew'";
        $resultStaff = mysqli_query($conn, $sqlCreateStaff);

        if($resultStaff){
            header("Location: Table.php?staff-update-success=Account has been Updated for Staff");    
        }else{
            header("Location: Table.php?staff-update-error=Account has not been Updated for Staff"); 
        }
       // $row = mysqli_fetch_assoc($resultUser);
      
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
<div class="container"><br><br><br>
<div class="card-panel">
<form action="updateStaff.php?id_new=<?php echo $staff_id; ?>" method="POST">

<label class="teal-text">Username</label>
<input type="text" name="username" value="<?php echo $row['username']?>">
<label class="teal-text">Password</label>
<input type="text" name="password" value="<?php echo $row['password']?>">
<label class="teal-text">Name</label>
<input type="text" name="name" value="<?php echo $row['name']?>">
<input class="btn teal" type="submit" name="update-acc" id="" value="Update">
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