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

        <h3>
         <?php echo "<strong>".$_SESSION['firstname'].' '.$_SESSION['lastname']."</strong>"; ?> your payment was successful.
        <?php (getdate());
        echo "<br><br>";

        $paydate = getdate(date("U"));
        ?></h3>
        <div class="time">
        <h3>Time of payment: </h3> <?php echo  $_SESSION['TimePay']?>.
        </div>
        <div class="date">
        <h3>Date of payment: </h3><?php echo  $_SESSION['DatePay']?>.
        </div>
        <?php
                 
            if (isset($_SESSION['email'])) {
                echo '<div class="time">
                <h3>Full Name: </h3>'.$_SESSION['fullname'].'
                </div>
                <div class="time">
                    <h3>Email: </h3>'.$_SESSION['email'].'
                </div>
                <div class="time">
                    <h3>Amount Paid: </h3>'.$_SESSION['amount'].'
                </div>
                <div class="time">
                <h3>Bill Paid For: </h3>'.$_SESSION['bill'].'
                </div>';
            }         
                   
        ?>
    </div>
</main>
<?php include"inc-0/footer.php";?>