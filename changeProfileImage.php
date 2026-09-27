<?php
include "start.php";

if(!isset($_SESSION["ID"])){
    header("location: loginForm.php");
    exit();
}
if(isset($_POST["change"]) && $_POST["change"]=="change"){

if($_FILES["image"]["error"]==0){

$fileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"){
    header("location: postForm.php?badFile=true");
    exit("Bad File");
}

if(!move_uploaded_file($_FILES["image"]["tmp_name"],"profilePicture/" . $_SESSION["ID"] .".". $fileType)){
    header("location: changeProfileImage.php?errorFile=true");
    exit("Error File");
}else{
    $conn->query("UPDATE USER SET imageExt = '$fileType' WHERE ID = '$_SESSION[ID]' ");
    header("location: index.php");
}
}
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
        <form action = "changeProfileImage.php" method="post" enctype="multipart/form-data">
            <br>
            <input value="change" id="change" name="change" type="hidden">
            <label for="image">Image</label>
            <input id="image" type="file" name="image">
            <br>
            <input type="submit" value="Submit">
        </form>

    </body>"

</html>