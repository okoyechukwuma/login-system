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
        if (isset($_GET["appoint"]) == "success") {
          echo '<span style="color:green;">book appointment successfully, "'.$_GET["fullname"].'" would you like to book another appointment</span>';
         }    
    ?>
        <h3> <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?> Please fill this form.</h3>
        <div class="main-wrapper-content">
        <form class="form-group-content" action="inc-1/appointment-process.php" method="post">
        <?php
            if(isset($_GET['first_name'])){
                $first_name = $_GET['first_name'];
                echo ' <label>First Name</label>
                <input class="form-control" type="text" name="first_name" value="'.@$first_name.'" placeholder="Enter first_name">';
                }else{
                    echo ' <label>First Name</label>
                    <input class="form-control" type="text" name="first_name" value="" placeholder="Enter first_name">';
                }
                
                if(isset($_GET['error'])){
                    if ($_GET["error"] == "invalidfirst") {
                        echo '<span style="color:red;">Only letters needed no space</span>';
                    }elseif ($_GET["error"] == "emptyfirst") {
                        echo ' <span style="color:red;">first name is empty</span>';
                    }elseif ($_GET["error"] == "firstless") {
                        echo ' <span style="color:red;">first name can not be less than or two(2) letters</span>';
                    }
                } 
            
            
            if (isset($_GET['last_name'])) {
                $last_name = $_GET['last_name'];
                echo'<label>last Name</label>
                <input class="form-control" type="text" name="last_name" value="'.@$last_name.'" placeholder="Enter lastname">';
            }else{
                echo'<label>last Name</label>
                <input class="form-control" type="text" name="last_name" value="" placeholder="Enter lastname">';
            }
            
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "invalidlast") {
                    echo '<span style="color:red;">Only letters needed no space</span>';
                }elseif ($_GET["error"] == "emptylast") {
                    echo ' <span style="color:red;">last name is empty.</span>';
                }elseif ($_GET["error"] == "lastless") {
                    echo ' <span style="color:red;">last name can not be less than or two(2) letters</span>';
                }
            }


            if (isset($_GET['mail'])) {
                $mail = $_GET['mail'];
                echo'<label>Email</label>
                <input class="form-control" type="text" name="email" value="'.@$mail.'" placeholder="Enter mail address">';
            }else{
                echo'<label>Email</label>
                <input class="form-control" type="text" name="email" value" placeholder="Enter mail address">';
            }

            if (isset($_GET["error"])) {
                if ($_GET["error"] == "invalidmail") {
                    echo '<span style="color:red;">mail format invalid.</span>';
                }elseif ($_GET["error"] == "emptymail") {
                    echo ' <span style="color:red;">mail is empty.</span>';
                }elseif ($_GET["error"] == "mailless") {
                    echo ' <span style="color:red;">mail name can not be less than or five(5) letters</span>';
                }
            }


            if (isset($_GET['appoint_date'])) {
                $doa = $_GET['appoint_date'];
                echo'<label>Date of appointment</label>
                <input class="form-control" type="date" value="'.$doa.'"
                name="appoint_date">';
            }else {
                echo'<label>Date of appointment</label>
                <input class="form-control" type="date" name="appoint_date">';
            }

            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptydoa") {
                    echo ' <span style="color:red;">select a date.</span>';
                }
            }


            if (isset($_GET['appoint_time'])) {
                $time = $_GET['appoint_time'];
                echo '<label>Time</label>
                <input class="form-control" type="time" value="'.$time.'" name="appoint_time">';
            }else {
                echo '<label>Time</label>
                <input class="form-control" type="time" name="appoint_time">';
            }

            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptytime") {
                    echo ' <span style="color:red;">set a time for the appointment.</span>';
                }
            }


            if (isset($_GET['department'])) {
                $department = $_GET['department'];
                echo '<label>Department</label>
                <input class="form-control" type="text" value="'.$department.'" name="Department" placeholder="Enter department">';
            }else {
                echo '<label>Department</label>
                <input class="form-control" type="text" name="department" placeholder="Enter department">';
            }

            if (isset($_GET["error"])) {
                if ($_GET["error"] == "invaliddep") {
                    echo '<span style="color:red;">only letters and whitespace needed.</span>';
                }elseif ($_GET["error"] == "emptydep") {
                    echo ' <span style="color:red;">department is empty.</span>';
                }elseif ($_GET["error"] == "depless") {
                    echo ' <span style="color:red;">department name can not be less than or five(5) letters</span>';
                }
            }


            if (isset($_GET['appointment_nature'])) {
                $noa = $_GET['appointment_nature'];
                echo'<label>Nature of appointment</label>
                <input class="form-control" type="text" name="appointment_nature" value="'.$noa.'" placeholder="Enter Nature of appointment">';
            }else {
                echo'<label>Nature of appointment</label>
                <input class="form-control" type="text" name="appointment_nature" value="" placeholder="Enter Nature of appointment">';
            }

            if (isset($_GET["error"])) {
                if ($_GET["error"] == "invalidnoa") {
                    echo '<span style="color:red;">only letters and whitespace needed.</span>';
                }elseif ($_GET["error"] == "emptynoa") {
                    echo ' <span style="color:red;">field is empty.</span>';
                }elseif ($_GET["error"] == "noaless") {
                    echo ' <span style="color:red;">department can not be less than or ten(10) letters</span>';
                }
            }
        ?>
            <label>Initial complaint</label>
            <textarea class="form-control" name="complaint" id="" cols="30" rows="7"></textarea>
            <?php
                if (isset($_GET['error'])) {
                   if ($_GET['error'] == 'complaintless') {
                    echo ' <span style="color:red;">this field can not be less than or ten(10) letters</span>';
                   }
                }
            ?>
            <button class="btn" type="submit" name="appointment-submit">Submit</button>
        </form>
        </div>
    </div>
</main>
<?php require "inc-0/footer.php"; ?>