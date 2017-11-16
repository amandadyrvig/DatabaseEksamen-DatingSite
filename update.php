<?php

include 'include/head.php';
include 'include/database.php';
include 'include/footer.php';

$updateForms = $conn->query('SELECT * FROM user WHERE email = "iceman@gmail.com"')->fetchAll();

?>
<main>
    <form class="" action="process/updateprocess.php" method="post">
      <?php foreach ($updateForms as $updateForm) {
        ?>
        <section class="updateProfile">
          <h1>Update Your Profile</h1>
            <!-- Name -->
            <label for="name">Name</label>
            <input type="text" name="name" value="<?php echo $updateForm['name'];?>">

            <!-- Image -->
            <label for="image">Image</label>
            <input type="file" name="image" accept=".jpg, .jpeg, .png" value="<?php echo $updateForm['image'];?>">

            <!-- Decription -->
            <label for="description">Description</label>
            <textarea type="text" name="description" rows="6" cols="80" value=""><?php echo $updateForm['description'];?></textarea>

            <button type="submit" name="button" value="insert">Save</button>
        </section>
        <?php
      } ?>

    </form>
  </main>
