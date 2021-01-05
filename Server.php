<?php
session_start();


$username = "";
$email    = "";
global $editReview;
$editReview = false;


global $loggedIn;
$loggedIn= false;

if(isset($_SESSION['editID']))
    echo($_SESSION['editID']);


if(isset($_SESSION['userName']) && isset($_SESSION['loggedInUser']) ){
    $loggedIn = true;
}


$database = new mysqli('localhost', 'root', '', 'lastrada');


if ($database->connect_error) {
    die("Connection failed: " . $database->connect_error);
}

$commentsDatabase = $database->query("SELECT * FROM comments ORDER BY created_at DESC");
$comments = mysqli_fetch_all($commentsDatabase, MYSQLI_ASSOC);


if (isset($_POST['comment_posted'])) {
    $comment = $database->real_escape_string($_POST['comment_text']);
    if(isset($_SESSION['editBody'])) {
        $editID = $_SESSION['editID'];
        $database->query("UPDATE comments Set Body ='$comment' WHERE Comment_ID = '$editID' ");
        unset($_SESSION['editBody']);
        unset($_SESSION['editID']);
        exit('Comment edited');
    }else {
        $database->query("INSERT INTO comments (Body, Created_by, Created_at, Updated_at) VALUES ('$comment', 13,  now(), null)");
        exit('Comment added');
    }
}

if (isset($_GET['edit'])) {
    $comment_id = $_GET['edit'];
    $_SESSION['editID'] = $comment_id;
    $sql = $database->query( "SELECT Body FROM comments WHERE Comment_ID='$comment_id'");
    $data = $sql->fetch_assoc();
    $editReview = true;
    $_SESSION['editBody'] = $data['Body'];
    header('location: Recenzie.php');
}

//delete
if (isset($_GET['delete'])) {
    $comment_id = $_GET['delete'];
    $database->query( "DELETE FROM comments WHERE Comment_ID='$comment_id'");
    //$_SESSION['message'] = "Address deleted!";
    header('location: Recenzie.php');
}

if (isset($_POST['Register'])) {
    // receive all input values from the form
    $username = $database->real_escape_string($_POST['uname']);
    $email = $database->real_escape_string($_POST['email']);
    $pass = $database->real_escape_string($_POST['pass']);


    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = $database->query("SELECT id FROM users WHERE email='$email'");
        if ($sql->num_rows > 0) {
            exit('failedUserExists');
        } else {
            //$password = md5( $pass);
            //$password = password_hash($pass, PASSWORD_DEFAULT);
            $database->query("INSERT INTO users (username, email, password)  VALUES('$username', '$email', '$pass')");
            $sql = $database->query("SELECT id FROM users WHERE username='$username'");
            $data = $sql->fetch_assoc();
            $_SESSION['loggedInUser'] = 1;
            $_SESSION['userName'] = $username;
            $_SESSION['userID'] = $data['id'];
            exit('success');

        }
    }else{
        exit('failedEmail');
    }

}

if (isset($_POST['Login'])) {
    $username = $database->real_escape_string($_POST['name']);
    $pass = $database->real_escape_string($_POST['pass']);


    //$password = md5( $password);
    //$password = password_hash($password, PASSWORD_DEFAULT);
    $sql = $database->query("SELECT * FROM users WHERE username='$username' AND password='$pass'");
    if ($sql->num_rows == 1) {
        $data = $sql->fetch_assoc();
        $_SESSION['username'] = $username; //
        $_SESSION['loggedInUser'] = 1;
        $loggedIn = true;
        header('location: Index.php');
    }else {
        exit('Wrong username/password combination');
    }

}


if (isset($_POST['Logout'])) {
    echo 'Logout';
    unset($_SESSION['username'] );
    unset($_SESSION['loggedInUser']);
    $loggedIn = false;
    header('location: Index.php');
    exit('Logged out');

}


