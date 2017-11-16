<?php

include '../include/database.php';

//variabler
$name = $_POST['name'];
$image = $_POST['image'];
$description = $_POST['description'];
$superpowers = $_POST['superpower']; //POST virker kun ved dem som er cheked.

//$updateProfile = $conn->query("UPDATE user SET name ='$name' WHERE email = 'peterHansen@gmail.com'");
$updateProfile = $conn->prepare("UPDATE user SET name = :name, description = :description WHERE email = 'peterHansen@gmail.com'");
$updateProfile->bindParam(':name', $name);
$updateProfile->bindParam(':description', $description);

$updateProfile->execute();

$updateProfileImage = $conn->prepare("UPDATE user SET image = :image WHERE email = 'peterHansen@gmail.com'");
$updateProfileImage->bindParam(':image', $image);

$updateProfileImage->execute();

//binder valgte kategorier sammen med userId
foreach ($superpowers as $superpower){
  $superpowerConnect = $conn->prepare("UPDATE userHasSuperpower SET userId = :userId, superpowerId = :superpowerId WHERE email = 'peterHansen@gmail.com'");
  $superpowerConnect->bindParam(':userId', $userId);
  $superpowerConnect->bindParam(':superpowerId', $superpowers);

  $superpowerConnect->execute();
  }

echo();
//header("Location: ../profile.php");
?>
