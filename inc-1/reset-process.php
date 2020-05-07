<?php
  session_start();
    //collecting the data
    
  $errorCount = 0;
  if (!$_SESSION['logedin']) {
    $token = $_POST['token'] != "" ? $_POST['token'] :  $errorCount++;
    $_SESSION['token'] = $token;
  }
  $mail = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
  $pass = $_POST['pwd'] != "" ? $_POST['pwd'] :  $errorCount++;

    
  $_SESSION['email'] = $mail;

  if ($errorCount > 0) {
    $session_error = "you have ".$errorCount." error";
  if ($errorCount > 1) {
      $errorCount .= "s";
  }
  $session_error .= "in your form submission";
  $_SESSION['error'] = $session_error;
  header("Location: ../reset-password.php");
  }else {
    $allUsersToken = scandir("../db/tokens/");
    $countAllUsersToken = count($allUsersToken);

      for ($counter = 0; $counter  < $countAllUsersToken; $counter++) { 
        $currentToken = $allUsersToken[$counter];
        if ($currentToken == $mail . ".json") {
          $tokenContent = file_get_contents("../db/tokens/". $currentToken);
          $tokenObject = json_decode($tokenContent);
          $token_db = $tokenObject -> token;

          if ($_SESSION['logedin']) {
              $checkToken = true;
          }else {
            $checkToken = $token_db == $token;
          }

          if ($checkToken) {
              
              $allUsers = scandir("../db/users/");
              $countAllUsers = count($allUsers);

              for ($counter = 0; $counter  < $countAllUsers; $counter++) {
                      $currentUser = $allUsers[$counter];
              
              if ($currentUser == $mail . ".json") {
                $tokenContent = file_get_contents("../db/tokens/". $currentUser);
                $tokenObject = json_decode($tokenContent);
                $checkToken = $tokenObject -> token;

                if ($checkToken) {
                  for ($counter = 0; $counter  < $countAllUsers; $counter++) {
                    $currentUser = $allUsers[$counter];
                    
                    if ($currentUser == $mail . ".json") {
                      $userString = file_get_contents("../db/users/". $currentUser);
                      $userObject = json_decode($userString);
                      $userObject -> pwd = password_hash($pass, PASSWORD_DEFAULT);
                      unlink("../db/users/". $currentUser);
                      file_put_contents("../db/users/" . $mail. ".json", json_encode($userObject));
                        
                      $_SESSION['message'] = "password reset successful";

                      $subject = "Password Reset successful";
                      $message = "your password has been updated successfully, if you did not initiat this message please ignore, otherwise, visit: localhost/www/login-system.com and reset your password";
                      $headers = "From: no-reply@fuck.com" . "\r\n" .
                      "cc: somebody@gmail.com";

                      $try = mail($mail,$subject,$message,$headers);
                      header("Location: ../login.php");
                      die();
                    }
                  }  
                }
              }
            }
          }
        }
      }
    $_SESSION['error'] = "password reset failed, token or email expired or invalid";
    header("Location: ../login.php");
  }