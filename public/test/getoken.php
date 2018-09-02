<?php 
/*use ixudra\Curl\Facades\Curl;
$response = Curl::to('http://192.168.182.136/api/index.php?action=authenticate')
        ->withData( array( 'username' => 'admin' ) )
        ->withData( array( 'password' => 'Maxabdo95' ) )
        ->post();
echo $response;*/

$data1 = [
    'username' => 'admin',
    'password' => 'Maxabdo95',
];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://192.168.182.138/api/index.php?action=authenticate",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30000,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($data1),
    CURLOPT_HTTPHEADER => array(
    	// Set here requred headers
        "accept: */*",
        "accept-language: en-US,en;q=0.8",
        "content-type: application/json",
    ),
));
$result = curl_exec($curl);
$err = curl_error($curl);
echo json_encode($result);

curl_close($curl);


if ($err) {
    echo "cURL Error #:" . $err;
} else {
    print_r(json_decode($result));
}

?>