

    <?php

    include 'include/head.php';
    include 'include/database.php';
    include 'include/footer.php';

    $profileId = 'iceman@gmail.com';
    $profileLogin = $profileId;

    //visning af indholdet.
    $datingProfils = $conn->query('SELECT * FROM user')->fetchAll();
    $comments = $conn->query('SELECT comment.userEmail, comment.sender_userEmail, comment.messageText, comment.date, user.name FROM comment JOIN user ON user.email = comment.sender_userEmail
')->fetchAll();

    foreach ($datingProfils as $datingProfil){
      //fjerner profilen med givende id.
      if ($datingProfil['email'] !== 'iceman@gmail.com'){
      ?>
      <section class="datingProfiles">
        <h1><?php echo $datingProfil['name']; ?></h1>
        <h2>Age: <?php echo $datingProfil['age']; ?></h2>
        <p><?php echo $datingProfil['description']; ?></p>
        <img src="image/<?php echo $datingProfil['image'];?>" alt="image/<?php echo $datingProfil['image'];?>">
        <h6>Likes: <?php echo $datingProfil['likes']; ?></h6>

        <form class="" action="process/updateLikes.php" method="post">
          <input type="hidden" name="profileId" value="<?php echo $datingProfil['email']; ?>">
          <button type="submit" name="button" value="insert">Like</button>
        </form>

        <?php
        foreach ($comments as $comment) {
          if ($comment['userEmail'] === $datingProfil['email']){
          ?>
          <section class="comment">
            <p><?php echo $comment['name']; ?></p>
            <p><?php echo $comment['messageText']; ?></p>
            <p><?php echo $comment['date']; ?></p>
          </section>
          <?php
          }
        }
         ?>
        <section class="commentFelt">
        <form class="" action="process/commentprocess.php" method="post">
          <textarea type="text" cols="40" name="messageText" placeholder="Comment"></textarea>
          <input type="hidden" name="profileId" value="<?php echo $datingProfil['email'];?>">
          <button type="submit" name="button" value="insert">Comment</button>
        </form>
      </section>

        <form class="" action="process/sendmessage.php" method="post">
          <input type="hidden" name="id" value="<?php echo $datingProfil['email']; ?>">
          <button type="submit" name="button" value="insert">Send a message</button>
        </form>
      </section>

      <?php
      }
    }
    ?>
