<?php

include 'include/head.php';
include 'include/database.php';
include 'include/footer.php';

$id = $_POST['id'];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
      body {
        text-align: center;
      }
      h1 {
        margin-top: 100px;
      }
      textarea{
        margin: 0 auto;
      }
      button {
        display: block;
        width: 200px;
        padding: 20px;
        margin: 20px auto;
      }
    </style>
  </head>
  <body>

<section class="sendMessage">
<form class="" action="processMessage.php" method="post">
  <h1>Send a Message to <?php echo $id?>!</h1>
  <label for=""><?php echo $user['email']?></label>
  <input type="hidden" name="profileId" value="<?php echo $id?>">
  <textarea name="messageText" rows="8" cols="80"></textarea>
  <button type="submit" name="button" value="insert">Submit</button>
</form>
</section>
<a href="../index.php">Skip</a>


</body>
</html>
