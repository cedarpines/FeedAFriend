<?php
include "start.php";
if(isset($_SESSION["ID"])){
    header("index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Food Finder</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php

        include 'header.php';

        if(isset($_GET["usernameError"]) && $_GET["usernameError"]){
            echo '<p style="color:red;">Username is already taken</p><br>';
        }
        if(isset($_GET["emailError"]) && $_GET["emailError"]){
            echo '<p style="color:red;">Invalid email or email is already in use</p><br>';
        }
        if(isset($_GET["password2Error"]) && $_GET["password2Error"]){
            echo '<p style="color:red;">Passwords must match</p><br>';
        }
?>
        <form action = "newUserHandling.php" method="post">
            <label for="firstName">First Name</label>
            <input id="firstName" type="text" required name="firstName">
            <br>
            <label for="lastName">Last Name</label>
            <input id="lastName" type="text" required name="lastName">
            <br>
            <p>Type of user</p>
            <div>
                <input type="radio" id="farmer" required name="typeUser">
                <label for="farmer">Farmer</label>
                <input type="radio" id="Non farmer" required name="typeUser">
                <label for="Non farmer">Non farmer</label> 
            </div>
            <br>
            <label for="username">Username</label>
            <input id="username" type="text" required name="username">
            <br>
            <label for="email">Email</label>
            <input id="email" type="email" required name="email">
            <br>
            <label for="password">Password</label>
            <input id="password" required type="password" name="password">
            <br>
            <label for="password2">Repeat password</label>
            <input id="password2" required type="password" name="password2">
            <br>
            <input type="submit" value="Submit">
        </form>

    </body>"

</html>