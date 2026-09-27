<?php
include "start.php";
if(isset($_SESSION["ID"])){
    header("location: index.php");
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

            if(isset($_GET["Invalid"]) && $_GET["Invalid"]){
                echo '<p style="color:red;">Invalid username/email or password </p><br>';
            }
        ?>      


        <div class="loginDiv">
            <form action = "loginHandling.php" method="post">
                <label for="emailUsername"><strong>Email or Username:</strong></label>
                <input id="emailUsername" type="text" required name="emailUsername">
                <br>
                <label for="password"><strong>Password:</strong></label>
                <input id="password" required type="password" name="password">
                <br>
                <input type="submit" value="Submit">
            </form>

            <p>Don't have an account?<p>
            <a href="signUp.php" id="signUp">Sign Up</a>
        </div>
    </body>

</html>