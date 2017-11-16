<?php

  include '../include/database.php';

  //variabler
  $profileId = $_POST['profileId'];
  $likeProfile = 1;

  //Tilføjer et like når der klikkes på det givende user id = email.
  $updateLikes = $conn->prepare("UPDATE user SET likes = likes + :likes WHERE email = '$profileId'");
  $updateLikes->bindParam(':likes', $likeProfile );
  $updateLikes->execute();
  header("Location: ../gifts.php");
?>
