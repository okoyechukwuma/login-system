<?php

session_start();
if (!isset($_POST['pay-bill-submit'])) {
    header("Location: ../index.php");
}else{
    $full = htmlspecialchars($_POST['fullname']);
    $mail = htmlspecialchars($_POST['email']);
    $amt = htmlspecialchars($_POST['amt']);
    $bill = htmlspecialchars($_POST['bill-for']);

    $_SESSION['amount'] = $amt;
    $_SESSION['fullname'] = $full;
    // $_SESSION['email'] = $mail;
    $_SESSION['bill'] = $bill;

      if (empty($full)) {
       header("Location: ../pay-bills.php?error=nameempty&mail=".$mail."&amount=".$amt."&bill=".$bill);
      }else if (strlen($full) <= 2) {
        header("Location: ../pay-bills.php?error=nameless&name=".$full."&mail=".$mail."&amount=".$amt."&bill=".$bill);
      }else if (!preg_match("/^[\D{a-zA-Z}]*$/", $full)) {
        header("Location: ../pay-bills.php?error=nameerro&mail=".$mail."&amount=".$amt."&bill=".$bill);
      }elseif (empty($mail)) {
        header("Location: ../pay-bills.php?error=mailempty&name=".$full."&amount=".$amt."&bill=".$bill);
      }else if (strlen($mail) <= 5) {
        header("Location: ../pay-bills.php?error=mailless&name=".$full."&mail=".$mail."&amount=".$amt."&bill=".$bill);
      }else if (!FILTER_VAR($mail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../pay-bills.php?error=invalidmail&name=".$full."&mail=".$mail."&amount=".$amt."&bill=".$bill);
      }else if ($_SESSION['email'] !== $mail) {
        header("Location: ../pay-bills.php?error=mailntsame&name=".$full."&mail=".$mail."&amount=".$amt."&bill=".$bill);
      }
      else if (empty($amt)) {
        header("Location: ../pay-bills.php?error=amtempty&name=".$full."&mail=".$mail."&bill=".$bill);
      }else if (strlen($amt) <= 1) {
        header("Location: ../pay-bills.php?error=amtless&name=".$full."&mail=".$mail."&amount=".$amt."&bill=".$bill);
      }else if (!preg_match("/^[0-9]*$/", $amt)) {
        header("Location: ../pay-bills.php?error=invalidamt&name=".$full."&mail=".$mail."&amount=".$amt."&bill=".$bill);
      }else if (empty($bill)) {
        header("Location: ../pay-bills.php?error=billempty&name=".$full."&mail=".$mail."&amount=".$amt);
      }else if (strlen($bill) <= 3) {
        header("Location: ../pay-bills.php?error=billless&name=".$full."&mail=".$mail."&amount=".$amt."&bill=".$bill);
      }else if (!preg_match("/^[\D{a-zA-Z}]*$/", $bill)) {
        header("Location: ../pay-bills.php?error=invalidbill&name=".$full."&mail=".$mail."&amount=".$amt."&bill=".$bill);
      }else {
        
      
    $curl = curl_init();
    
    $customer_email =     $mail = $_POST['email'];
    ;
    $amount = $amt;  
    $currency = "NGN";
    $txref = "";
    $alpha = ['a','b','c','d','e','f','g','h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z','A','B','C','D','E','F','G','H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
                 for ($i=0; $i < 32; $i++) { 
                     $index = mt_rand(0,count($alpha)-1);
                     $txref .= $alpha[$index];
                 } // ensure you generate unique references per transaction.
    $PBFPubKey = "FLWPUBK_TEST-4524b6b1d64228388e07641bf4633c59-X"; // get your public key from the dashboard.
    $redirect_url = "https://localhost/www/Authentication-System/success.php";
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode([
        'amount' => $amount,
        'customer_email' => $customer_email,
        'currency' => $currency,
        'txref' => $txref,
        'PBFPubKey' => $PBFPubKey,
        'redirect_url' => $redirect_url,
      ]),
      CURLOPT_HTTPHEADER => [
        "content-type: application/json",
        "cache-control: no-cache"
      ],
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    if($err){
      // there was an error contacting the rave API
      die('Curl returned error: ' . $err);
    }
    
    $transaction = json_decode($response);
    
    if(!$transaction -> data && !$transaction -> data -> link){
      // there was an error from the API
      print_r('API returned error: ' . $transaction -> message);
    }
    
  
    
    // redirect to page so User can pay
    // uncomment this line to allow the user redirect to the payment page
    header('Location: ' . $transaction -> data -> link);
  }  
}

?>