<?php
include_once 'contact-form/form.php';
echo $form;
\Sphp\Html\Document::body()->scripts()->appendSrc('samiholck/js/contact-form.js');
