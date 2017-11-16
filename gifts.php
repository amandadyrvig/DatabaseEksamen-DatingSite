<?php
include 'include/head.php';
include 'include/database.php';
include 'include/footer.php';

$sendGifts = $conn->query('SELECT * FROM user')->fetchAll();

foreach ($sendGifts as $sendGift) {
  ?>
    <h1>Send a gift to <?php echo $sendGift['email'];?></h1>
  <?php
}
?>
