
<?php

function validateWhatsAppNumber($phoneNumber): bool {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://whatsapp-number-validators.p.rapidapi.com/v1/validate/wa_id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'number' => $phoneNumber
        ]),
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "x-rapidapi-host: whatsapp-number-validators.p.rapidapi.com",
            "x-rapidapi-key: 5759222c12msh9424aa2b1b6185dp11822fjsn48fea66b51cc"
        ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return false; // Return false if there's a cURL error
    }

    $result = json_decode($response, true);
    
    // Check if the response indicates a valid WhatsApp number
    if (isset($result['valid']) && $result['valid'] === true) {
        return true;
    }
    
    return false;
}
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $whatsapp_number = "2" . $_POST['whatsapp_number']; // ex : 201090965111
    if (validateWhatsAppNumber($whatsapp_number)){
        echo json_encode(["state"=>"success",'message'=>"success"]);
    }else{
        echo json_encode(['state'=> 'failed','message'=>"your number doesnt have a whatsapp"]);
    }
    exit;

}
?>
