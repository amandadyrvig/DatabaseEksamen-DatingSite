<?php

include '../include/database.php';

//variabler
$name = $_POST['name'];
$image = $_POST['image'];
$description = $_POST['description'];

//$updateProfile = $conn->query("UPDATE user SET name ='$name' WHERE email = 'peterHansen@gmail.com'");
$updateProfile = $conn->prepare("UPDATE user SET name = :name, description = :description WHERE email = 'peterHansen@gmail.com'");
$updateProfile->bindParam(':name', $name);
$updateProfile->bindParam(':description', $description);

$updateProfile->execute();

$updateProfileImage = $conn->prepare("UPDATE user SET image = :image WHERE email = 'peterHansen@gmail.com'");
$updateProfileImage->bindParam(':image', $image);

$updateProfileImage->execute();

header("Location: ../profile.php");
?>
