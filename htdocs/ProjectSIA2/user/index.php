<?php
include "../connection_db.php";
include "../config.php";



//if directly access the index page will automatically directed to login page
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php"); // Redirect to the login page
    exit;
}
$users = $_SESSION['user'];


//get user_id from account and compare to the user_id from book that borrowed
$sql = "select * from user";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    if ($row['name'] == $users) {
        $userResultID = $row['user_id'];
        break;
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link type="text/css" rel="stylesheet" href="/ProjectSIA2/materialize/css/materialize.css"
        media="screen,projection"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

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
    </style>

    <div class="mybackground">

        <nav>
            <div class="nav-wrapper teal lighten-3">
            <a style="margin: 20px" class="white-text">
                    
                </a>

                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a href="/ProjectSIA2/user/index.php"><?php echo 'Hello ' . $users; ?></a></li>
                    <li><a href="/ProjectSIA2/user/bookList.php">List of Books</a></li>
                    <li><a href="/ProjectSIA2/Logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="row center">
            <div class="col s12 m2 modal-trigger" data-target="itmodal">
                <h4 class="z-depth-4 it">IT</h4>
            </div>
            <div class="col s12 m2 modal-trigger" data-target="devcommodal">
                <h4 class="z-depth-4 devcom">DEVCOM</h4>
            </div>
            <div class="col s12 m2 modal-trigger" data-target="hmmodal">
                <h4 class="z-depth-4 hm">HM</h4>
            </div>
            <div class="col s12 m2 modal-trigger" data-target="educmodal">
                <h4 class="z-depth-4 educ">EDUC</h4>
            </div>
            <div class="col s12 m2">
                <h4 class="z-depth-4 tm modal-trigger" data-target="tmmodal">TM</h4>
            </div>


            <!-- IT Modal Structure -->
            <div id="itmodal" class="modal">
                <div class="modal-content">
                    <h4>IT Library</h4>
                    <p>A bunch of books</p>
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

                        $sql = "SELECT * FROM user_library WHERE course_name = 'BSIT' AND user_id = '$userResultID'";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                            $String = '<div class=""><div class="booksBsit">';
                            $String .= '<div class="card-panel col s4 hoverable black-text"';
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
                            //buttton for return book
                            //note: change from admin library to admin borrow location for viewing
                            $String .= '</p><a href="/ProjectSIA2/user/Return_Book.php?book_id=';
                            $String .= $row['book_id'];
                            $String .= '" class="btn">Return Book</a>';
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
                    <h4>DEVCOM Library</h4>
                    <p>A bunch of books</p>
                    <div class="row">
                        <div class="col s3">
                            <div class="input-field inline">
                                <input type="text" class="validate" id="findDevcom" onkeyup="searchDevcom()">
                                <label for="email_inline">Search Book : ...</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- listing of books for DEVCOM -->
                        <?php
                        $sql = "SELECT * FROM user_library WHERE course_name = 'BSDEVCOM' AND user_id = '$userResultID'";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                            $String = '<div class=""><div class="booksDevcom">';
                            $String .= '<div class="card-panel col s4 hoverable black-text"';
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
                            //buttton for return book
                            //note: change from admin library to admin borrow location for viewing
                            $String .= '</p><a href="/ProjectSIA2/user/Return_Book.php?book_id=';
                            $String .= $row['book_id'];
                            $String .= '" class="btn">Return Book</a>';
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
            <!-- HM Modal Structure -->
            <div id="hmmodal" class="modal">
                <div class="modal-content">
                    <h4>HM Library</h4>
                    <p>A bunch of books</p>
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
                        $sql = "SELECT * FROM user_library WHERE course_name = 'BSHM' AND user_id = '$userResultID'";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                            $String = '<div class=""><div class="booksHtlManagement">';
                            $String .= '<div class="card-panel col s4 hoverable black-text"';
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
                            //buttton for return book
                            //note: change from admin library to admin borrow location for viewing
                            $String .= '</p><a href="/ProjectSIA2/user/Return_Book.php?book_id=';
                            $String .= $row['book_id'];
                            $String .= '" class="btn">Return Book</a>';
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
                    <h4>EDUC Library</h4>
                    <p>A bunch of books</p>
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
                        $sql = "SELECT * FROM user_library WHERE course_name = 'BEED' AND user_id = '$userResultID'";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                            $String = '<div class=""><div class="booksEDUC">';
                            $String .= '<div class="card-panel col s4 hoverable black-text"';
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
                            //buttton for return book
                            //note: change from admin library to admin borrow location for viewing
                            $String .= '</p><a href="/ProjectSIA2/user/Return_Book.php?book_id=';
                            $String .= $row['book_id'];
                            $String .= '" class="btn">Return Book</a>';
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
                    <h4>TM Library</h4>
                    <p>A bunch of books</p>
                    <div class="row">
                        <div class="col s3">
                            <div class="input-field inline">
                                <input type="text" class="validate" id="findTrmManagement"
                                    onkeyup="searchTrmManagement()">
                                <label for="email_inline">Search Book : ...</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- listing of books for BSTM -->
                        <?php
                        $sql = "SELECT * FROM user_library WHERE course_name = 'BSTM' AND user_id = '$userResultID'";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                            $String = '<div class=""><div class="booksTrmManagement">';
                            $String .= '<div class="card-panel col s4 hoverable black-text"';
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
                            //buttton for return book
                            //note: change from admin library to admin borrow location for viewing
                            $String .= '</p><a href="/ProjectSIA2/user/Return_Book.php?book_id=';
                            $String .= $row['book_id'];
                            $String .= '" class="btn">Return Book</a>';
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


    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer
                        content.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2023-2024 Ariel P. Abelgas
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>
    <script>
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
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="/ProjectSIA2/materialize/js/materialize.js"></script>
    <!-- Jquery -->
    <script type="text/javascript" src="/ProjectSIA2/jquery/jquery.js"></script>

</body>

</html>