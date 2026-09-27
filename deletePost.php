<?php
include "start.php";
include 'header.php';
if(!isset($_SESSION["ID"])){
    header("location: loginForm.php");
    exit();
}
$result = $conn->query("SELECT * FROM FARMPOST WHERE PID = '$_GET[post]'");
$row = $result->fetch_assoc();

if($row["UID"] != $_SESSION["ID"]){
    header("location: farming.php");
}else{

if(isset($_GET["confirmed"]) && $_GET["confirmed"]){
    $conn->query("DELETE FROM FARMPOST WHERE PID = '$_GET[post]'");
    header("location: farming.php");
    exit();
}

echo '
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Food Finder</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1 class="pledgeh1">
            Do you want to delete this post?
        </h1>';
        
        $result = $conn->query("SELECT * FROM FARMPOST WHERE PID = '$_GET[post]'");
        $row = $result->fetch_assoc();
        $result2 = $conn->query("SELECT * FROM USER WHERE ID = '$row[UID]'");
        $row2 = $result2->fetch_assoc();
        echo '<div class="recipe">
        <p>'.$row2["username"].'</p>
            <div class="recipe-image">
                    <img src="images/'.$row["image"].".".$row["imageExt"].'"
                    alt="">  
            </div>
            <div class="recipe-text">
                    <h2></h2>
                    <p>'.$row["text"].'</p>
            </div>
        </div>'; 
echo '
        <div>
            <a href="deletePost.php?post='.$_GET["post"].'&confirmed=true"><button class="btnMini">confirm</button></a><a href="farming.php"><button class="btnMini">return</button></a>
        </div>
    </body>

</html>
';
}
?>