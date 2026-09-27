<?php

include 'start.php';

$text = htmlspecialchars($_POST['text']);
$title = htmlspecialchars($_POST['title']);
$expiration = $_POST['expiration'];
$targetPledge = $_POST['targetPledge'];

if($_FILES["image"]["error"]==0){

$fileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"){
    header("location: postForm.php?badFile=true");
    exit("Bad File");
}

$result = $conn->query("SELECT image FROM FARMPOST WHERE image IS NOT NULL 
ORDER BY timeOfPost DESC");

if($result->num_rows<1){
    $IID = 1;
}else{
    $row=$result->fetch_assoc();
    $IID = $row["image"]+1; 
}
$conn->query("INSERT INTO FARMPOST (UID, title, text, image, imageExt, expiration, targetPledge) 
VALUES ('$_SESSION[ID]', '$title', '$text', '$IID', '$fileType', '$expiration', '$targetPledge')");

if(!move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $IID .".". $fileType)){
    header("location: postForm.php?errorFile=true");
    exit("Error File");
}else{
    header("location: farming.php");
}


}else
$conn->query("INSERT INTO FARMPOST (UID, text, image, imageExt, expiration, targetPledge) 
VALUES ('$_SESSION[ID]', '$text', NULL, NULL, '$expiration', '$targetPledge')");





?>