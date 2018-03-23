<?php

error_reporting(E_ALL);
ini_set("display_errors", "1");

require_once('samiholck/settings.php');

function printVar(array $var) {
  foreach ($var as $key => $value) {
    if (is_array($value)) {
      $value = var_export($value, true);
    }
    echo "<b>$key</b>: $value\n";
  }
}

use Sphp\Security\CRSFToken;
use Sphp\Config\Config;
use Sphp\Validators\FormValidator;
use Sphp\Validators\RequiredValueValidator;

if (!CRSFToken::instance()->verifyPostToken('membership')) {
  //echo "rvgba<s";
  $_SESSION['invalidForm'] = 'Form is rejected by the server';
} else {
  $args = [
      'fname' => FILTER_SANITIZE_STRING,
      'lname' => FILTER_SANITIZE_STRING,
      'email' => FILTER_SANITIZE_STRING,
      'phone' => FILTER_SANITIZE_STRING,
      'message' => FILTER_SANITIZE_STRING,
  ];

  $vals = filter_input_array(INPUT_POST, $args);

  $validator = new FormValidator();
  $validator->set('email', new RequiredValueValidator());
  $validator->set('message', new RequiredValueValidator());
  if ($validator->isValid($vals)) {

    echo "Valid form<pre>";
    printVar($vals);
    echo "</pre>";
  }
}
echo "<pre>";
echo '<h1>$_POST</h1>';
printVar($_POST);
echo '<h1>$_SESSION</h1>';
printVar($_SESSION);
echo "</pre>";

use Sphp\Http\Headers\Location;

(new Location(Config::instance()->get('HTTP_ROOT') . "who"))->execute();
