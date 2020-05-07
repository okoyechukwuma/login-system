<?php
    include"inc-0/header.php";
    if (!isset($_SESSION['admin@gmail.com']) && !isset($_SESSION['logedin'])) {
        header("Location: index.php");
    }
?>
            <li class="dark"><a href="index.php">home</a></li>
            <li><a href="about.php">about</a></li>
            <?php include"inc-0/main.php";?>

    <main>
      <div class="main-wrapper">       
        <?php
            $userDetail = scandir("db/payment/");
            $countAllUserDetail = count($userDetail);

            if ($countAllUserDetail <= 2) {
                echo "No payment yet.";
            }else {
                echo "<h3>All Patients Transactions</h3>";
        
            for ($counter = 2; $counter  < $countAllUserDetail; $counter++) { 
                $currentUser = $userDetail[$counter];
                
                $MedicalContent = file_get_contents("db/payment/". $currentUser);
                $MedicalObject = json_decode($MedicalContent);
                $full_name = @$MedicalObject -> full_name;
                $email = $MedicalObject -> email;
                $amount = @$MedicalObject -> amount;
                $bill = $MedicalObject -> bill;
                
                    
                    echo '<div class="time">
                    <h3>Full Name: </h3>'.$full_name.'
                    </div>
                    <div class="time">
                        <h3>Email: </h3>'.$email.'
                    </div>
                    <div class="time">
                        <h3>Amount Paid: </h3>'.$amount.'
                    </div>
                    <div class="time">
                    <h3>Bill Paid For: </h3>'.$bill.'
                    </div><br><br>';
                
                }
            }
        
        ?>
    </div>
</main>
<?php include"inc-0/footer.php";?>