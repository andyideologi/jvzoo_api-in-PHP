<?php

error_reporting(1);



try {

	

    $ch = curl_init("https://api.clickbank.com/rest/1.3/products/list");
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/xml", "Authorization:DEV-LDGC730APNO8REPO2QSM72BFVCF1DSST:API-9S5LF65M8CSC54JSNV4UFUDG1SPNGCS5"));

     curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization:DEV-LDGC730APNO8REPO2QSM72BFVCF1DSST:API-9S5LF65M8CSC54JSNV4UFUDG1SPNGCS5"));
	
	curl_setopt($ch, CURLOPT_HEADER, TRUE);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);	
	curl_setopt($ch, CURLOPT_SSLVERSION, 1);

	/* New fields for get response in body */
	curl_setopt($ch, CURLOPT_VERBOSE, 1);				
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$response = curl_exec($ch);

	 print_r($response); 

    if (FALSE === $response)
        throw new Exception(curl_error($ch), curl_errno($ch));

    
} catch(Exception $e) {
    	trigger_error(sprintf(
        'Curl failed with error #%d: %s',
        $e->getCode(), $e->getMessage()),
        E_USER_ERROR);
}

$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);

echo "<pre>";
print_r($body);die;