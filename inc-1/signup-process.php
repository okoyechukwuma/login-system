<?php

session_start();
//collecting the data

     $first_name = htmlspecialchars($_POST['first_name']);
     $last_name = htmlspecialchars($_POST['last_name']);
     $mail = $_POST['email'];
     $gender = $_POST['gender'];
     $department = $_POST['department'];
     $designation = htmlspecialchars($_POST['designation']);
     $pass = htmlspecialchars($_POST['pwd']);
     $repeat_pass = htmlspecialchars($_POST['pwd-repeat']);

     
     if (empty($first_name) || empty($last_name)  || empty($mail) || empty($gender) || empty($designation) || empty($department) || empty($pass)  || empty($repeat_pass)) {
            $_SESSION['error'] = "Field is empty";
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['mail'] = $mail;
            $_SESSION['pass'] = $pass;
            $_SESSION['gender'] = $gender;
            $_SESSION['designation'] = $designation;
            $_SESSION['department'] = $department;
            header("Location: ../signup.php");
            exit();
        }else if (!preg_match("/^[a-zA-Z]*$/", $first_name)) {
            $_SESSION['error'] = "only letters needed on first name";
            header("Location: ../signup.php");
            exit();

         }else if (!preg_match("/^[a-zA-Z]*$/", $last_name)) {
            $_SESSION['error'] = "only letters needed";
            header("Location: ../signup.php");
            exit();
        }else if (!FILTER_VAR($mail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "invalid mail format";
            header("Location: ../signup.php");
            exit();
        }else if ($gender == "Gender") {
            $_SESSION['error'] = "please select gender";
            header("Location: ../signup.php");
            exit();
        }else if ($designation == "select Designation") {
            $_SESSION['error'] = "please select Designation";
            header("Location: ../signup.php");
            exit();
        }else if (!preg_match("/^[a-zA-Z]*$/", $department)) {
            $_SESSION['error'] = "only letters needed in department";
            header("Location: ../signup.php");
            exit();
        }else if ($pass !== $repeat_pass) {
            $_SESSION['error'] = "password not match";
            header("Location: ../signup.php");
            exit();

     //verifying data
 
        }else {

         $allUsers = scandir("../db/users/");

         $countAllUsers = count($allUsers);

         $newUserId = ($countAllUsers-1);

         $userObject = [
             'id' => $newUserId,
             'first_name' => $first_name,
             'last_name' => $last_name,
             'email' => $mail,
             'gender' => $gender,
              'designation' => $designation,
             'department' => $department,
             'pwd' => password_hash($pass, PASSWORD_DEFAULT)
         ];

         //checking if user already existed
         for ($counter = 0; $counter  < $countAllUsers; $counter++) { 
             $currentUser = $allUsers[$counter];
             if ($currentUser == $mail . ".json") {
                 $_SESSION['error'] = "User already Existed";
                 header("Location: ../signup.php");
                 die();
             }
         }
         file_put_contents("../db/users/" . $mail. ".json", json_encode($userObject));
         $_SESSION['message'] = "Signup successful, You can now loggin ".$first_name;
         header("Location: ../login.php");
     }
  