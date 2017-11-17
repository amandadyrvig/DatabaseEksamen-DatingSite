<?php
include 'include/head.php';
include 'include/database.php';
include 'include/footer.php';
include 'include/messageMenu.php';

$sentmessages = $conn->query('SELECT * FROM message')->fetchAll();

?><h1>Sent Messages</h1><?php

foreach ($sentmessages as $sentmessage) {
  if ($sentmessage['sender_userEmail'] === 'iceman@gmail.com'){
  ?>
  <section class="message">
    <h2>To: <?php echo $sentmessage['userEmail']; ?></h2>
    <p><?php echo $sentmessage['messageText']; ?></p>
    <p>Date: <?php echo $sentmessage['date']; ?></p>
  </section>
  <?php
}
}
 ?>
