<?php
    session_start();
    if (!isset($_SESSION['logedin'])) {
        header("Location: index.php");
    }else{

       

    if (isset($_GET['txref'])) {
        $ref = $_GET['txref'];
         if (isset($_SESSION['amount'])) {
            $amount = $_SESSION['amount']; 
         }
        $currency = "NGN";

        $query = array(
            "SECKEY" => "FLWSECK_TEST-41ba473a8f350cb0de5145523a779572-X",
            "txref" => $ref
        );

        $data_string = json_encode($query);
        $payments = scandir("db/payments");
        $id = count($payments) - 1;

        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];
       
        $txRef = $resp['data']['txref'];

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {

            $full_name = $_SESSION['fullname'];
            $mail = $_SESSION['email'];
            $bill = $_SESSION['bill'];

            (getdate());

            date_default_timezone_set('Africa/Lagos');
            $datePay = date("Y.m.d") ;
            $timePay = date("h:i:sa");
            $_SESSION['TimePay'] = $timePay ;
            $_SESSION['DatePay'] = $datePay;

           
        
        // $allUsers = scandir("../db/payment/");

        // $countAllUsers = count($allUsers);
        //     //making the id auto increasing
        // $newUserId = ($countAllUsers-1);
            //inputing data to the right variable
        $userObject = [
            'id' => $id,
            'full_name' => $full_name,
            'email' => $mail,
            'amount' => $amount,
            'bill' => $bill,
            'txref' => $txRef,
            'date' => $_SESSION['DatePay'],
            'time' => $_SESSION['TimePay']
            ];
  
                
                file_put_contents("db/payment/" .$mail. ".json", json_encode($userObject));
            

        //inputing datas to db 
        // file_put_contents("db/payment/" .$mail.$newUserId++. ".json", json_encode($userObject));


            $subject = "payment successful";
            $message = "your payment was successfully, if you did not initiat this message please ignore, otherwise, visit: localhost/www/login-system.com";
            $headers = "From: no-reply@fuck.com" . "\r\n" .
            "cc: somebody@gmail.com";

            $try = mail($mail,$subject,$message,$headers);
            header("Location: paid.php");
           // die();
        } else {
            header("Location: pay-bills.php?error=failed");
        }
    }
}

?>