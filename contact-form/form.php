<?php

namespace Sphp\Html\Foundation\Sites\Forms\Inputs;

use Sphp\Html\Foundation\Sites\Forms\GridForm;
use Sphp\Security\CRSFToken;
use Sphp\Security\ReCaptcha;

$newToken = CRSFToken::instance()->generateToken('contact-form');

$form = (new GridForm())
        ->addCssClass('contact-form')
        ->setMethod('post')
        ->useValidation()
        ->setAction('contact-form/send.php');
       // ->validateOnBlur()
       // ->liveValidate();
$form->attributes()->setIdentifier('id', 'submit-form');

$form->appendHiddenVariable('contact-form', $newToken);

$fnameField = InputColumn::text('name')
        ->setLabel('Name')
        ->setPlaceholder('your name');
$form->append($fnameField);
$emailField = InputColumn::email('email')->setSubmitValue('sami.holck@gmail.com')
        ->setRequired()
        ->setErrorField('You need to give your Email address')
        ->setLabel('Email address')
        ->setPlaceholder('Email address');
$form->append($emailField);

$subjectField = InputColumn::text('subject', 'f')
        ->setRequired()
        ->setErrorField('You need to set a subject')
        ->setLabel('Message subject')
        ->setPlaceholder('subject');
$form->append($subjectField);

$messageField = InputColumn::textarea('message', null, 5)->setSubmitValue(' df')
        ->setLabel('Contact message')
        ->setRequired()
        ->setPlaceholder('Message text')
        ->setErrorField('You need to write a message');
$form->append($messageField);

$form->append(ReCaptcha::createImage('6Lfh6U4UAAAAADLo3tCgAn27Zqam37ZsOBx41yt-', 'correctCaptcha'));
$bGroup = new \Sphp\Html\Foundation\Sites\Buttons\ButtonGroup;
$bGroup->appendSubmitter('<i class="far fa-envelope"></i> Submit form')->setColor('success');
$bGroup->appendResetter('<i class="fas fa-eraser"></i> Reset form')->setColor('alert');
$form->append($bGroup);

$form->setAttribute('data-validators', 'capV.setValid');
