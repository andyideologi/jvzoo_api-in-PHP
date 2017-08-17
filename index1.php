<?php
$api_key = 'df5d511bd1e7fdab7065823ed6ba33030ac9a518f5ed5107f4aa72c505185e14';

$ch = curl_init("https://api.jvzoo.com/v2.0");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_HEADER, TRUE);
curl_setopt($ch, CURLOPT_USERPWD, $api_key . ":" . 'x');
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$response = curl_exec($ch);

$info = curl_getinfo($ch);
$headers = substr($response, 0, $info['header_size']);
$body = substr($response, -$info['download_content_length']);

echo "<pre>";
echo "<b>Headers:</b><hr>";
print_r($headers);
echo "\n<b>Response:</b><hr>";
echo "<div style=\"background-color: #F8F8F8;
            border: 1px solid #DDDDDD;
            border-radius: 3px;
            font-size: 13px;
            line-height: 19px;
            overflow: auto;
            padding: 6px 10px;\">"
        .json_encode(json_decode($body), JSON_PRETTY_PRINT)
    .'</div>';

echo "\n\n<b>Request Details:</b><hr>";
print_r($info);

exit;