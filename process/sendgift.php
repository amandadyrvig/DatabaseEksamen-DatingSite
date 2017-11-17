<?php

include '../include/database.php';

$sender = 'iceman@gmail.com';

$profileId = $_POST['profileId'];
$senderUser = $sender;
$gifts = $_POST['gift'];

foreach ($gifts as $gift){
  $sendGift = $conn->prepare("INSERT INTO userHasGift (giftId, userId, sender_userId) VALUES (?, ?, ?");
  $sendGift->bindParam(1, $gift);
  $sendGift->bindParam(2, $profileId);
  $sendGift->bindParam(3, $senderUser);

  $sendGift->execute();

  echo($gifts);
  }
?>
