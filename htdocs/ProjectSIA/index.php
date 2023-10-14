<?php
include "connection_db.php";
session_start();


//if directly access the index page will automatically directed to login page
if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirect to the login page
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css" media="screen,projection" />
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
                <a style="margin: 20px"
                    class="white-text"><?php echo isset($_SESSION['user']) ? "Hello " . $_SESSION['user'] : '' ;?></a>

                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="Profile.html">Profile</a></li>
                    <li><a href="Logout.php">Logout</a></li>
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
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        M.Modal.init(elems);
    });
    </script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
    <!-- Jquery -->
    <script type="text/javascript" src="jquery/jquery.js"></script>

</body>

</html>