<?php

use Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

$node = 'http://' . getenv('NODE_IP') . ':' . getenv('NODE_PORT');

$request = json_encode(
    [
        'action' => 'version'
    ]
);

$ch = curl_init($node);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($request)
    )
);

$curl_result = curl_exec($ch);

// connection errors go here:
if (curl_errno($ch)) {
    echo 'Curl error while trying to reach node: ' . curl_error($ch) . '';
} else {
    // results and node errors go here
    echo $curl_result;
}
