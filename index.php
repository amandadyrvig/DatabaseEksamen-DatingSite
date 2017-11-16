

    <?php

    include 'include/head.php';
    include 'include/database.php';
    include 'include/footer.php';

    //visning af indholdet.
    $datingProfils = $conn->query('SELECT * FROM user')->fetchAll();
    $comments = $conn->query('SELECT * FROM comment')->fetchAll();

    foreach ($datingProfils as $datingProfil){
      //fjerner profilen med givende id.
      if ($datingProfil['email'] !== 'peterHansen@gmail.com'){
      ?>
        <h1><?php echo $datingProfil['name']; ?></h1>
        <h2><?php echo $datingProfil['age']; ?></h2>
        <p><?php echo $datingProfil['description']; ?></p>
        <img src="image/<?php echo $datingProfil['image'];?>" alt="image/<?php echo $datingProfil['image'];?>">
        <p><?php echo $datingProfil['likes']; ?></p>

        <form class="" action="process/updateLikes.php" method="post">
          <input type="hidden" name="profileId" value="<?php echo $datingProfil['email']; ?>">
          <button type="submit" name="button" value="insert">Like</button>
        </form>

        <?php
        foreach ($comments as $comment) {
          if ($comment['userEmail'] === $datingProfil['email']){
          ?>
            <p><?php echo $comment['sender_userEmail']; ?></p>
            <p><?php echo $comment['messageText']; ?></p>
            <p><?php echo $comment['date']; ?></p>
          <?php
          }
        }
         ?>

        <form class="" action="process/commentprocess.php" method="post">
          <textarea type="text" name="messageText" placeholder="Comment"></textarea>
          <input type="hidden" name="profileId" value="<?php echo $datingProfil['email'];?>">
          <button type="submit" name="button" value="insert">Send</button>
        </form>

      
      <?php
      }
    }
    ?>
