<?php
include "../connection_db.php";
include "../config.php";
$book_id = isset($_GET['book_id']) ? $_GET['book_id'] : '';

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
    <h2>Are you sure you will borrow this book?
        <?php //echo $book_id; ?>
    </h2>
    <form action="verifyBorrow.php" method="GET">

        <!-- check if agree.. -->
      
        <input type="submit" name="submit">
        <label>
            <input type="checkbox" class="filled-in" name="book_id" value="<?php echo $book_id;?>"/>
            <span>Agree terms and conditions(Optional)</span>
        </label>
        <!-- specify date to borrow -->
        <input type="text" class="datepicker">
        <div class="input-field col s12">
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
            <label>Materialize Select</label>
        </div>
    </form>
    <!-- view pdf using modal -->
    <!-- ////////////// code here ///////// -->

    <script>
        //user selector
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });

        //date picker

        var now = new Date();

        if (now.getHours() < 12) {
            //current time before 12 pm allow todays date to be selected
        } else {
            ///else current time 12 pm, set mindate to tomorrows date
            minDate = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1);
        }

        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                minDate: new Date(now.getFullYear(), now.getMonth(), now.getDate()),  // January 1, 2023
                maxDate: new Date(2023, 11, 31) // December 31, 2023
            });
        });
    </script>
    <script type="text/javascript" src="/ProjectSIA2/materialize/js/materialize.js">
    </script>
</body>

</html>