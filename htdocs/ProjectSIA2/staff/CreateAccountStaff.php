<!DOCTYPE html>
<html lang="en">

<head>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/ProjectSIA2/materialize/css/materialize.css" media="screen,projection" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>

</head>

<body>

    <div class="mybackground">
        <!-- container -->
        <div class="container">


            <div class="row">
                <br><br><br><br>

                <div class="col s3"></div>
                <div class="col s7">
                    <div class="card-panel">





                        <p class="teal-text">
                            <?php if( isset($_GET['error'])){
                        echo "<p class=red-text>" . $_GET['error'] . "</p>";}elseif(isset($_GET['success'])){
                         echo "<p class=teal-text>" . $_GET['success'] . "</p>";
                         }
                         ?>
                        </p>





                        <form action="CreateAccount_Verifier.php" method="post">


                            <div class="input-field">
                                <label class="teal-text">Username</label>
                                <input type="text" name="username" id="">
                            </div>

                            <div class="input-field">
                                <label class="teal-text">Password</label>
                                <input type="password" name="password" id="">
                            </div>

                            <div class="input-field">
                                <label class="teal-text">Confirm Password</label>
                                <input type="password" name="confrmpassword" id="">
                            </div>

                            <div class="input-field">
                                <label class="teal-text">Name</label>
                                <input type="text" name="name">
                            </div>

                            <!-- selection -->
                            <label class="teal-text">Select Type</label>
                            <div class="input-field">
                                <select name="type" id="cars" class="input-field col s12">
                                    <option value="choose">Choose</option>
                                    <option value="user">User</option>
                                    <option value="staff" disabled>Staff</option>
                                </select>
                            </div><br>



                            <input type="submit" name="submit" class="btn">
                            <a href="/ProjectSIA2/login.php" class="btn blue">Click here to log In</a>

                           <a href="Staff_index.php" class="btn red">Back</a>
                        </form>
                      

                    </div>
                </div>

            </div>

        </div>





        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="/ProjectSIA2/materialize/js/materialize.js"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sel = document.querySelectorAll('select');
            M.FormSelect.init(sel);
        })
        </script>
</body>

</html>