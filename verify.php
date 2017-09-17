<?php
$access_token = '6W2OTEsmOrywElp+4VOXXOhvkRK8JzxpMLpD/Ev/6r5JpOhjP3CR+s9l0rrj6sRziSHyq5qTtNEnFavVecf4BwV+jZ0BvFhCb13unniqRMhfnBFL8/l0OLQYNGjw6wzjVT65ZVWNKJnj3TRjSngnIAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
