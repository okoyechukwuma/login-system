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

        <h1>Medical Team DashBoard</h1>
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
        <div class="admin-button">
          <button class="admin-btn" type="button"><a href="allappointment.php">View All Appointments</a></button>
          <button class="admin-btn" type="button"><a href="allTransactions.php">View All Paid Patient</a></button>
        </div>
    </div>
</main>
<?php include"inc-0/footer.php";?>