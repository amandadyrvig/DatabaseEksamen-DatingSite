<?php

include 'include/head.php';
include 'include/database.php';
include 'include/footer.php';
include 'include/messageMenu.php';

$recievedGift = $conn->query('SELECT * FROM gift')->fetchAll();
$recievedGifts = $conn->query('SELECT user.name, gift.title, gift.giftImage, gift.description, userId FROM userHasGift JOIN user ON user.email = userHasGift.userId JOIN gift ON gift.title = userHasGift.giftID
')->fetchAll();

?><h1>Recieved Gifts</h1><?php

foreach ($recievedGifts as $recievedGift) {
  if ($recievedGift['userId'] !== 'iceman@gmail.com'){
  ?>
  <section class="message">
    <h2>From: <?php echo $recievedGift['name']; ?></h2>
    <p><?php echo $recievedGift['giftId']; ?></p>
    <img src="image/<?php echo $recievedGift['giftImage'];?>" alt="image/<?php echo $recievedGift['giftImage'];?>">
    <p><?php echo $recievedGift['description']; ?></p>
  </section>
  <?php
}
}
 ?>
