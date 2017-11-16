<?php

include '../include/database.php';

//variabler
$comment = $_POST['comment'];
$profileId = $_POST['profileId'];
$senderUser = $sender;
$sender = 'peterHansen@gmail.com';


$userComment = $conn->prepare("INSERT INTO comment (messageText, userEmail, sender_userEmail) VALUES (?, ?, ?)");
$userComment->bindParam(1, $comment);
$userComment->bindParam(2, $profileId);
$userComment->bindParam(4, $senderUser);

$userComment->execute();

echo($userComment);

//header("Location: ../index.php");

?>
