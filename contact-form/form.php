<?php

namespace Sphp\Html\Foundation\Sites\Forms\Inputs;

use Sphp\Html\Foundation\Sites\Forms\GridForm;
use Sphp\Html\Foundation\Sites\Buttons\Button;
use Sphp\Security\CRSFToken;
use Sphp\Security\ReCaptha;

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

$form->append(ReCaptha::createImage('6Lfh6U4UAAAAADLo3tCgAn27Zqam37ZsOBx41yt-'));

$form->append(Button::submitter('Submit form', 'submit'));
