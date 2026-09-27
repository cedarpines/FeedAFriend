<?php
include 'start.php';

$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$email = htmlspecialchars($_POST['email']);
$typeUser = htmlspecialchars($_POST['typeUser']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$password2 = htmlspecialchars($_POST['password2']);



if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: signUp.php?emailError=true");
    exit("Invalid Email");
}

echo "SELECT email From Users Where email = $email";

$result = $conn->query("SELECT email From User Where email = '$email'");
$result2 = $conn->query("SELECT username From User Where username = '$username'");

if($result->num_rows>0){
    header("Location: signUp.php?emailError=true");
    exit("Bad Email");
}elseif($result2->num_rows>0){
    header("Location: signUp.php?usernameError=true");
    exit("Bad Username"); 
}elseif(!($password === $password2)){
    header("Location: signUp.php?password2Error=true");
    exit("Non matching Password"); 
}
else{



$conn->query("INSERT INTO User (email, lastname, firstname, typeuser, username, pass) 
VALUES ('$email', '$lastName', '$firstName', '$typeUser', '$username', '$password')");
}
?>
<p>Thank you for creating an account to log in please go <a href="loginForm.php">here</p>