<?php
include "../connection_db.php";
include "../config.php";

if (isset($_REQUEST['submit'])) {
  $image_file_name = $_FILES['image']['name'];
  $tempname = $_FILES['image']['tmp_name'];
  $folder = "../admin/adminStaffImage/" . $image_file_name;

  $file_name = $_FILES['file']['name'];
  $tempname1 = $_FILES['file']['tmp_name'];
  $folder1 = "../admin/adminStaffPdf/" . $file_name;



  $title = isset($_POST['title']) ? $_POST['title'] : '';
  $author = isset($_POST['author']) ? $_POST['author'] : '';
  $publish = isset($_POST['publish']) ? $_POST['publish'] : '';
  $image = isset($_POST['image']) ? $_POST['image'] : '';
  $file = isset($_POST['file']) ? $_POST['file'] : '';
  $course = isset($_POST['course']) ? $_POST['course'] : '';
  //$file
  if (empty($title) || empty($author) || empty($publish) || empty($image_file_name) || empty($file_name) || empty($course)) {
    //header("Location: Add_books.php?error=Please fill up the forms");
    echo '<h2>Please fill up all the forms</h2>';
  } else {
    //syntax for book duplication error
    $sql2 = "SELECT title,cover,file FROM admin_staff_library WHERE title='$title' OR cover = '$image_file_name' OR file = '$file_name' UNION SELECT title,cover,file FROM user_library WHERE title='$title' OR cover = '$image_file_name' OR file = '$file_name'";
    $query2 = mysqli_query($conn, $sql2);
    $num_rows = mysqli_num_rows($query2);
    if ($num_rows) {
      echo "<h3>File/Image or Title is duplicated or has same name</h3>";
    } else {
      //insertion of book
      $sql = "INSERT INTO admin_staff_library (title, author, published, cover, file, course_name) VALUES ('$title', '$author', '$publish', '$image_file_name', '$file_name' , '$course')";
      $query = mysqli_query($conn, $sql);
      if (move_uploaded_file($tempname, $folder)) {
        if (move_uploaded_file($tempname1, $folder1)) {
          echo "<h2>File uploaded successfully</h2>";
        } else {
          echo "<h2>File failed to upload</h2>";
        }
      } else {
        echo "<h2>File failed to upload</h2>";
      }
    }



  }



}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="/ProjectSIA2/materialize/css/materialize.css"
    media="screen,projection" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
</head>
<style>
  /* button for images */
  .custom-file-input {
    color: white;
  }

  .custom-file-input::-webkit-file-upload-button {
    visibility: hidden;
    width: 0px;
  }

  .custom-file-input::before {
    content: 'Select some images';
    color: black;
    display: inline-block;
    background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
    border: 1px solid #999;
    border-radius: 5px;
    padding: 5px 8px;
    outline: none;
    white-space: nowrap;
    -webkit-user-select: none;
    cursor: pointer;
    text-shadow: 1px 1px #fff;
    font-weight: 700;
    font-size: 10pt;
  }

  .custom-file-input:hover::before {
    border-color: black;
  }

  .custom-file-input:active {
    outline: 0;
  }

  .custom-file-input:active::before {
    background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
  }

  /* button for files */
  .custom-file-inputs {
    color: white;
  }

  .custom-file-inputs::-webkit-file-upload-button {
    visibility: hidden;
    width: 0px;
  }

  .custom-file-inputs::before {
    content: 'Select some files';
    color: black;
    display: inline-block;
    background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
    border: 1px solid #999;
    border-radius: 5px;
    padding: 5px 8px;
    outline: none;
    white-space: nowrap;
    -webkit-user-select: none;
    cursor: pointer;
    text-shadow: 1px 1px #fff;
    font-weight: 700;
    font-size: 10pt;
  }

  .custom-file-inputs:hover::before {
    border-color: black;
  }

  .custom-file-inputs:active {
    outline: 0;
  }

  .custom-file-inputs:active::before {
    background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
  }

  /* image input */
  #display_image {
    width: 20vw;
    height: 65vh;
    border: 1px solid black;
    background-size: cover;

  }
</style>

<body>


  <div class="mybackground">
    <!-- Navbar goes here -->


    <!-- Page Layout here -->
    <div class="row">
      <div class="card-panel white lighten-1 right" style="width:150vh; height:10vh; margin-right:5vh; margin-top:5vh">
        <h3 class="center" style="margin-top:-10px;">New Books</h3>

        <!-- labels and button -->
        <div class="white-text" style="margin-top:10vh;">
          <form method="POST" enctype="multipart/form-data">
            <h4>Title</h4>
            <input class="white-text" type="text" name="title">
            <br>
            <h4>Author</h4>
            <input class="white-text" type="text" name="author">
            <br>
            <h4>Published</h4>
            <input class="white-text" type="text" name="publish">

            <!-- selection courses -->
            <div class="input-field col s4" style="background-color:white; margin-right: 10px;">
              <select name="course" value="course">
                <option value="" disabled selected>Choose Course</option>
                <option value="BSIT">BS Information Technology</option>
                <option value="BSHM">BS Hotel Management</option>
                <option value="BSTM">BS Tourism Management</option>
                <option value="BSDEVCOM">BS Development Communication</option>
                <option value="BEED">Bacherlor of Elementary/Secondary Education</option>
              </select>
            </div>

            <input class="custom-file-input" style="line-height:30px;" type="file" name="image" id="image_input"
              accept=".jpg,.png" id=""><br><br>
            <input class="custom-file-inputs" style="line-height:30px;" type="file" name="file" id=""
              accept=".pdf,.docx">

            <input type="submit" name="submit" id="" class="btn" style="margin-right:10px">
            <a class="btn red" href="Admin_index.php">back</a>


          </form>

        </div>

      </div>
      <div class="col s3">
        <div class="card-panel teal lighten-2" style="height:70vh; margin-top: 15vh; float:center">
          <!-- This is display picture -->

          <?php

          //this php file is soon to be changed to js for displaying picture
          // $specifiedPic = isset($_GET['image']) ? $_GET['image'] : 'did not get image';
          // echo $specifiedPic;
          // $res = mysqli_query($conn, "SELECT cover FROM admin_staff_library WHERE cover = '$specifiedPic';");
          // while ($row = mysqli_fetch_assoc($res)) {
          //   ?>
          <img src="/ProjectSIA2/admin/adminStaffImage/frontImage.png" alt="image" id="display_image">

          <?php //}
          ; ?>
        </div>

        <!-- Grey navigation panel -->
      </div>

      <div class="col s9">
        <!-- Teal page content  -->
      </div>

    </div>
  </div>

  <!--JavaScript at end of body for optimized loading-->
  <script>
    // image clicked
    let image = document.getElementById("display_image");
    let image_input = document.getElementById("image_input");
    image_input.addEventListener("change", function () {
      image.src = URL.createObjectURL(image_input.files[0]);
    });
    //selector courses
    document.addEventListener('DOMContentLoaded', function () {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems);
    });

  </script>
  <script type="text/javascript" src="/ProjectSIA2/materialize/js/materialize.js"></script>
</body>

</html>