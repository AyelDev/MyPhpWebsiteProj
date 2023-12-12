<?php
include "../connection_db.php";
include "../config.php";

//if directly access the Admin index page will automatically directed to login page
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php"); // Redirect to the login page
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link type="text/css" rel="stylesheet" href="/ProjectSIA2/materialize/css/materialize.css"
        media="screen,projection" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
</head>

<body>
    <style>
        .z-depth-4 {
            padding: 70px
        }

        .it:hover {
            outline: none;
            background-color: maroon;
            -webkit-text-fill-color: aliceblue;
            transition: background-color 0.5s, color 0.5s;
        }

        .devcom:hover {
            outline: none;
            background-color: pink;
            -webkit-text-fill-color: aliceblue;
            transition: background-color 0.5s, color 0.5s;
        }

        .hm:hover {
            outline: none;
            background-color: red;
            -webkit-text-fill-color: aliceblue;
            transition: background-color 0.5s, color 0.5s;
        }

        .educ:hover {
            background-color: blue;
            color: aliceblue;
            transition: background-color 0.5s, color 0.5s;
        }

        .tm:hover {
            background-color: red;
            /* Initial background color */
            color: aliceblue;
            /* Initial text color */
            transition: background-color 0.5s, color 0.5s;

        }

        .page-footer {
            padding-top: 0px;
        }

        .row {
            margin-bottom: 0px;
        }

        .card-panel {
            line-height: 20px;
        }

        .center,
        .center-align {
            line-height: 3px;
        }
    </style>
    <div class="mybackground">

        <nav>
            <div class="nav-wrapper white">
                <div class="row">
                    <div class="col s2">
                        <i class="black-text left">
                            <?php echo isset($_SESSION['admin']) ? "Hello Admin " . $_SESSION['admin'] : ''; ?>
                        </i>
                    </div>
                </div>




            </div>

            <!-- Navbar goes here -->

            <!-- Page Layout here -->
            <div class="row">

                <div class="col s2">
                    <ul class="left hide-on-med-and-down">
                        <li><a style="width:25vh;" href="Admin_index.php">Home</a></li><br>
                        <li><a style="width:25vh" href="adminCreateAccount.php">Add User</a></li><br>
                        <li><a style="width:25vh" href="Table.php">Tables</a></li><br>
                        <li><a style="width:25vh" href="Dashboard.php">Dashboard</a></li><br>
                        <li><a style="width:25vh" href="adminBorrowList.php">Borrow List</a></li><br>
                        <!-- Dropdown Trigger -->
                        <li><a class='dropdown-trigger btn' style="width:20vh" href='#'
                                data-target='dropdown1'>Courses</a></li>

                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><a href="Admin_library.php">Library</a></li>
                            <li class="divider" tabindex="-1"></li>
                            <li><a href="Add_books.php">Add Books</a></li>
                        </ul>
                        <li><a style="width:25vh" href="/ProjectSIA2/Logout.php">Logout</a></li><br>
                    </ul>
                </div>

                <div class="col s9 center">
                    <!-- Teal page content  -->
                    <h1>Library</h1>
                    <div class="row center">
                        <div class="col s12 m3 modal-trigger" data-target="itmodal">
                            <h4 class="z-depth-4 it">IT</h4>
                        </div>
                        <div class="col s12 m3 modal-trigger" data-target="devcommodal">
                            <h4 class="z-depth-4 devcom">DEVCOM</h4>
                        </div>
                        <div class="col s12 m3 modal-trigger" data-target="hmmodal">
                            <h4 class="z-depth-4 hm">HM</h4>
                        </div>
                        <div class="col s12 m3 modal-trigger" data-target="educmodal">
                            <h4 class="z-depth-4 educ">EDUC</h4>
                        </div>
                        <div class="col s12 m3">
                            <h4 class="z-depth-4 tm modal-trigger" data-target="tmmodal">TM</h4>
                        </div>

                        <!-- IT Modal Structure -->
                        <div id="itmodal" class="modal">
                            <div class="modal-content">
                                <h4 class="black-text">IT Library</h4>
                                <p class="black-text">A bunch of books</p>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="input-field inline">
                                            <input type="text" class="validate" id="findBsit" onkeyup="searchBsit()">
                                            <label for="email_inline">Search Book : ...</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- listing of books for BSIT -->
                                    <?php
                                    $sql = "SELECT * FROM admin_staff_library WHERE course_name = 'BSIT'";
                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        $String = '<div class="" style="width:40rem"><div class="booksBsit">';
                                        $String .= '<div class="card-panel col s4 hoverable black-text" style="margin:3px"';
                                        $String .= 'onclick="location.href=';
                                        $String .= "'";
                                        $String .= '/ProjectSIA2/admin/adminStaffPdf/';
                                        $String .= $row['file'];
                                        $String .= "'";
                                        $String .= '">';
                                        $String .= '<img class="responsive-img" src="/ProjectSIA2/admin/adminStaffImage/';
                                        $String .= $row['cover'];
                                        $String .= '"';
                                        $String .= 'alt="';
                                        $String .= $row['title'] . '" ><p class="pBsit">';
                                        $String .= $row['title'];
                                        //buttton for view book
                                        //note: change from admin library to admin borrow location for viewing
                                        $String .= '</p><a href="/ProjectSIA2/admin/admin_ViewBook.php?book_id=';
                                        $String .= $row['book_id'];
                                        $String .= '" class="btn">View Book</a>';
                                        $String .= '</div></div>';
                                        $String .= '</div>';
                                        echo $String;
                                    }
                                    ?>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                            </div>
                        </div>
                        <!-- DEVCOM Modal Structure -->
                        <div id="devcommodal" class="modal">
                            <div class="modal-content">
                                <h4 class="black-text">DEVCOM Library</h4>
                                <p class="black-text">A bunch of books</p>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="input-field inline">
                                            <input type="text" class="validate" id="findDevcom"
                                                onkeyup="searchDevcom()">
                                            <label for="email_inline">Search Book : ...</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- listing of books for DEVCOM -->
                                    <?php
                                    $sql = "SELECT * FROM admin_staff_library WHERE course_name = 'BSDEVCOM'";
                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        $String = '<div class="" style="width:40rem"><div class="booksDevcom">';
                                        $String .= '<div class="card-panel col s4 hoverable black-text" style="margin:3px"';
                                        $String .= 'onclick="location.href=';
                                        $String .= "'";
                                        $String .= '/ProjectSIA2/admin/adminStaffPdf/';
                                        $String .= $row['file'];
                                        $String .= "'";
                                        $String .= '">';
                                        $String .= '<img class="responsive-img" src="/ProjectSIA2/admin/adminStaffImage/';
                                        $String .= $row['cover'];
                                        $String .= '"';
                                        $String .= 'alt="';
                                        $String .= $row['title'] . '" ><p class="pDevcom">';
                                        $String .= $row['title'];
                                        //buttton for view book
                                        //note: change from admin library to admin borrow location for viewing
                                        $String .= '</p><a href="/ProjectSIA2/admin/admin_ViewBook.php?book_id=';
                                        $String .= $row['book_id'];
                                        $String .= '" class="btn">View Book</a>';
                                        $String .= '</div></div>';
                                        $String .= '</div>';
                                        echo $String;
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                            </div>
                        </div>

                    </div>
                    <!-- HM Modal Structure -->
                    <div id="hmmodal" class="modal">
                        <div class="modal-content">
                            <h4 class="black-text">HM Library</h4>
                            <p class="black-text">A bunch of books</p>
                            <div class="row">
                                <div class="col s3">
                                    <div class="input-field inline">
                                        <input type="text" class="validate" id="findHtlManagement"
                                            onkeyup="searchHtlManagement()">
                                        <label for="email_inline">Search Book : ...</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- listing of books for BSHM -->
                                <?php
                                $sql = "SELECT * FROM admin_staff_library WHERE course_name = 'BSHM'";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $String = '<div class="" style="width:40rem"><div class="booksHtlManagement">';
                                    $String .= '<div class="card-panel col s4 hoverable black-text" style="margin:3px"';
                                    $String .= 'onclick="location.href=';
                                    $String .= "'";
                                    $String .= '/ProjectSIA2/admin/adminStaffPdf/';
                                    $String .= $row['file'];
                                    $String .= "'";
                                    $String .= '">';
                                    $String .= '<img class="responsive-img" src="/ProjectSIA2/admin/adminStaffImage/';
                                    $String .= $row['cover'];
                                    $String .= '"';
                                    $String .= 'alt="';
                                    $String .= $row['title'] . '" ><p class="pHtlManagement">';
                                    $String .= $row['title'];
                                    //buttton for view book
                                    //note: change from admin library to admin borrow location for viewing
                                    $String .= '</p><a href="/ProjectSIA2/admin/admin_ViewBook.php?book_id=';
                                    $String .= $row['book_id'];
                                    $String .= '" class="btn">View Book</a>';
                                    $String .= '</div></div>';
                                    $String .= '</div>';
                                    echo $String;
                                }
                                ?>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                        </div>
                    </div>
                    <!-- EDUC Modal Structure -->
                    <div id="educmodal" class="modal">
                        <div class="modal-content">
                            <h4 class="black-text">EDUC Library</h4>
                            <p class="black-text">A bunch of books</p>
                            <div class="row">
                                <div class="col s3">
                                    <div class="input-field inline">
                                        <input type="text" class="validate" id="findEDUC" onkeyup="searchEDUC()">
                                        <label for="email_inline">Search Book : ...</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- listing of books for BEED -->
                                <?php
                                $sql = "SELECT * FROM admin_staff_library WHERE course_name = 'BEED'";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $String = '<div class="" style="width:40rem"><div class="booksEDUC">';
                                    $String .= '<div class="card-panel col s4 hoverable black-text" style="margin:3px"';
                                    $String .= 'onclick="location.href=';
                                    $String .= "'";
                                    $String .= '/ProjectSIA2/admin/adminStaffPdf/';
                                    $String .= $row['file'];
                                    $String .= "'";
                                    $String .= '">';
                                    $String .= '<img class="responsive-img" src="/ProjectSIA2/admin/adminStaffImage/';
                                    $String .= $row['cover'];
                                    $String .= '"';
                                    $String .= 'alt="';
                                    $String .= $row['title'] . '" ><p class="pEDUC">';
                                    $String .= $row['title'];
                                    //buttton for view book
                                    //note: change from admin library to admin borrow location for viewing
                                    $String .= '</p><a href="/ProjectSIA2/admin/admin_ViewBook.php?book_id=';
                                    $String .= $row['book_id'];
                                    $String .= '" class="btn">View Book</a>';
                                    $String .= '</div></div>';
                                    $String .= '</div>';
                                    echo $String;
                                }
                                ?>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                        </div>
                    </div>
                    <!-- TM Modal Structure -->
                    <div id="tmmodal" class="modal">
                        <div class="modal-content">
                            <h4 class="black-text">TM Library</h4>
                            <p class="black-text">A bunch of books</p>
                            <div class="row">
                                <div class="col s3">
                                    <div class="input-field inline">
                                        <input type="text" class="validate" id="findTrmManagement" onkeyup="searchTrmManagement()">
                                        <label for="email_inline">Search Book : ...</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- listing of books for BSTM -->
                                <?php
                                $sql = "SELECT * FROM admin_staff_library WHERE course_name = 'BSTM'";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $String = '<div class="" style="width:40rem"><div class="booksTrmManagement">';
                                    $String .= '<div class="card-panel col s4 hoverable black-text" style="margin:3px"';
                                    $String .= 'onclick="location.href=';
                                    $String .= "'";
                                    $String .= '/ProjectSIA2/admin/adminStaffPdf/';
                                    $String .= $row['file'];
                                    $String .= "'";
                                    $String .= '">';
                                    $String .= '<img class="responsive-img" src="/ProjectSIA2/admin/adminStaffImage/';
                                    $String .= $row['cover'];
                                    $String .= '"';
                                    $String .= 'alt="';
                                    $String .= $row['title'] . '" ><p class="pTrmManagement">';
                                    $String .= $row['title'];
                                    //buttton for view book
                                    //note: change from admin library to admin borrow location for viewing
                                    $String .= '</p><a href="/ProjectSIA2/admin/admin_ViewBook.php?book_id=';
                                    $String .= $row['book_id'];
                                    $String .= '" class="btn">View Book</a>';
                                    $String .= '</div></div>';
                                    $String .= '</div>';
                                    echo $String;
                                }
                                ?>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                        </div>
                    </div>
                </div>
            </div>


            <!--JavaScript at end of body for optimized loading-->

            <script>
                //dropdown
                document.addEventListener('DOMContentLoaded', function () {
                    var elems = document.querySelectorAll('.dropdown-trigger');
                    var instances = M.Dropdown.init(elems);
                });
                //modal
                document.addEventListener('DOMContentLoaded', function () {
                    var elems = document.querySelectorAll('.modal');
                    M.Modal.init(elems);
                });
            </script>
            <script type="text/javascript">
                //search
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
                function searchDevcom() {
                    //bsit
                    let filter = document.getElementById('findDevcom').value.toUpperCase();
                    let item = document.querySelectorAll('.booksDevcom');
                    let l = document.getElementsByClassName('pDevcom');

                    for (var i = 0; i <= l.length; i++) {
                        let a = item[i].getElementsByClassName('pDevcom')[0];
                        let value = a.innerHTML || a.innerText || a.textContent;

                        if (value.toUpperCase().indexOf(filter) > -1) {
                            item[i].style.display = "";
                        } else {
                            item[i].style.display = "none";
                        }
                    }
                }
                function searchHtlManagement() {
                    //bsit
                    let filter = document.getElementById('findHtlManagement').value.toUpperCase();
                    let item = document.querySelectorAll('.booksHtlManagement');
                    let l = document.getElementsByClassName('pHtlManagement');

                    for (var i = 0; i <= l.length; i++) {
                        let a = item[i].getElementsByClassName('pHtlManagement')[0];
                        let value = a.innerHTML || a.innerText || a.textContent;

                        if (value.toUpperCase().indexOf(filter) > -1) {
                            item[i].style.display = "";
                        } else {
                            item[i].style.display = "none";
                        }
                    }
                }
                function searchEDUC() {
                    let filter = document.getElementById('findEDUC').value.toUpperCase();
                    let item = document.querySelectorAll('.booksEDUC');
                    let l = document.getElementsByClassName('pEDUC');

                    for (var i = 0; i <= l.length; i++) {
                        let a = item[i].getElementsByClassName('pEDUC')[0];
                        let value = a.innerHTML || a.innerText || a.textContent;

                        if (value.toUpperCase().indexOf(filter) > -1) {
                            item[i].style.display = "";
                        } else {
                            item[i].style.display = "none";
                        }
                    }
                }
                function searchTrmManagement() {
                    let filter = document.getElementById('findTrmManagement').value.toUpperCase();
                    let item = document.querySelectorAll('.booksTrmManagement');
                    let l = document.getElementsByClassName('pTrmManagement');

                    for (var i = 0; i <= l.length; i++) {
                        let a = item[i].getElementsByClassName('pTrmManagement')[0];
                        let value = a.innerHTML || a.innerText || a.textContent;

                        if (value.toUpperCase().indexOf(filter) > -1) {
                            item[i].style.display = "";
                        } else {
                            item[i].style.display = "none";
                        }
                    }
                }
            </script>
            <script type="text/javascript" src="/ProjectSIA2/materialize/js/materialize.js"></script>
            <!-- Jquery -->
            <script type="text/javascript" src="/ProjectSIA2/jquery/jquery.js"></script>
</body>





</html>