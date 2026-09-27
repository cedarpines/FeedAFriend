<?php
include 'start.php';

$conn->query('Create TABLE FARMPOST (PID int AUTO_INCREMENT PRIMARY KEY,
 UID int NOT NULL, title varchar(255) NOT NULL, text varchar(255) NOT NULL, image int UNIQUE, imageExt varchar(4),
 timeOfPost timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL, expiration DATE NOT NULL,
 targetPledge int NOT NULL, currentPledge int DEFAULT 0, FOREIGN KEY (UID) REFERENCES USER(ID))');

?>