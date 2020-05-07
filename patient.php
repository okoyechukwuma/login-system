<?php
    include"inc-0/header.php";

    if (!isset($_SESSION['logedin'])) {
        header("Location: index.php");
    }
?>
            <li class="dark"><a href="index.php">home</a></li>
            <li><a href="about.php">about</a></li>
            <?php include"inc-0/main.php";?>

    <main>
      <div class="main-wrapper">
      <?php  
                if (isset($_SESSION["message"])) {
                    echo '<span style="color:green;">'.$_SESSION["message"].'</span>';
                    session_unset();
                 }
            ?>
        <h1>Patient's DashBoard</h1>
            Welcome, <?php echo "<strong>".$_SESSION['firstname'].' '.$_SESSION['lastname']."</strong>"; ?> your department is  <?php echo "<strong>".$_SESSION['department']."</strong>"; ?> and your Id is   <?php echo "<strong>".$_SESSION['logedin']."</strong>"; ?>
            <?php (getdate());
        echo "<br><br>";

        $mydate = getdate(date("U"));
        ?>

        <div class="time">
            <h3>Logedd in Time: </h3> <?php echo  $_SESSION['Time']?>.
        </div>
        <div class="date">
            <h3>Logged in date: </h3><?php echo  $_SESSION['Date']?>.
        </div>
        <div>
            Click the Home button to access other pages.
        </div>
      </div>
    </main>

