<?php

$req = new stdClass;
$req->payment_type = "vtweb";
$req->vtweb = (object) array("enabled_payments" => ["credit_card"]);
$req->transaction_details = (object) array("order_id" => "order1", "gross_amount" => $_POST["price"]);
$req->item_details = [(object) array("id" => $_POST["itemid"], "price" => $_POST["price"], "quantity" => $_POST["quantity"], "name" => $_POST["name"])];
$req->customer_details = (object) array("first_name" => $_POST["fname"], "last_name" => $_POST["lname"], "email" => $_POST["mail"], "phone" => $_POST["phone"], "billing_address" => (object) array("first_name" => $_POST["bifname"], "last_name" => $_POST["bilname"], "address" => $_POST["biaddress"], "city" => $_POST["bicity"], "postal_code" => $_POST["bipostcode"], "phone" => $_POST["biphone"], "country_code" => $_POST["biccode"]), "shipping_address" => (object) array("first_name" => $_POST["shfname"], "last_name" => $_POST["shlname"], "address" => $_POST["shaddress"], "city" => $_POST["shcity"], "postal_code" => $_POST["shpostcode"], "phone" => $_POST["shphone"], "country_code" => $_POST["shccode"]));

$username = "6d7ccd71-ea52-43cc-ac42-5402077bd6c6";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.veritrans.co.id/v2/charge");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($req));
curl_setopt($ch, CURLOPT_USERPWD, $username);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Accept: application/json',
	'Content-Type: application/json',
	'Authentication: Basic NmQ3Y2NkNzEtZWE1Mi00M2NjLWFjNDItNTQwMjA3N2JkNmM2Og=='
));

$result = curl_exec($ch);
curl_close($ch);

$hasil = json_decode($result, true);
var_dump($result);
var_dump($hasil);

?>