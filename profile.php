
    <?php
    include 'include/head.php';
    include 'include/database.php';
    include 'include/footer.php';

    //visning af indholdet.
    //SELECT ONLY peters ID Email, because it is his profile we are on.
    $userProfils = $conn->query('SELECT * FROM user WHERE email = "iceman@gmail.com"')->fetchAll();

    foreach ($userProfils as $userProfil){
      ?>
      <section class="profile">
        <section class="profileInfo">
          <h1><?php echo $userProfil['name']; ?></h1>
          <h2>Age: <?php echo $userProfil['age']; ?></h2>
          <p><?php echo $userProfil['description']; ?></p>
        </section>
        <section class="profileImg">
          <img src="image/<?php echo $userProfil['image'];?>" alt="image/<?php echo $userProfil['image'];?>">
          <h6>Likes: <?php echo $userProfil['likes']; ?></h6>
        </section>
        <a href="update.php"><button>Update Profile</button></a>
      </section>
      <?php
}
?>
