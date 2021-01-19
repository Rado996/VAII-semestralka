<?php
session_start();

$username = "";
$email    = "";
global $editReview;
$editReview = false;



global $loggedIn;
$loggedIn= false;

/*if(isset($_SESSION['editID']))
    echo($_SESSION['editID']);*/


if(isset($_SESSION['userName']) && isset($_SESSION['loggedInUser']) ){
    $loggedIn = true;
}


$database = new mysqli('localhost', 'root', '', 'lastrada');


if ($database->connect_error) {
    die("Connection failed: " . $database->connect_error);
}




$commentsDatabase = $database->query("SELECT * FROM comments ORDER BY created_at DESC");
$comments = mysqli_fetch_all($commentsDatabase, MYSQLI_ASSOC);

$menuDatabase = $database->query("SELECT * FROM menu");
$menu = mysqli_fetch_all($menuDatabase, MYSQLI_ASSOC);

$pictureDatabase = $database->query("SELECT * FROM pictures");
$pics = mysqli_fetch_all($pictureDatabase, MYSQLI_ASSOC);

if (isset($_POST['comment_posted'])) {
    $comment = $database->real_escape_string($_POST['comment_text']);
    $author = $database->real_escape_string($_POST['comment_author']);
    //$post_comment = $database->prepare("SELECT * FROM users WHERE username='$username' AND password='$pass'");
   // $post_comment->bind_param("ss", $comment,  $author);
    $database->query("INSERT INTO comments (Body, Created_by, Created_at, Updated_at) VALUES ('$comment', '$author',  now(), null)");

    unset($_POST['comment_posted']);
    unset($_POST['comment_text']);
    exit('Comment added');
}


if (isset($_POST['comment_edited'])) {
    $comment = $database->real_escape_string($_POST['comment_text']);
    $editID = $_POST['comment_editID'];
    $database->query("UPDATE comments Set Body ='$comment' WHERE Comment_ID = '$editID' ");
    echo($database->error);
    unset($_POST['editBody']);
    unset($_POST['comment_editID']);
    unset($_POST['comment_edited']);
    unset($_POST['comment_text']);
    exit('Comment edited');
}


if(isset($_POST['comment_delete'])){
    $comment_id = $database->real_escape_string($_POST['comment_deleteID']);
    echo($comment_id);
    $database->query( "DELETE FROM comments WHERE Comment_ID = '$comment_id'");

    exit('Comment deleted');
}

if (isset($_POST['menuItem_submitted'])) {
    $menuItemName = $database->real_escape_string($_POST['menuItem_Name']);
    $menuItemDesc = $database->real_escape_string($_POST['menuItem_Description']);
    $menuItemIngredients = $database->real_escape_string($_POST['menuItem_Ingredients']);
    $menuItemPrice= $database->real_escape_string($_POST['menuItem_Price']);
    if(isset($_POST['menuItem_edited'])) {
        $editID = $_POST['menuItem_editID'];
        $database->query("UPDATE menu Set itemName ='$menuItemName',Description='$menuItemDesc', Ingredients='$menuItemIngredients', Price='$menuItemPrice' , Updated_at= now() WHERE id = '$editID' ");
        unset($_SESSION['menuItem_editID']);
        unset($_SESSION['menuItem_edit']);
        unset($_SESSION['menuItem_submitted']);
        unset($_SESSION['menuItem_edited']);
        exit('menu item edited');
    }else {
        $database->query("INSERT INTO menu (ItemName, Description, Ingredients, Price ,Added_at, Updated_at) VALUES ('$menuItemName', '$menuItemDesc', '$menuItemIngredients', '$menuItemPrice',  now(), null)");

        unset($_SESSION['menuItem_submitted']);
        unset($_SESSION['menuItem_added']);
        exit('Item added');
    }
}

if(isset($_POST['menuItem_deleted'])){

    $menuItem_id = $database->real_escape_string($_POST['menuItem_deleteID']);
    echo($menuItem_id);
    $database->query( "DELETE FROM menu WHERE id='$menuItem_id'");
    exit('Item deleted');
}


if (isset($_POST['submit_picture'])) {

    $image = $_FILES['image']['name'];
    $image_text = $database->real_escape_string($_POST['pic_desc']);
    $image_name = $database->real_escape_string($_POST['pic_name']);
    $target = "img/" . basename($image);
    $sql = "INSERT INTO pictures (Image_name, Image_description, Image, Created_at) VALUES ('$image_name','$image_text', '$image', now())";

    mysqli_query($database, $sql);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    unset($_POST['submit_picture']);
    unset($_FILES['image']['name']);
    unset($_POST['pic_desc']);
    header("Location: http://localhost/Vaii_sem/Fotogaleria.php");
    exit();

}


if (isset($_POST['picture_edited'])) {
    $editID = $_POST['picture_editID'];
    $pictureName =$database->real_escape_string($_POST['picture_Name']);
    $pictureDesc =$database->real_escape_string($_POST['picture_Description']);
    $database->query("UPDATE pictures Set Image_Name ='$pictureName',Image_Description='$pictureDesc', Updated_at= now() WHERE id = '$editID' ");
    echo($database->error);
    unset($_SESSION['picture_editID']);
    unset($_SESSION['picture_edited']);
    unset($_SESSION['picture_Name']);
    unset($_SESSION['picture_Description']);
    //exit('picture edited');
    exit($database->error);
}



if(isset($_POST['picture_deleted'])){

$pictureId = $database->real_escape_string($_POST['picture_deleteID']);
$database->query( "DELETE FROM pictures WHERE id='$pictureId'");
exit('Item deleted');

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
            $register_user = $database->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $register_user->bind_param("sss", $username, $email, $pass);
            $register_user->execute();
            $_SESSION['loggedInUser'] = 1;
            $_SESSION['userName'] = $username;
            exit('success');
            header('location: Index.php');
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
    $login_user = $database->prepare("SELECT * FROM users WHERE username='$username' AND password='$pass'");
    $login_user->bind_param("ss", $username,  $pass);
    $login_user->execute();
    if ($login_user->num_rows == 1) {
        $_SESSION['userName'] = $username; //
        $_SESSION['loggedInUser'] = 1;
        $loggedIn = true;
        header('location: Index.php');
    }else {
        exit('Wrong username/password combination');
    }

}


if (isset($_POST['Logout'])) {
    unset($_SESSION['userName'] );
    unset($_SESSION['loggedInUser']);
    $loggedIn = false;
    header("Location: http://localhost/Vaii_sem/Index.php");
    exit('Logged out');

}


