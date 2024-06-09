<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.chapa.co/v1/transaction/initialize',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
    "amount":"100",
    "currency": "ETB",
    "tx_ref": "chewatatest-6661",
    "callback_url": "https://webhook.site/077164d6-29cb-40df-ba29-8a00e59a7e60",
    "return_url": "http://localhost/ravenclaw_hotel/confirmation.php",
    "customization[title]": "Ravenclaw Hotel",
    "customization[description]": "Room reservation."
    }',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer CHASECK_TEST-ij9Gbg3A0sGAYidFLASZhZMPRIaimbGr',
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);


echo $response;