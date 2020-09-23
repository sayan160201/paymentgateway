<?php

    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $Amount=$_POST['Amount'];
    $Phone=$_POST['phone'];
    $purpose='Donation for HOIC';
    
    include 'src/Instamojo.php';
    $api = new Instamojo\Instamojo('test_888d2d1217608439e2bc15c49b7', 'test_9001291fea6bbd235916dc8b1e2', 'https://test.instamojo.com/api/1.1/');

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $purpose,
            "amount" => $Amount,
            "send_email" => true,
            "email" => $Email,
            "buyer_name" =>$Name,
            "phone"=>$Phone,
            "send_sms" => true,
            "allow_repeated_payments" =>false,
            //  "redirect_url" => "/thankyou.html"
            )
        );
        $pay_url=$response['longurl'];
        header("location: $pay_url");
    	}
    	catch (Exception $e) {
    	    print('Error: ' . $e->getMessage());
    	}
?>