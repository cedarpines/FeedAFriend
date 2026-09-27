<?php
include "start.php";
if(!isset($_SESSION["ID"])){
    header("location: loginForm.php");
    exit();
}
$test = $conn->query("SELECT * FROM PLEDGELIST WHERE PID = '$_GET[post]'
 AND UID = '$_SESSION[ID]'");
if($test->num_rows<1){
    echo '<p>You have not pledge to this post.</p> 
    <a href="pledge.php?post='.$_GET["post"].'"><button>pledge?</button></a>';
}else{

if(isset($_GET["confirmed"]) && $_GET["confirmed"]){
    $conn->query("DELETE FROM PLEDGELIST WHERE UID = '$_SESSION[ID]' AND
    PID ='$_GET[post]'");
    $conn->query("UPDATE FARMPOST SET currentPledge = currentPledge - 1 WHERE PID = '$_GET[post]'");
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
        <h1>
            Confirm the removal of your pledge to:
        </h1>';
        
        $result = $conn->query("SELECT * FROM FARMPOST WHERE PID = '$_GET[post]'");
        $row = $result->fetch_assoc();
        $result2 = $conn->query("SELECT * FROM USER WHERE ID = '$row[UID]'");
        $row2 = $result2->fetch_assoc();
        echo '<div class="forum-post">
            <div class="row1-1">
                <a href="farming.php?filter='.$row["UID"].'">
                <h3>'.$row2["username"].'</h3></a>
            </div>
            <div class="row1-2">
                <a href="farming.php?filter='.$row["UID"].'">
                <img src="profilePicture/' . $row2["ID"] . '.' . $row2["imageExt"].'" alt="">
                </a>
            </div>
            <div class="row2">
                Post Title '.$row["title"].'
            </div>
            <div class="row3-1">
                <div class="forum-image">
                    <img src="images/'.$row["image"].".".$row["imageExt"].'"
                        alt="">  
                </div>
            </div>
            <div class="row3-2">
                DESCRIPTION
                <p>'.$row["text"].'</p>
            </div>
            <div class="row3">
                Progress bar
                '.$row["currentPledge"] . ' out of '.$row["targetPledge"].'
            </div>'; 
echo '  
        <a href="unpledge.php?post='. $_GET["post"] . '&confirmed=true"><button>confirm</button></a>
            <a href="farming.php"><button>return</button></a>
        </form>

    </body>

</html>
';
}
?>