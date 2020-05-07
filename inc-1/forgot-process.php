<?php
session_start();
//collecting the data

     $errorCount = 0;

     $mail = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
     
     $_SESSION['email'] = $mail;
    
     //verifying data
     if ($errorCount > 0) {
         $session_error = "you have ".$errorCount." error";
         if($errorCount > 1){
             $session_error .= 's';
         }
          $session_error .= " with your mail";
          $_SESSION['error'] = $session_error;
         header("Location: ../forgot-password.php");
     
     }else {
         
         $allUsers = scandir("../db/users/");

         $countAllUsers = count($allUsers);

         for ($counter = 0; $counter  < $countAllUsers; $counter++) { 
             $currentUser = $allUsers[$counter];
             if ($currentUser == $mail . ".json") {
                
                 $token = "";

                 $alpha = ['a','b','c','d','e','f','g','h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z','A','B','C','D','E','F','G','H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
                 for ($i=0; $i < 32; $i++) { 
                     $index = mt_rand(0,count($alpha)-1);
                     $token .= $alpha[$index];
                 }
                 

                $subject = "Password Reset Link";
                $message = "A password reset has been initiated from your account, if you did not initiat this message please ignore, otherwise, visit: localhost/www/Authentication-System/reset-password.php?token=".$token;
                $headers = "From: no-reply@fuck.com" . "\r\n" .
                "cc: somebody@gmail.com";
                
                file_put_contents("../db/tokens/" . $mail. ".json", json_encode(['token' => $token]));
                

                $try = mail($mail,$subject,$message,$headers);

                 // print_r($try);
                 // die();

                if ($try) {
                 $_SESSION['message'] = "Password has been sent to: " .$mail;
                 header("Location: ../login.php");
                }else {
                 $_SESSION['error'] = "something went wrong";
                 header("Location: ../forgot-password.php");
                }

                die();
             }
         }
         $_SESSION['error'] = "Email " .$mail." not found ";
         header("Location: ../forgot-password.php");
     }
 ?>
