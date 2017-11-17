<?php
include '../include/database.php';

$sender = 'iceman@gmail.com';

$profileId = $_POST['profileId'];
$senderUser = $sender;
$messageText = $_POST['messageText'];

$userMessage = $conn->prepare('INSERT INTO message (messageText, userEmail, sender_userEmail) VALUES (?, ?, ?)');
$userMessage->bindParam(1, $messageText);
$userMessage->bindParam(2, $profileId);
$userMessage->bindParam(3, $senderUser);

$userMessage->execute();

header("Location: ../sentMessage.php");
?>
