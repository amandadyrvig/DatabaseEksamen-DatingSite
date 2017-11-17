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

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    body {
      text-align: center;
      padding-top: 100px;
    }
    h3 {
      padding-top: 30px;
    }
    section {
      display: block;
      padding: 20px;
    }
    button {
      padding: 10px;
      margin-top: 30px;
    }
    a {
      display: block;
      padding: 10px;
    }
    </style>
  </head>
  <body>

<h1>You gave a LIKE to <?php echo $profileId?>!</h1>
<h2>send a gift too!</h2>
<form class="" action="sendgift.php" method="post">
  <h3>Choose a gift(s)</h3>
  <input type="hidden" name="profileId" value="<?php echo $profileId?>">
    <?php
        foreach ($gifts as $gift) {
          ?>
          <section>
            <input type="checkbox" name="sendGift[]" value="<?php echo $gift['title'];?>">
            <label for=""><?php echo $gift['title'];?></label>
          </section>
          <?php
        }
        ?>
  <button type="submit" name="button" value="insert">Submit</button>
  <a href="../index.php">Skip</a>

</form>

</body>
</html>
