<?php
include 'include/head.php';
include 'include/database.php';
include 'include/footer.php';
include 'include/messageMenu.php';

$messages = $conn->query('SELECT * FROM message')->fetchAll();
$recievedGifts = $conn->query('SELECT * FROM userHasGift JOIN user ON user.email = userHasGift.userId')->fetchAll();

?><h1>Recieved Message</h1><?php

foreach ($messages as $message) {
  if ($message['sender_userEmail'] !== 'iceman@gmail.com'){
  ?>
  <section class="message">
    <h2>From: <?php echo $message['sender_userEmail']; ?></h2>
    <p><?php echo $message['messageText']; ?></p>
    <p>Date: <?php echo $message['date']; ?></p>
  </section>
  <?php
}
}
 ?>
