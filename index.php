<?php 
include 'start.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedAFriend</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>

<?php 
include 'header.php';
?>

<?php
if(!isset($_SESSION['ID'])){
    echo '<div class="loginBtn">
        <button class="btnThin">Login</button>
    </div>';
}else{
    echo '<div class="loginBtn">
        <button class="btnThin"><a href="logout.php">Logout<a></button>
    </div>';
}

?>

    <div class="button-group">
        <button class="btn">Recipes</button>
        <button class="btn">Gardening Tips</button>
        <button class="btn">Farming</button>
    </div>
    <div>
        <button class="btnLrg">Find a Food Bank</button>
    </div>

    <footer>
        <button class="btnThin">My Pledges</button>
    </footer>


    <script src="scripts.js" async></script>
</body>

</html>