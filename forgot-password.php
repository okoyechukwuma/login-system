<?php
  include"inc-0/header.php";
?>
      <li><a href="index.php">home</a></li>
      <li><a href="about.php">about</a></li>
      <?php include"inc-0/main.php";?>
    <main>
      <div class="main-wrapper">
        <h1>Reset your password</h1>
        <h4>An e-mail will be send to you with instruction on how to reset your password</h4>
        <div class="main-wrapper-content">
        <?php 
          if (isset($_SESSION["error"]) && !empty($_SESSION["error"])) {
              echo '<span style="color:red;">'.$_SESSION["error"].'</span>';
              session_unset();
          }    
        ?>
          <form class="form-group-content" action="inc-1/forgot-process.php" method="post">
            <input class="form-control" type="text" name="email" placeholder="Enter your E-mail...">
            <button class="btn" type="submit" name="reset-submit">Receive new password by mail.</button>
          </form>
        </div>

        </div>
      </div>
    </main>

  <?php include "inc-0/footer.php"; ?>
