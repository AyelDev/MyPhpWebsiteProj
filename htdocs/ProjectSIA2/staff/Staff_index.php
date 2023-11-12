<?php
include "../connection_db.php";
include "../config.php";
//session_start();


//if directly access the index page will automatically directed to login page
if (!isset($_SESSION['staff'])) {
    header("Location: ../login.php"); // Redirect to the login page
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link type="text/css" rel="stylesheet" href="/ProjectSIA2/materialize/css/materialize.css"
        media="screen,projection"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
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
    .card-panel{
        line-height: 20px;
    }
    .center, .center-align{
        line-height: 3px;
    }
    </style>

    <div class="mybackground">

        <nav>
            <div class="nav-wrapper white">
                <div class="row">
                    <div class="col s2">
                        <i class="black-text left">
                            <?php echo isset($_SESSION['staff']) ? "Hello Staff " . $_SESSION['staff'] : ''; ?>
                        </i>
                    </div>
                </div>




            </div>

            <!-- Navbar goes here -->

            <!-- Page Layout here -->
            <div class="row">

                <div class="col s2">

                    <ul class="left hide-on-med-and-down">

                        <li><a href="Staff_index.php">Library</a></li><br>
                        <li><a href="CreateAccountStaff.php">Add User</a></li><br>
                        <li><a class="white-text" href="/ProjectSIA2/Logout.php">Sign Out</a></li><br>
                    </ul>
                </div>

                <div class="col s9 center">
                    <!-- Teal page content  -->
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
                        <div class="col s4">
                            <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/A_Programmers_Guide_to_the_Mind.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book1.jpg" alt="A Programmer's Guide to the mind">A Programmer's Guide to the Mind</div>
                        </div>
                        <div class="col s4">
                            <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/Learn_Java_for_Web_Development.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book2.jpg" alt="Learn Java For Web Development"> Learn Java For Web Development</div>
                        </div>
                        <div class="col s4">
                            <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/Web_animation.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book3.jpg" alt="Web Animation using JavaScript">Web Animation using JavaScript</div>
                        </div>

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
                        <div class="col s4">
                        <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/A_Programmers_Guide_to_the_Mind.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book1.jpg" alt="A Programmer's Guide to the mind">A Programmer's Guide to the Mind</div>
                        </div>
                        <div class="col s4">
                            <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/Web_animation.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book3.jpg" alt="Web Animation using JavaScript">Web Animation using JavaScript</div>
                        </div>
                        <div class="col s4">
                            <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/Web_animation.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book3.jpg" alt="Web Animation using JavaScript">Web Animation using JavaScript</div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                </div>
            </div>
            <!-- HM Modal Structure -->
            <div id="hmmodal" class="modal">
                <div class="modal-content">
                    <h4 class="black-text">HM Library</h4>
                    <p class="black-text">A bunch of books</p>
                    <div class="row">
                        <div class="col s4">
                            <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/Web_animation.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book3.jpg" alt="Web Animation using JavaScript">Web Animation using JavaScript</div>
                        </div>
                        <div class="col s4">
                            <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/Web_animation.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book3.jpg" alt="Web Animation using JavaScript">Web Animation using JavaScript</div>
                        </div>
                        <div class="col s4">
                            <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/Web_animation.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book3.jpg" alt="Web Animation using JavaScript">Web Animation using JavaScript</div>
                        </div>

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
                        <div class="col s4">
                            <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/Web_animation.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book3.jpg" alt="Web Animation using JavaScript">Web Animation using JavaScript</div>
                        </div>
                        <div class="col s4">
                            <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/Web_animation.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book3.jpg" alt="Web Animation using JavaScript">Web Animation using JavaScript</div>
                        </div>
                        <div class="col s4">
                            <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/Web_animation.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book3.jpg" alt="Web Animation using JavaScript">Web Animation using JavaScript</div>
                        </div>

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
                        <div class="col s4">
                            <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/Web_animation.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book3.jpg" alt="Web Animation using JavaScript">Web Animation using JavaScript</div>
                        </div>
                        <div class="col s4">
                            <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/Web_animation.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book3.jpg" alt="Web Animation using JavaScript">Web Animation using JavaScript</div>
                        </div>
                        <div class="col s4">
                            <div class="card-panel hoverable black-text" onclick="location.href='/ProjectSIA2/pdf/Web_animation.pdf'"><img class="responsive-img" src="/ProjectSIA2/image/Book3.jpg" alt="Web Animation using JavaScript">Web Animation using JavaScript</div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                </div>
            </div>
        </div>
    </div>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        M.Modal.init(elems);
    });
    </script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="/ProjectSIA2/materialize/js/materialize.js"></script>
    <!-- Jquery -->
    <script type="text/javascript" src="/ProjectSIA2/jquery/jquery.js"></script>

</body>

</html> 