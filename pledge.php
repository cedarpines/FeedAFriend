<?php
include "start.php";
include 'header.php';
if(!isset($_SESSION["ID"])){
    header("location: loginForm.php");
    exit();
}
$test = $conn->query("SELECT * FROM PLEDGELIST WHERE PID = '$_GET[post]'
 AND UID = '$_SESSION[ID]'");
if($test->num_rows>0){
    echo '<p>You have already pledge to this post.</p> 
    <a href="unpledge.php?post='.$_GET["post"].'"><button>Unpledge?</button></a>';
}else{

if(isset($_GET["confirmed"]) && $_GET["confirmed"]){
    $conn->query("INSERT INTO PLEDGELIST (UID, PID) 
VALUES ('$_SESSION[ID]', '$_GET[post]')");
    $conn->query("UPDATE FARMPOST SET currentPledge = currentPledge + 1 WHERE PID = '$_GET[post]'");
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
            Confirm your pledge to:
        </h1>';
        
        $result = $conn->query("SELECT * FROM FARMPOST WHERE PID = '$_GET[post]'");
        $row = $result->fetch_assoc();
        $result2 = $conn->query("SELECT * FROM USER WHERE ID = '$row[UID]'");
        $row2 = $result2->fetch_assoc();
        echo '<div class="forum-post">
            <div class="row1">
                <a href="farming.php?filter='.$row["UID"].'"><h3>'.$row2["username"].'</h3></a>
            </div>
            <div class="row2">
                <h4>'.$row["title"].'</h4>
            </div>
            <div class="row3-1">
                <div class="forum-image">
                    <img src="images/'.$row["image"].".".$row["imageExt"].'"
                        alt="">  
                </div>
            </div>
            <div class="row3-2">
                <p>'.$row["text"].'</p>
            </div>
            <div class="row3">
                '.$row["currentPledge"] . ' out of '.$row["targetPledge"].'
            </div>'; 
echo '  
        <a href="pledge.php?post='. $_GET["post"] . '&confirmed=true"><button class="btnMini">Confirm</button></a>
            <a href="farming.php"><button class="btnMini">Return</button></a>
        </form>

    </body>

</html>
';
}
?>