<?php

include 'include/head.php';
include 'include/database.php';
include 'include/footer.php';

$id = $_POST['id'];

?>
<section class="sendMessage">
<form class="" action="processMessage.php" method="post">
  <h1>Send a Message to <?php echo $id?>!</h1>
  <label for=""><?php echo $user['email']?></label>
  <input type="hidden" name="profileId" value="<?php echo $id?>">
  <textarea name="messageText" rows="8" cols="80"></textarea>
  <button type="submit" name="button" value="insert">Submit</button>
</form>
</section>
