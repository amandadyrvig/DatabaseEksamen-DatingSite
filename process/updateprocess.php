<?php

include '../include/database.php';

//variabler
$profileId = 'iceman@gmail.com';
$profileLogin = $profileId;

$name = $_POST['name'];
$image = $_POST['image'];
$description = $_POST['description'];

//Find data
$updateProfile = $conn->prepare("UPDATE user SET name = :name, description = :description WHERE email = '$profileLogin'");
$updateProfile->bindParam(':name', $name);
$updateProfile->bindParam(':description', $description);

$updateProfile->execute();

$updateProfileImage = $conn->prepare("UPDATE user SET image = :image WHERE email = '$profileLogin'");
$updateProfileImage->bindParam(':image', $image);

$updateProfileImage->execute();

header("Location: ../profile.php");
?>
