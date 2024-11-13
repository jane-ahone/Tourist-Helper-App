<?php
session_start();
function get_subscription_key()
{
    return "2c24380da5714f35927b8b3c3a5d9daf";
}

function get_uuid($data = null)
{
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function get_api_key_and_user()
{
    // $url = "https://sandbox.momodeveloper.mtn.com/v1_0/";
    // $endpoint = "apiuser";
    // $fields = [
    //     'providerCallbackHost' => 'https://webhook.site/2c6d1ab7-4fc2-4f3d-be1e-7d64b6b8a62c',
    // ];

    // $reference_id = get_uuid();

    // //Creating API_User
    // $ch = curl_init();

    // //set the url, number of POST vars, POST data
    // curl_setopt($ch, CURLOPT_URL, $url . $endpoint);
    // curl_setopt($ch, CURLOPT_POST, true);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //     "Ocp-Apim-Subscription-Key: " . get_subscription_key(),
    //     "X-Reference-Id: " . $reference_id,
    // ));

    // //execute post
    // $result = curl_exec($ch);
    // echo $result;
    // if (false == $result) {
    //     echo "Failure in registering API_User.";
    //     return false;
    // }

    // //Creating API Key
    // $ch = curl_init();

    // //set the url, number of POST vars, POST data
    // curl_setopt($ch, CURLOPT_URL, $url . $endpoint . "/" . $reference_id . "/apikey");
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_POST, true);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //     "Ocp-Apim-Subscription-Key: " . get_subscription_key(),
    // ));

    // // // Geting the API Key
    // // $ch = curl_init();


    // // //set the url, number of POST vars, POST data
    // // curl_setopt($ch,CURLOPT_URL, $url . $endpoint . "/" . $reference_id . "?" . http_build_query($fields));
    // // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    // //     "Ocp-Apim-Subscription-Key: " . get_subscription_key(),
    // // ));

    // $response = curl_exec($ch);
    // echo $response;

    // if ($response == false) {
    //     echo "Failure in acquiring API_Key.";
    //     return false;
    // }
    // curl_close($ch);

    // $jsonResponse = json_decode($response, true);
    $jsonResponse = [];
    $jsonResponse["apiUser"] = "929f4670-0d39-4863-8eeb-fbeeb2368ca6";
    $jsonResponse["apiKey"] = "54350e0d8e6d413db978614270833254";

    return $jsonResponse;
}

function generate_access_token()
{
    $url = "https://sandbox.momodeveloper.mtn.com/collection/token/";
    $accessKeys = get_api_key_and_user();
    if ($accessKeys == false) {
        return false;
    }

    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, []);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Ocp-Apim-Subscription-Key: " . get_subscription_key(),
        'Authorization: Basic ' .  base64_encode($accessKeys["apiUser"] . ":" . $accessKeys["apiKey"])
    ));

    $response = curl_exec($ch);
    if ($response == false) {
        echo "Failure in acquiring access_token.";
        return false;
    }
    curl_close($ch);

    $jsonResponse = json_decode($response, true);

    return $jsonResponse['access_token'];
}


function request_to_pay($amount, $payer, $access_token, $reference_id) {
    $url = "https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay";
    // echo $access_token;

    $fields = json_encode([
        'amount' => "".$amount,
        'currency' => 'EUR',
        'externalId' => '1584651651',
        'payer' => [
            "partyIdType" => "MSISDN",
            "partyId" => $payer
        ],
        "payerMessage" => "Cycee Lets you Find your way!!!!"
    ]);

    $options = [
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/json\r\n" .
                        "Authorization: Bearer $access_token\r\n" .
                        "Ocp-Apim-Subscription-Key: " . get_subscription_key() . "\r\n" .
                        "X-Reference-Id: $reference_id\r\n" .
                        "X-Target-Environment: sandbox",
            'content' => $fields,
            'ignore_errors' => true
        ]
    ];

    $context = stream_context_create($options);

    $response = @file_get_contents($url, false, $context);
    echo "\nResponse: " . $response;

    if (isset($http_response_header)) {
        $status_line = $http_response_header[0];
        preg_match('{HTTP\/\S*\s(\d{3})}', $status_line, $match);
        $status_code = $match[1] ?? 'Unknown';
        if ($status_code == 202) {
            echo "Success: Request to pay was successful.";
            return true;
        }
        echo "Error: HTTP Status Code $status_code. No response received.";
    } else {
        echo "Error: Unable to connect to $url";
    }
    return false;
}


function get_request_status($access_token, $reference_id)
{
    // sleep(10);
    $status = "PENDING";
    $counter = 0;
    do {
        sleep(3);
        $url = "https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay/" . $reference_id;

        $ch = curl_init();


        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $access_token,
            "Ocp-Apim-Subscription-Key: " . get_subscription_key(),
            'X-Target-Environment: sandbox'
        ));
        $response = curl_exec($ch);
        echo "\nREsponding: " . $response;
        if ($response == false) {
            if ($counter < 3) {
                $counter++;
                curl_close($ch);
                continue;
            } else {
                echo "Failure in validating transaction.";
                return false;
            }
        }
        $counter = 0;
        curl_close($ch);

        $jsonResponse = json_decode($response, true);
        $status = $jsonResponse["status"];
    } while ($status == "PENDING");

    echo "\nStatus: " . $status;

    return $status == "SUCCESSFUL";
}

function process_payment($amount, $payer, $reference)
{

    $access_token = generate_access_token();
    if ($access_token == false) {
        echo "Failure in generating access_token.";
        return false;
    }
    if (false == request_to_pay($amount, $payer, $access_token, $reference)) {
        echo "Failure in requesting to pay.";
        return false;
    }
    return get_request_status($access_token, $reference);
}


// process_payment(10, "22123456", get_uuid());