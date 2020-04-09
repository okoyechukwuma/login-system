<?php
session_start();

$mail = htmlspecialchars($_POST['email']);
$pass = htmlspecialchars($_POST['pwd']);

 

if (empty($mail) || empty($pass)) {
    $_SESSION['error'] = "Field is empty";
    $_SESSION['email'] = $mail;
    header("Location: ../login.php");
 }
  if (!FILTER_VAR($mail, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "invailid mail format";
        $_SESSION['email'] = $mail;
        header("Location: ../login.php"); 
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
                $_SESSION['fullname'] = $userObject -> first_name . " " . $userObject -> last_name;
                $_SESSION['role'] = $userObject -> department;

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
  // if (isset($_POST["login-submit"])) {
  //   require "dbh.php";
  //   $mailuid = $_POST["mailuid"];
  //   $password = $_POST["pwd"];

  //   if (empty($mailuid) || empty($password)) {
  //     header("Location: ../index.php?error=emptyfields");
  //     exit();
  //   }else{
  //     $sql = "SELECT * FROM users WHERE uidusers=? OR emailusers=?;";
  //     $stmt = mysqli_stmt_init($conn);
  //     if (!mysqli_stmt_prepare($stmt, $sql)) {
  //       header("Location: ../index.php?error=sqlerror");
  //       exit();
  //     }else{
  //       mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
  //       mysqli_stmt_execute($stmt);
  //       $result = mysqli_stmt_get_result($stmt);
  //       if ($row = mysqli_fetch_assoc($result)) {
  //         $pwdCheck = password_verify($password, $row["pwdusers"]);
  //         if ($pwdCheck == false) {
  //           header("Location: ../index.php?error=wrongpassword");
  //           exit();
  //         }else if($pwdCheck == true){
  //           session_start();
  //           $_SESSION["userid"] =$row["idusers"];
  //           $_SESSION["userUid"] =$row["uidusers"];
  //           header("Location: ../index.php?login=success");
  //           exit();
  //         }else {
  //           header("Location: ../index.php?error=wrongpwd");
  //           exit();
  //         }
  //       }else{
  //         header("Location: ../index.php?error=No User");
  //         exit();
  //       }
  //     }
  //   }
  // }else{
  //   header("Location: ../index.php");
  //   exit();
  // }
 ?>
