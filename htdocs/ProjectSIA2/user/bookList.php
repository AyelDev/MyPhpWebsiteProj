<?php
include "../connection_db.php";
include "../config.php";




//if directly access the index page will automatically directed to login page
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php"); // Redirect to the login page
    exit;
}
$users = $_SESSION['user'];

//check if user's user_id is true for borrowing book
$sql = "SELECT * from user WHERE name = '$users'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
$user_id = $rows['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link type="text/css" rel="stylesheet" href="/ProjectSIA2/materialize/css/materialize.min.css"
        media="screen,projection" />
</head>

<body>
    <h4 class="blue-text center">List of Books Available</h4>
    <div class="container">


        <div class="row">
            <div class="col s3">
                <div class="input-field inline">
                    <input type="text" class="validate" id="findBsit" onkeyup="searchBsit()">
                    <label for="email_inline">Search Book : ...</label>
                    <a href="index.php" class="btn red">Back</a>
                </div>
            </div>
        </div>


        <div class="row">
            <!-- repeat -->



            <?php
            $bookCount = 0;
            $sql = "SELECT * FROM admin_staff_library";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="" style="width:40rem;"><div class="booksBsit">';
                    echo '<div class="card col s5" style="margin:3px">';
                    echo '<div class="card-image">';
                    echo '<img src="/ProjectSIA2/admin/adminStaffImage/' . $row['cover'] . '" style="height:24rem;">';
                    echo '</div>';
                    echo '<div class="card-content">';
                    echo '<p class="pBsit">' . $row['title'] . '</p>';
                    echo '</div>';
                    echo '<div class="card-action">';
                    echo '<a href="/ProjectSIA2/user/user_ReadBorrow.php?book_id=' . $row['book_id'] . '&user_id=' . $user_id . '">view Book</a></div></div></div></div>';

                }
            } else {
                echo "<h4 class='red-text'>No books available please check later</h4>";
            }

            ?>

        </div>




    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="/ProjectSIA2/materialize/js/materialize.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.carousel');
            var instances = M.Carousel.init(elems);
        });

        function searchBsit() {
            //bsit
            let filter = document.getElementById('findBsit').value.toUpperCase();
            let item = document.querySelectorAll('.booksBsit');
            let l = document.getElementsByClassName('pBsit');

            for (var i = 0; i <= l.length; i++) {
                let a = item[i].getElementsByClassName('pBsit')[0];
                let value = a.innerHTML || a.innerText || a.textContent;

                if (value.toUpperCase().indexOf(filter) > -1) {
                    item[i].style.display = "";
                } else {
                    item[i].style.display = "none";
                }
            }
        }
    </script>
</body>

</html>