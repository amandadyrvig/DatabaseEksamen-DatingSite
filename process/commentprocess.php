<?php

include '../include/database.php';

//variabler
$sender = 'iceman@gmail.com';
$messageText = $_POST['messageText'];
$profileId = $_POST['profileId'];
$senderUser = $sender;

$userComment = $conn->prepare('INSERT INTO comment (messageText, userEmail, sender_userEmail) VALUES (?, ?, ?)');
$userComment->bindParam(1, $messageText);
$userComment->bindParam(2, $profileId);
$userComment->bindParam(3, $senderUser);

$userComment->execute();

header("Location: ../index.php");

?>
