
    <?php
    include 'include/head.php';
    include 'include/database.php';
    include 'include/footer.php';

    //visning af indholdet.
    //SELECT ONLY peters ID Email, because it is his profile we are on.
    $userProfils = $conn->query('SELECT * FROM user WHERE email = "peterHansen@gmail.com"')->fetchAll();
    $superpowers = $conn->query('SELECT * FROM userHasSuperpower JOIN user ON user.email = userHasSuperpower.userId')->fetchAll();

    foreach ($userProfils as $userProfil){
      ?>
        <h1><?php echo $userProfil['name']; ?></h1>
        <h2><?php echo $userProfil['age']; ?></h2>
        <p><?php echo $userProfil['description']; ?></p>
        <img src="image/<?php echo $userProfil['image'];?>" alt="image/<?php echo $userProfil['image'];?>">
        <p><?php echo $userProfil['likes']; ?></p>
      <?php

      foreach ($superpowers as $superpower){
        if ($superpower['userId'] === $user['email']){
          ?>
            <h6><?php echo $superpower['superpowerId'];?></h6>
          <?php
        }
      }
    }
    ?>

    <a href="update.php"><button>Update Profile</button></a>
