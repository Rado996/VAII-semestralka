<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>LaStrada/Recenzie</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <style>
        <?php include 'css/1.css'; ?>
    </style>



</head>
<body>
<div class="header">
    <img src="img/lastradalogo_1.png" alt="Logo" />
</div>
<nav class="navbar-expand-md navbar-dark">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="Index.php">Domov</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="Ponuka.php">Ponuka</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="Fotogaleria.php">Fotogaleria</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " href="Registracia.php">Registracia</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " href="Login.php">Prihlasenie</a>
            </li>
        </ul>
    </div>
</nav>

<div class="forms registration">
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