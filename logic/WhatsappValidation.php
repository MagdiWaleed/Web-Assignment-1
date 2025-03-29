
<?php
function validateWhatsAppNumber($phoneNumber) {
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
            'number' => '201142420289'
        ]),
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "x-rapidapi-host: whatsapp-number-validators.p.rapidapi.com",
            "x-rapidapi-key: 3be8078c7emshc615b462736395ap1c8b75jsn27f530b30ed0"
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
?>