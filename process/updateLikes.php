<?php

  include '../include/database.php';

  //variabler
  $profileId = $_POST['profileId'];
  $likeProfile = 1;

  //Tilføjer et like når der klikkes på det givende user id = email.
  $updateLikes = $conn->prepare("UPDATE user SET likes = likes + :likes WHERE email = '$profileId'");
  $updateLikes->bindParam(':likes', $likeProfile );
  $updateLikes->execute();

  $gifts = $conn->query('SELECT * FROM gift')->fetchAll();

?>

<h1>You gave a LIKE to <?php echo $profileId?>!</h1>
<h2>send a gift too!</h2>
<form class="" action="sendgift.php" method="post">
  <h3>Choose a gift(s)</h3>
  <input type="hidden" name="profileId" value="<?php echo $profileId?>">
    <?php
    foreach ($gifts as $gift) {
      ?>
      <input type="checkbox" name="gift[]" value="<?php echo $gift['title'];?>">
      <label><?php echo $gift['title'];?></label>
      <?php
    }
    ?>
  <button type="submit" name="button" value="insert">Submit</button>

</form>
