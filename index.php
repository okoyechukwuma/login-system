<?php require "inc-0/header.php"; ?>

<li class="dark"><a href="index.php">home</a></li>
              <li><a href="about.php">about</a></li>
<?php include"inc-0/main.php";?>
    <main>
      <div class="main-wrapper">
        <?php
          if (isset($_SESSION["logedin"])) {
            echo "<p>you are logged in!</p>";
          }else{
            echo "<p>you are logged out! login using your user name or e-mail.</p>";
          }
         ?>
      </div>
    </main>

  <?php require "inc-0/footer.php"; ?>
