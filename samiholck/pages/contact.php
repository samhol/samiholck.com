<?php

namespace Sphp\Html\Foundation\Sites\Forms\Inputs;

use Sphp\Html\Foundation\Sites\Forms\GridForm;
use Sphp\Html\Foundation\Sites\Buttons\Button;

$form = (new GridForm('get'))
        ->validation(true)
        ->setTarget("outputFrame");
$fnameField = InputColumn::text("fname")->setLabel('First name')->setPlaceholder("First name");
$form->append($fnameField);
$lnameField = InputColumn::text("lname")->setLabel('Last name')->setPlaceholder("Last name");
$form->append($lnameField);
$emailField = InputColumn::email("email")
        ->setRequired()
        ->setErrorField('You need to give your Email address')
        ->setLabel('Email address')
        ->setPlaceholder("Email address");
$form->append($emailField);
$messageField = InputColumn::textarea("message", null, 5)
        ->setLabel('Contact message')
        ->setRequired()
        ->setPlaceholder("Message")
        ->setErrorField("Yuo need to write a message");
$form->append($messageField);

$form->append(Button::submitter("Submit form", "submit"));

use Sphp\Html\Foundation\Sites\Grids\Row;
use Sphp\Html\Foundation\Sites\Media\ResponsiveEmbed;

$map = ResponsiveEmbed::iframe('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1968.7082546795589!2d22.300856632547603!3d60.43352261303713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x468c7727a6466e41%3A0xa7ad26a37594a821!2sRakuunatie+59%2C+20720+Turku!5e0!3m2!1sen!2sfi!4v1521810129616');
$g = new Row();
$g->append($map)->layout()->setLayouts('small-12', 'large-6');
$g->append($form)->layout()->setLayouts('small-12', 'large-6');
echo $g;
?>


<h2>Responsive Contact Section</h2>
<p>Resize the browser window to see the effect.</p>

<div class="container">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p>Swing by for a cup of coffee, or leave us a message:</p>
  </div>
  <div class="row">
    <div class="column">
      <div id="map" style="width:100%;height:500px"></div>
    </div>
    <div class="column">
      <form action="/action_page.php">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
        <label for="country">Country</label>
        <select id="country" name="country">
          <option value="australia">Australia</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
        </select>
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</div>
