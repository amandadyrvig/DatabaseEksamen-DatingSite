<?php

  include '../include/database.php';

  //variabler
  $profileId = $_POST['profileId'];
  $likeProfile = 1;

  //Tilføjer et like når der klikkes på det givende user id = email.
  $updateLikes = $conn->prepare("UPDATE user SET likes = likes + :likes WHERE email = '$profileId'");
  $updateLikes->bindParam(':likes', $likeProfile );
  $updateLikes->execute();
?>

<h1>You gave a LIKE to <?php echo $profileId?>!</h1>
<h2>send a gift too!</h2>
<form class="" action="process/sendgift.php" method="post">
  <select name="chooseTable">
  <option value="dogs"></option>
  <option value="cats">Kat</option>
  </select>

</form>
