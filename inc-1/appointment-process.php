<?php
//checking if the user got here by using the submit button
 if (!isset($_POST['appointment-submit'])) {
    header("Location: ../patient.php");
    //fetching data from the inputs
 }else{
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $mail = $_POST['email'];
    $doa = $_POST['appoint_date'];
    $time = $_POST['appoint_time'];
    $department = htmlspecialchars($_POST['department']);
    $noa = htmlspecialchars($_POST['appointment_nature']);
    $complaint = htmlspecialchars($_POST['complaint']);
      //checking if first name is empty or not 
    if (empty($first_name)){
    header("Location: ../appointment.php?error=emptyfirst&last_name=".$last_name."&mail=".$mail."&appoint_date=".$doa."&appoint_time=".$time."&department=".$department."&appointment_nature=".$noa);
       //checking if the user typed the right match
    }else if (!preg_match("/^[a-zA-Z]*$/", $first_name)) {
    header("Location: ../appointment.php?error=invalidfirst&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_date=".$doa."&appoint_time=".$time."&department=".$department."&appointment_nature=".$noa);
    
    }//checking if the first name is less or equal to 2
    elseif (strlen($first_name) <= 2) {
       header("Location: ../appointment.php?error=firstless&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_date=".$doa."&appointt_ime=".$time."&department=".$department."&appointment-nature=".$noa);
    }//checking if last name is empty or not
    elseif (empty($last_name)) {
        header("Location: ../appointment.php?error=emptylast&first_name=".$first_name."&mail=".$mail."&appoint_date=".$doa."&appoint_time=".$time."&department=".$department."&appointment-nature=".$noa);
        
    }elseif (strlen($last_name) <= 2) {
        header("Location: ../appointment.php?error=lastless&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_date=".$doa."&appoint_time=".$time."&department=".$department."&appointment-nature=".$noa);
    }//checking if the user typed the right match
    else if (!preg_match("/^[a-zA-Z]*$/", $last_name)) {
    header("Location: ../appointment.php?error=invalidlast&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_date=".$doa."&appoint_time=".$time."&department=".$department."&appointment-nature=".$noa);
    //checking if mail is empty or not
    }elseif (empty($mail)) {
        header("Location: ../appointment.php?error=emptymail&first_name=".$first_name."&appoint_date=".$doa."&appoint_time=".$time."&department=".$department."&appointment-nature=".$noa);
        //checking if mail is rightly typed
    }elseif (strlen($mail) <= 5) {
        header("Location: ../appointment.php?error=mailless&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_date=".$doa."&appoint_time=".$time."&department=".$department."&appointment-nature=".$noa);
    }//checking if mail is rightly typed
    else if (!FILTER_VAR($mail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../appointment.php?error=invalidmail&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_date=".$doa."&appoint_time=".$time."&department=".$department."&appointment-nature=".$noa); 
        //checking if the date of appointment is empty or not   
    }elseif (empty($doa)) {
        header("Location: ../appointment.php?error=emptydoa&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_time=".$time."&department=".$department."&appointment-nature=".$noa);
        //checking if the time of appointment is empty or not 
    }elseif (empty($time)) {
        header("Location: ../appointment.php?error=emptytime&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_date=".$doa."&department=".$department."&appointment_nature=".$noa);
        //checking if the department is empty or not 
    }elseif (empty($department)) {
        header("Location: ../appointment.php?error=emptydep&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_time=".$time."&appointment_nature=".$noa);
        //checking if the user typed the right match 
    }else if (!preg_match("/^[\D{a-zA-Z}]*$/", $department)) {
        header("Location: ../appointment.php?error=invaliddep&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_date=".$doa."&appoint_time=".$time."&appointment-nature=".$noa);
        
    }elseif (strlen($department) <= 5) {
        header("Location: ../appointment.php?error=depless&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_date=".$doa."&appoint_time=".$time."&department=".$department."&appointment_nature=".$noa);
    }//checking if the nature of appointment is empty or not
    elseif (empty($noa)) {
        header("Location: ../appointment.php?error=emptynoa&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_time=".$time."&department=".$department);
    //checking if the user typed the right match
    }else if (!preg_match("/^[\D{a-zA-Z}]*$/", $noa)) {
        header("Location: ../appointment.php?error=invalidnoa&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint-date=".$doa."&appoint_time=".$time."&department=".$department);      
    }elseif (strlen($noa) <= 10) {
        header("Location: ../appointment.php?error=noaless&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_date=".$doa."&appoint-time=".$time."&department=".$department."&appointment-nature=".$noa);
    }//checking if the complain input is empty or not
    elseif (empty($complaint)) {
        header("Location: ../appointment.php?error=empty&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_time=".$time."&department=".$department."&appointment-nature=".$noa);
         //checking if the user typed the right match
    }else if (!preg_match("/^[\D{a-zA-Z0-9}]*$/", $complaint)) {
        header("Location: ../appointment.php?first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_date=".$doa."&appoint_time=".$time."&department=".$department."&appointment_nature=".$noa);
    }elseif (strlen($complaint) <= 10) {
        header("Location: ../appointment.php?error=complaintless&first_name=".$first_name."&last_name=".$last_name."&mail=".$mail."&appoint_date=".$doa."&appoint_time=".$time."&department=".$department."&appointment_nature=".$noa);
    }else {
        
        (getdate());

        date_default_timezone_set('Africa/Lagos');
        $date = date("Y.m.d") ;
        $time = date("h:i:sa");
        $_SESSION['TimePay'] = $time ;
        $_SESSION['DatePay'] = $date;

        $datePay = $_SESSION['Date'];
        $timePay = $_SESSION['Time'];
        //getting the right folder
    $allUsers = scandir("../db/appointments/");

    $countAllUsers = count($allUsers);
        //making the id auto increasing
    $newUserId = ($countAllUsers-1);
        //inputing data to the right variable
    $userObject = [
        'id' => $newUserId,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $mail,
        'appoint_date' => $doa,
        'appoint_time' => $time,
        'department' => $department,
        'appointment_nature' => $noa,
        'complaint' => $complaint,
        'date' => $datePay,
        'time' => $timePay
        ];
       //inputing datas to db 
    file_put_contents("../db/appointments/" . $mail. ".json", json_encode($userObject));
    // $_SESSION['message'] = "book appointment successfully, ".$first_name." would you like to book another appointment";
    // $_SESSION['fullname'] = $userObject -> first_name . " " . $userObject -> last_name;
    header("Location: ../appointment.php?appoint=success&fullname=".$first_name.' '.$last_name);
    }
 }
     