<!DOCTYPE html>
<html lang="sk">
<head>

    <?php include('Head.php');
    ?>
    <style>
        <?php include 'css/1.css'; ?>
    </style>
</head>
<body>


<div class="forms registration ">
    <form method="post" >
        <label for="uname">Použíateľské meno:</label><br>
        <input type="text" id="uname" name="uname" value=""><br>
        <label for="pass">Heslo:</label><br>
        <input type="password" id="pass" name="pass" value=""><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value=""><br><br>
        <button type="submit" name="Register">Registrovať</button>
    </form>

</div>

</body>
</html>