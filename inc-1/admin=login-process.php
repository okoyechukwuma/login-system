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
            $admin = "admin@gmail.com";
            $admin_pass = 123456;
            
            $_SESSION['admin@gmail.com'] = $admin;
            $_SESSION['pass'] = $admin_pass;

            (getdate());

            date_default_timezone_set('Africa/Lagos');
            $dateString = date("Y.m.d") ;
            $timeString = date("h:i:sa");
            $_SESSION['Time'] = $timeString ;
            $_SESSION['Date'] = $dateString;
            
            $dateTime = $_SESSION['Date'] ." ". $_SESSION['Time'];

            if ($mail == $admin && $pass == $admin_pass) {
                $_SESSION['admin@gmail.com'] = $admin;
                header("Location: ../super-admin.php");
            }else {
                $_SESSION['error'] = 'invalid E-mail or wrong password';
                header("Location: ../super-admin-login.php");
            }
        }
    }
?>
