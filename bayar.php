<?php

$req = json_encode(array("payment_type" => "vtweb"));
$username = "6d7ccd71-ea52-43cc-ac42-5402077bd6c6";

$string = file_get_contents("/var/www/veritrans/data.json");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.veritrans.co.id/v2/charge");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
curl_setopt($ch, CURLOPT_USERPWD, $username);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Accept: application/json',
	'Content-Type: application/json',
	'Authentication: Basic NmQ3Y2NkNzEtZWE1Mi00M2NjLWFjNDItNTQwMjA3N2JkNmM2Og=='
));

$result = curl_exec($ch);
echo $result;

?>
