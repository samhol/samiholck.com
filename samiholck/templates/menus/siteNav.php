<?php

use Sphp\Config\Config;
use Sphp\Html\Media\Icons\FontAwesome;
if (Config::instance()->get('ROOT_URL') !== Config::instance()->get('CURRENT_URL')) {
  $button = Sphp\Html\Foundation\Sites\Buttons\Button::hyperlink(Config::instance()->get('ROOT_URL'), FontAwesome::get('fas fa-home').' Frontpage', '_self')->addCssClass('alert', 'radius');

  echo $button;
}
