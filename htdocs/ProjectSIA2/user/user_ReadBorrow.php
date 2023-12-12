<?php
include "../connection_db.php";
include "../config.php";
$book_id = isset($_GET['book_id']) ? $_GET['book_id'] : '';
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
$_SESSION['book_id'] = $book_id;



//$date = date('Y-m-d');

$timezone = new DateTimeZone('Asia/Tokyo');
$date = new DateTime('now', $timezone);


//list of infos in book
$sql = "SELECT * FROM admin_staff_library WHERE book_id = '$book_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$title = $row['title'];
$author = $row['author'];
$publish = $row['published'];
$cover = $row['cover'];
$file = $row['file'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/ProjectSIA2/materialize/css/materialize.css"
        media="screen,projection" />
    <title>Admin Staff Read/Borrow</title>
</head>

<body>

    <div class="container">
        <h5 class="red-text center">
            <?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?>
        </h5>

        <!-- // -->
        <div class="container">
            <div class="row" style="margin-top:3%">

                <div class="col s5">
                    <span class="white-text">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="/ProjectSIA2/admin/adminStaffImage/<?php echo $cover; ?>"
                                style="height:30rem; width:20rem">
                        </div>

                    </span>


                    <form action="verifyBorrow.php" method="GET">

                        <div class="row">
                            <div class="col s3">
                                <span class="flow-text">
                                    <!-- <label>Select A Date</label> -->
                                    <!-- <input type="date" id="date" name="date" min="<?php //echo $date->format('Y-m-'); echo $date->format('d')+1;  ?>" max="2025-12-31">  -->
                                    <input type="text" name="user_id" value="<?php echo $user_id; ?>" hidden>
                                    <!-- date borrowed -->
                                    <input type="text" name="dateNow" value="<?php echo $date = date('Y-m-d'); ?>"
                                        hidden>
                                    <!-- books to be return (date) -->
                                    <input type="text" name="date" value="<?php echo $date = date('Y-m-');
                                    echo $date = date('d') + 4; ?>" hidden>
                                </span>


                            </div>


                            <input type="submit" class="btn" name="submit" value="Barrow" style="width:100%">
                            <a href="bookList.php" class="btn red" style="width:100%; margin-top:2%;">back</a>
                        </div>
                    </form>





                </div>
                <div class="col s7">
                    <div class="row">
                        <div class="card-panel blue">
                            <span class="white-text">
                                <h5>Title:
                                    <?php echo $title; ?>
                                </h5>
                                <h5>Author:
                                    <?php echo $author; ?>
                                </h5>
                                <h5>published:
                                    <?php echo $publish ?>
                                </h5>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>










    </div>
    </form>
    </div>

    <!-- view pdf using modal -->
    <!-- ////////////// code here ///////// -->

    <script>
        //user selector
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });

    </script>
    <script type="text/javascript" src="/ProjectSIA2/materialize/js/materialize.js">
    </script>
</body>

</html>