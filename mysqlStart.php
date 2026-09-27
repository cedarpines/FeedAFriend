<?php
include 'start.php';

$conn->query('Create TABLE USER (ID int AUTO_INCREMENT PRIMARY KEY,
 email varchar(255) UNIQUE NOT NULL, lastname varchar(255), 
 firstname varchar(255), typeuser varchar(20) NOT NULL,
  username varchar(255) UNIQUE NOT NULL, pass varchar(255),
   imageExt varchar(4) DEFAULT NULL)');

?>