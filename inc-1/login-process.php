<?php
    session_start();

    if (!isset($_POST['login-submit'])) {
        header("Location: ../index.php");
    }else{

        $mail = htmlspecialchars($_POST['email']);
        $pass = htmlspecialchars($_POST['pwd']);

        if (empty($mail) || empty($pass)) {
        $_SESSION['error'] = "Field is empty";
        $_SESSION['email'] = $mail;
        header("Location: ../login.php");
        die();
        }
        if (!FILTER_VAR($mail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "invailid mail format";
            $_SESSION['email'] = $mail;
            header("Location: ../login.php");
            die(); 
        }else{
           
            $allUsers = scandir("../db/users/");
            $countAllUsers = count($allUsers);

            for ($counter = 0; $counter  < $countAllUsers; $counter++) {
            $currentUser = $allUsers[$counter];
            
            if ($currentUser == $mail . ".json") {
                $userString = file_get_contents("../db/users/". $currentUser);
                $userObject = json_decode($userString);
                $password_db = $userObject -> pwd;

                $password_user = PASSWORD_VERIFY($pass, $password_db);
                    if ($password_db ==  $password_user) {
                        $_SESSION['logedin'] = $userObject -> id;
                        $_SESSION['email'] = $userObject -> email;
                        $_SESSION['firstname'] = $userObject -> first_name;
                        $_SESSION['lastname'] = $userObject -> last_name;
                        $_SESSION['fullname'] = $userObject -> first_name.' '.last_name;
                        $_SESSION['gender'] = $userObject -> gender;
                        $_SESSION['designation'] = $userObject -> designation;
                        $_SESSION['department'] = $userObject -> department;
            
                        
                         (getdate());

                        date_default_timezone_set('Africa/Lagos');
                        $dateString = date("Y.m.d") ;
                        $timeString = date("h:i:sa");
                        $_SESSION['Time'] = $timeString ;
                        $_SESSION['Date'] = $dateString;
                        
                        $dateTime = $_SESSION['Date'] ." ". $_SESSION['Time'];

                        file_put_contents("../db/timer/".  $_SESSION['Email'] . ".json", json_encode($dateTime));

                        //redirecting to different page
                        
                        if ( $_SESSION['designation'] == 'Patients') {
                            header("location: ../patient.php");
                            die();
                        }else{
                            header("location: ../medical.php");
                            die();
                        }
                        header("Location: ../signup.php");
                        die();   
                    }

                    // PASSWORD_VERIFY($pwd, $hashedpwdindb)
                }
            }
            $_SESSION['error'] = "invalid email or password";
            header("Location: ../login.php");
            die();
        }
    } 
?>
