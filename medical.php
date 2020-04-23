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
    </div>
</main>
<main>
    <div class="main-wrapper">
        <h1>Appointments</h1>
        <?php
            $allPatients = scandir("db/appointments/");
            $countAllPatients = count($allPatients);
            
            if ($countAllPatients <= 2) {
                echo "You do not have any appointment yet.";
            }else {
                
            
                for ($counter = 2; $counter  < $countAllPatients; $counter++) { 
                    $currentUser = $allPatients[$counter];
                    
                    $patientsContent = file_get_contents("db/appointments/". $currentUser);
                    $patientsObject = json_decode($patientsContent);
                    $firstname = $patientsObject -> first_name;
                    $lastname = $patientsObject -> last_name;
                    $email = $patientsObject -> email;
                    $date = $patientsObject -> appoint_date;
                    $time = $patientsObject -> appoint_time;
                    $nature = $patientsObject -> appointment_nature;
                    $complaint = $patientsObject -> complaint;

                    echo  '<div class="patient-data">
                    <div class="data">
                        <h4>Full Name: </h4><p>'.$firstname." ".$lastname.'.<p>
                    </div>
                    <div class="data">
                        <h4>Email: </h4><p>'.$email.'.<p>
                    </div>
                    <div class="data">
                        <h4>Date For Appointment: </h4><p>'.$date.'.<p>
                    </div>
                    <div class="data">
                        <h4>Time For Appointment: </h4><p>'.$time.'.<p>
                    </div>
                    <div class="data">
                        <h4>Nature Of Appointment: </h4><p>'.$nature.'.<p>
                    </div>
                    <div class="data-complain">
                        <h4>Complaint: </h4><p>'.$complaint.'.<p>
                     </div>
                    </div>';
                }
            }
        ?>
       
    </div>
</main>
<?php include"inc-0/footer.php";?>