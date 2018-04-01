<?php

namespace Sphp\Manual;

$birth = new \DateTime('1975-09-16 00:25 EET');
$now = new \DateTime();
$age = $now->diff($birth);

md(<<<MD
#WHO AM I? <small>...and does it matter?</small>

I am a $age->y years $age->m months and $age->d days old Finnish man.
I live in Turku with my common-law wife.
##Hobbies
I follow professional basketball, cycling and snooker. And I also enjoy practising first two of these sports myself.
        
Have you any questions or comments about these sites? ...
        
...Or Do you want to hire me to do Anything web related... back-end, front-end, testing...
        
Contact me if you do...
        
<hr>
MD
);

use Sphp\Html\Foundation\Sites\Containers\Modal;

include_once 'contact-form/form.php';

$modal = new Modal('<i class="far fa-envelope"></i> Contact form', $form);
$modal->getPopup()->prepend('<h2>Contact Form</h2>');
\Sphp\Html\Document::body()->scripts()->appendSrc('samiholck/js/contact-form.js');
$modal->getTrigger()->addCssClass('button radius');
echo $modal;


$myContacts = new Modal('<i class="far fa-envelope"></i> Contact form', '<h2>Contact Form</h2>');
$myContacts->getPopup()->appendPhpFile('contact-form/contacts.php');
$myContacts->getTrigger()->addCssClass('button radius');
echo $myContacts;
//oadPage('contact');
//include 'samiholck/templates/carousels/videos.php';
?>
