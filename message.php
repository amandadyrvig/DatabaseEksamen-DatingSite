<?php
include 'include/head.php';
include 'include/database.php';
include 'include/footer.php';

$messages = $conn->query('SELECT * FROM message')->fetchAll();

foreach ($messages as $message) {
  ?>
    <p><?php echo $message['userEmail']; ?></p>
    <p><?php echo $message['messageText']; ?></p>
    <p><?php echo $message['date']; ?></p>
  <?php
}
 ?>
