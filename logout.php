<?php
include 'start.php';


session_unset();
session_destroy();
session_write_close();

?>
<a href="index.php" style="text-decoration=none;">
    <?php 
    include 'header.php';
    ?>
</a>

<p>You have successfully logged out<br>
<a href="loginForm.php"><button>Log In</a></p>