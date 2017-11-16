<?php
include 'include/head.php';
include 'include/database.php';
include 'include/footer.php';

$messages = $conn->query('SELECT * FROM message')->fetchAll();

?> 
<ul>
  <li><a href="recievedMessage.php">Recieved messages</a></li>
  <li><a href="sentMessage.php">Sendt messages</a></li>
</ul>
<?php
foreach ($messages as $message) {
  if ($message['sender_userEmail'] !== 'iceman@gmail.com'){
  ?>
  <section class="message">
    <h1>From: <?php echo $message['sender_userEmail']; ?></h1>
    <p><?php echo $message['messageText']; ?></p>
    <p>Date: <?php echo $message['date']; ?></p>
  </section>
  <?php
}
}
 ?>
