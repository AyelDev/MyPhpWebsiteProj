<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="Account_Verifier.php" method="post">
        <label>Username</label>
        <input type="text" name="username">
        <label>Password</label>
        <input type="password" name="password">
        <button type="submit" name="submit">
            <p>Login</p>
        </button>
        <a href="CreateAccount.php">Create Account</a>

    </form>

</body>

</html>


<?php session_unset(); ?>