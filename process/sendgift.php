<?php

include '../include/database.php';

$sender = 'iceman@gmail.com';

$profileId = $_POST['profileId'];
$senderUser = $sender;
$giveGifts = $_POST['sendGift'];

foreach ($giveGifts as $giveGift){
  $gift = $conn->prepare("INSERT INTO userHasGift (giftId, userId, sender_userId) VALUES (?, ?, ?)");
  $gift->bindParam(1, $giveGift);
  $gift->bindParam(2, $profileId);
  $gift->bindParam(3, $senderUser);

  $gift->execute();
  }

header("Location: ../sentGift.php");
?>
