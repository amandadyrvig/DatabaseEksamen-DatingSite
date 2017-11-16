<?php
include 'include/head.php';
include 'include/database.php';
include 'include/footer.php';

$sentmessages = $conn->query('SELECT * FROM message')->fetchAll();

?>
<ul>
  <li><a href="recievedMessage.php">Recieved messages</a></li>
  <li><a href="sentMessage.php">Sendt messages</a></li>
</ul>
<?php

foreach ($sentmessages as $sentmessage) {
  if ($sentmessage['sender_userEmail'] === 'iceman@gmail.com'){
  ?>
  <section class="message">
    <h1>To: <?php echo $sentmessage['userEmail']; ?></h1>
    <p><?php echo $sentmessage['messageText']; ?></p>
    <p>Date: <?php echo $sentmessage['date']; ?></p>
  </section>
  <?php
}
}
 ?>
