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
            $userDetail = scandir("db/payment/");
            $countAllUserDetail = count($userDetail);
        
            for ($counter = 2; $counter  < $countAllUserDetail; $counter++) { 
                $currentUser = $userDetail[$counter];
                
                $MedicalContent = file_get_contents("db/payment/". $currentUser);
                $MedicalObject = json_decode($MedicalContent);
                $full_name = @$MedicalObject -> full_name;
                $email = $MedicalObject -> email;
                $amount = @$MedicalObject -> amount;
                $bill = $MedicalObject -> bill;
                $time = @$MedicalObject -> time;
                $date = @$MedicalObject -> date;
                
                
                if ($_SESSION['email'] == $email) {
                   
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
                    </div>
                    <div class="time">
                    <h3>Time of Payment: </h3>'.$time.'
                    </div>
                    <div class="time">
                    <h3>date of payment: </h3>'.$date.'
                    </div><br><br>';
                }else{
                    if (empty($currentUser)) {
                        echo "You do not have any transaction yet.";
                    }
                    
                }
            }
        
        ?>
    </div>
</main>
<?php include"inc-0/footer.php";?>