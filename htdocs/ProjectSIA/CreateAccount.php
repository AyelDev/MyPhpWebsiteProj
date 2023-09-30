
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="Signup.php" method="post">
        <label>Username</label>
        <input type="text" name="username" id="">
        <label>Password</label>
        <input type="password" name="password" id="">
        <label>Confirm Password</label>
        <input type="password" name="confrmpassword" id="">
        <label>Name</label>
        <input type="text" name="name">
        <label>Select Type</label>
        <select name="type" id="cars">
            <option value="user">User</option>
            <option value="staff">Staff</option>
        </select>
        <a href="login.php">Back</a>
        <button type="submit" name="submit">
        <p>Create</p>
        </button>

    </form>
</body>

</html>