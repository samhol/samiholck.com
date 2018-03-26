<?php

namespace Sphp\Html\Foundation\Sites\Forms\Inputs;

use Sphp\Html\Foundation\Sites\Forms\GridForm;
use Sphp\Html\Foundation\Sites\Buttons\Button;

use Sphp\Security\CRSFToken;

$newToken = CRSFToken::instance()->generateToken('contact-form');

$form = (new GridForm())
        ->setMethod('post')
        ->setAction('contact-form/contact-submitter.php')
        ->useValidation(true);

$form->appendHiddenVariable('contact-form', $newToken);

$fnameField = InputColumn::text('fname')
        ->setLabel('First name')
        ->setPlaceholder('First name');
$form->append($fnameField);

$lnameField = InputColumn::text('lname')
        ->setLabel('Last name')
        ->setPlaceholder('Last name');
$form->append($lnameField);

$emailField = InputColumn::email('email')
        ->setRequired()
        ->setErrorField('You need to give your Email address')
        ->setLabel('Email address')
        ->setPlaceholder('Email address');
$form->append($emailField);

$subjectField = InputColumn::text('subject')
        ->setRequired()
        ->setErrorField('You need to set a subject')
        ->setLabel('Message subject')
        ->setPlaceholder('subject');
$form->append($subjectField);

$messageField = InputColumn::textarea('message', null, 5)
        ->setLabel('Contact message')
        ->setRequired()
        ->setPlaceholder('Message text')
        ->setErrorField('You need to write a message');
$form->append($messageField);
$form->append(\Sphp\Manual\Contact\ReCaptha::createImage('6Lfh6U4UAAAAADLo3tCgAn27Zqam37ZsOBx41yt-'));
//$form->append('<div class="g-recaptcha" data-sitekey="6Lfh6U4UAAAAADLo3tCgAn27Zqam37ZsOBx41yt-"></div><br/>');
$form->append(Button::submitter('Submit form', 'submit'));

use Sphp\Html\Foundation\Sites\Grids\Row; 
use Sphp\Html\Foundation\Sites\Media\ResponsiveEmbed;

$map = ResponsiveEmbed::iframe('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1968.7082546795589!2d22.300856632547603!3d60.43352261303713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x468c7727a6466e41%3A0xa7ad26a37594a821!2sRakuunatie+59%2C+20720+Turku!5e0!3m2!1sen!2sfi!4v1521810129616');
$g = new Row();
$g->append($map)->layout()->setLayouts('small-12', 'large-6');
$g->append($form)->layout()->setLayouts('small-12', 'large-6');

if (array_key_exists('contact-form-submitted', $_SESSION) && $_SESSION['contact-form-submitted'] === true) {
   echo '<h2>Thank you for your contact request</h2>';
   unset($_SESSION['contact-form-submitted']);
}
?>

<h2>Contact Me</h2>
<?php echo $g; ?>
