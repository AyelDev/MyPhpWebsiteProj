<?php
include "../connection_db.php";
include "../config.php";
$book_id = isset($_GET['book_id']) ? $_GET['book_id'] : '';



//$date = date('Y-m-d');

$timezone = new DateTimeZone('Asia/Tokyo');
$date = new DateTime('now', $timezone);


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
        <h3 class="center">Are you sure you will borrow this book?
        </h3>
        <form action="verifyBorrow.php" method="GET">
        
            <div class="row">
                <div class="col s6">
                    <span class="flow-text">
                        <select name="user_id">
                            <option value="" disabled selected>Choose user</option>
                            <?php
                            $sql = "SELECT * FROM user";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $userString = '<option value="';
                                $userString .= $row['user_id'];
                                $userString .= '">';
                                $userString .= $row['name'];
                                $userString .= '</option>';
                                echo $userString;
                            }
                            ?>
                        </select>
                    </span>


                </div>

                <div class="col s3">
                    <span class="flow-text">
                        <!-- <label>Select A Date</label> -->
                       <!-- <input type="date" id="date" name="date" min="<?php //echo $date->format('Y-m-'); echo $date->format('d')+1;  ?>" max="2025-12-31">  -->
                       
                       <!-- date borrowed -->
                       <input type="text" name="dateNow" value="<?php echo $date = date('Y-m-d'); ?>" hidden>
                       <!-- books to be return (date) -->
                       <input type="text" name="date" value="<?php echo $date = date('Y-m-'); echo $date = date('d')+4; ?>" hidden>
                    </span>
                    <!-- specify date to borrow -->

                </div>



            </div>



       
            <!-- check if agree.. -->
            <div class="row">
                <div class="col s12">
                    
                    <label>
                        <input type="checkbox" class="filled-in" name="book_id" value="<?php echo $book_id; ?>" />
                        <span>Agree terms and conditions</span>
                    </label>
                    <input type="submit" class="btn" name="submit" style="margin-left:10px">
        <a href="admin_ViewBook.php?book_id=<?php echo $book_id; ?>" class="btn red">Back</a>
                    
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