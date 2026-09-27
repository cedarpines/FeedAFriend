<?php
include 'start.php';


session_unset();
session_destroy();
session_write_close();

?>
    <?php 
    include 'header.php';
    ?>
<div class="loginDiv">
    <p>You have successfully logged out<br>
    <a href="loginForm.php"><button class="btnMini">Log In</button></a></p>
</div>