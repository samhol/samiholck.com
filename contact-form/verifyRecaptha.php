<?php

$response = $_POST["g-recaptcha-response"];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
    'secret' => '6Lfh6U4UAAAAAADk_T1MpBhlLy72QTMES2z_I9QB',
    'response' => $response
);
$query = http_build_query($data);
$options = array(
    'http' => array(
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
        "Content-Length: " . strlen($query) . "\r\n" .
        "User-Agent:MyAgent/1.0\r\n",
        'method' => 'POST',
        'content' => $query
    )
);
$context = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
$captcha_success = json_decode($verify);
print_r($captcha_success);
if ($captcha_success->success == false) {
  echo "<p>You are a bot! Go away!</p>";
} else if ($captcha_success->success == true) {
  echo "<p>You are not not a bot!</p>";
}
use Sphp\Manual\Contact\ReCaptha;
var_dump(ReCaptha::isValid('6Lfh6U4UAAAAAADk_T1MpBhlLy72QTMES2z_I9QB'));
