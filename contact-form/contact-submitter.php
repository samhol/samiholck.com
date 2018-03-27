<?php

error_reporting(E_ALL);
ini_set("display_errors", "1");

require_once('../samiholck/settings.php');

//unset($_SESSION['contact-form']);

use Sphp\Security\CRSFToken;
use Sphp\Config\Config;
use Sphp\Validators\FormValidator;
use Sphp\Validators\RequiredValueValidator;
use Sphp\Manual\Contact\ContactMailer;
use Sphp\Manual\Contact\ContactData;
use Sphp\Security\ReCaptha;

$args = [
    'fname' => FILTER_SANITIZE_STRING,
    'lname' => FILTER_SANITIZE_STRING,
    'email' => FILTER_SANITIZE_STRING,
    'phone' => FILTER_SANITIZE_STRING,
    'subject' => FILTER_SANITIZE_STRING,
    'message' => FILTER_SANITIZE_STRING,
];

$_SESSION['contact-form']['submitted'] = false;
$vals = filter_input_array(INPUT_POST, $args);

$_SESSION['contact-form']['form-data'] = $vals;
if (!CRSFToken::instance()->verifyPostToken('contact-form')) {
  CRSFToken::instance()->unsetToken('contact-form');
  $_SESSION['contact-form']['error'] = 'CRSF';
} else if (!ReCaptha::isValid('6Lfh6U4UAAAAAADk_T1MpBhlLy72QTMES2z_I9QB')) {
  $_SESSION['contact-form']['error'] = 'ROBOT';
} else {

  $validator = new FormValidator();
  $validator->set('email', new RequiredValueValidator());
  $validator->set('subject', new RequiredValueValidator());
  $validator->set('message', new RequiredValueValidator());
  if ($validator->isValid($vals)) {
    //include 'verifyRecaptha.php';
    /* echo "Valid form<pre>";
      printVar($vals);
      echo "</pre>"; */
    $data = new ContactData($vals);
    //$mailer = new ContactMailer('sami.holck@samiholck.com', 'sami.holck@gmail.com');
    //$mailer->sendContactData($data);
    $_SESSION['contact-form']['submitted'] = true;
  }
}
CRSFToken::instance()->unsetToken('contact-form');
/* echo "<pre>";
  echo '<h1>$_POST</h1>';
  print_r($_POST);
  echo '<h1>$_SESSION</h1>';
  print_r($_SESSION);
  echo "</pre>";
 */

use Sphp\Http\Headers\Location;

(new Location(Config::instance()->get('ROOT_URL') . "contactTest"))->execute();
