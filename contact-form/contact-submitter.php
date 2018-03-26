<?php

error_reporting(E_ALL);
ini_set("display_errors", "1");

require_once('../samiholck/settings.php');
//use Sphp\Sessions\FileSessionHandler;
//$s = new FileSessionHandler();
//session_save_path (__DIR__.'/sess');
//$_SESSION['a'] = 'b';
//echo "path: ".session_save_path ( );
//session_write_close();
/* if ($s->getSessionId()) {
  $_SESSION['invalid-contact-form']
  } */
unset($_SESSION['invalid-contact-form']);

use Sphp\Security\CRSFToken;
use Sphp\Config\Config;
use Sphp\Validators\FormValidator;
use Sphp\Validators\RequiredValueValidator;
use Sphp\Manual\Contact\ContactMailer;
use Sphp\Manual\Contact\ContactData;

if (!CRSFToken::instance()->verifyPostToken('contact-form')) {
  CRSFToken::instance()->unsetToken('contact-form');
  $_SESSION['invalid-contact-form'] = 'Form is rejected by the server';
  $_SESSION['contact-form-submitted'] = false;
  echo "ebregrea";
} else {
  CRSFToken::instance()->unsetToken('contact-form');
  $args = [
      'fname' => FILTER_SANITIZE_STRING,
      'lname' => FILTER_SANITIZE_STRING,
      'email' => FILTER_SANITIZE_STRING,
      'phone' => FILTER_SANITIZE_STRING,
      'subject' => FILTER_SANITIZE_STRING,
      'message' => FILTER_SANITIZE_STRING,
  ];

  $vals = filter_input_array(INPUT_POST, $args);

  $validator = new FormValidator();
  $validator->set('email', new RequiredValueValidator());
  $validator->set('subject', new RequiredValueValidator());
  $validator->set('message', new RequiredValueValidator());
  if ($validator->isValid($vals)) {
    include 'verifyRecaptha.php';
    echo "ebra";
    /* echo "Valid form<pre>";
      printVar($vals);
      echo "</pre>"; */
    $data = new ContactData($vals);
    $mailer = new ContactMailer('sami.holck@samiholck.com', 'sami.holck@gmail.com');
    $mailer->sendContactData($data);
    $_SESSION['contact-form-submitted'] = true;
  }
}
echo "<pre>";
echo '<h1>$_POST</h1>';
print_r($_POST);
echo '<h1>$_SESSION</h1>';
print_r($_SESSION);
echo "</pre>";

use Sphp\Http\Headers\Location;

//(new Location(Config::instance()->get('ROOT_URL') . "who"))->execute();
