<?php
include "start.php";

if(!isset($_SESSION["ID"])){
    header("location: loginForm.php");
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
        if(isset($_GET["badFile"]) && $_GET["badFile"]){
            echo '<p style="color:red;"> The only supported file types are png, jpg and jpeg.</p><br>';
        }
        if(isset($_GET["errorFile"]) && $_GET["errorFile"]){
            echo '<p style="color:red;"> There was an error uploading the file.</p><br>';
        }
        
        ?>
        <div class="postDiv">
            <form action = "postHandling.php" method="post" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input id="title" type="text" required name="title">    
                <br>
                <label for="text">Text</label>
                <input id="text" type="textbox" required name="text">
                <br>
                <label for="image">Image</label>
                <input id="image" type="file" name="image">
                <br>
                <label for="expiration">Until when is the offer open</label>
                <input id="expiration" type="date" required name="expiration">
                <br>
                <label for="targetPledge">How many people need to be interested</label>
                <input id="targetPledge" type="number" required name="targetPledge">
                <br>
                <input type="submit" value="Submit">
            </form>
        </div>

    </body>"

</html>