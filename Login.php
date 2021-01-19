<!DOCTYPE html>
<html lang="sk">
<head>

    <?php include('Head.php');
    ?>

</head>
<body>


<div class="forms loginform ">
    <form method="post" action="login.php">
        <label for="uname">Používateľské meno:</label><br>
        <input type="text" id="uname" name="name" value=""><br>
        <label for="pass">Heslo:</label><br>
        <input type="password" id="pass" name="pass" value=""><br><br>
        <button type="submit" id="LogIn" name="Login">Prihlásiť</button>
    </form>

</div>

</body>
</html>
