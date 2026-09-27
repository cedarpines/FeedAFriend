<?php
include 'start.php';

$emailUsername = htmlspecialchars($_POST['emailUsername']);
$password = htmlspecialchars($_POST['password']);

if(filter_var($emailUsername, FILTER_VALIDATE_EMAIL)){
    $result = $conn->query("SELECT * From USER WHERE email = '$emailUsername'");
    if($results->num_rows <1){
        header("loginForm.php?Invalid");
        exit("Invalid Email/Username");
    }elseif($results->num_rows >1){
        header("loginForm.php?Invalid");
        exit("Unknown error");
    }
    $info = $result->fetch_assoc();
    if($password != $info["pass"]){
        header("loginForm.php?Invalid");
        exit("Invalid Password");
    }
}else{
    $result = $conn->query("SELECT * From USER WHERE username = '$emailUsername'");
    if($result->num_rows <1){
        header("loginForm.php?Invalid=true");
        exit("Invalid Email/Username");
    }elseif($result->num_rows >1){
        header("loginForm.php?Invalid=true");
        exit("Unknown error");
    }
    $info = $result->fetch_assoc();
    if($password != $info["pass"]){
        header("loginForm.php?Invalid=true");
        exit("Invalid Password");
    }
}

$_SESSION["username"] = $info["username"];
$_SESSION["email"] = $info["email"];
$_SESSION["firstName"] = $info["firstname"];
$_SESSION["lastName"] = $info["lastname"];
$_SESSION["typeUser"] = $info["typeuser"];
$_SESSION["ID"] = $info["ID"];


?>
<a href="index.php" style="text-decoration=none;">
    <?php 
    include 'header.php';
    ?>
</a>


<p>
    You have successfully logged in <br>
    <a href="logout.php"><button class="btnThin">Log Out</a>
</p>