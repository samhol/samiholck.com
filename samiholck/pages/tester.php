<?php

use Sphp\Samiholck\Contact\ContactData;
use Sphp\Data\Human\Person;
$data = [
    'fname' => 'Sami',
    'lname' => 'Holck',
    'email' => 'sami.holck@gmail.com',
    'street' => 'Rakuunatie 59 A 3',
    'zipcode' => '20720',
    'city' => 'Turku',
    'country' => 'Finland',
    'phonenumber' => '+358 44 298 6738'
    
];
$person = new Person($data);
echo "<pre>";
var_dump($person->toArray());
$c = new ContactData($data);
echo "</pre>";

?>


<div class="centerer" >
  <span class="popuptext" id="myPopup">A Simple Popup!</span>
</div>
