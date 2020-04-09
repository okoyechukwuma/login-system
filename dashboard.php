<?php
    include"inc-0/header.php";
?>
            <li class="dark"><a href="index.php">home</a></li>
            <li><a href="about.php">about</a></li>
            <?php include"inc-0/main.php";?>

    <main>
      <div class="main-wrapper">

<h1>DashBoard</h1>
    Welcome, <?php echo "<strong>".$_SESSION['fullname']."</strong>"; ?> your department is  <?php echo "<strong>".$_SESSION['role']."</strong>"; ?> and your Id is   <?php echo "<strong>".$_SESSION['logedin']."</strong>"; ?>