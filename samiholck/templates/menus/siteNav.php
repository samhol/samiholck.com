<?php

use Sphp\Config\Config;

if (Config::instance()->get('ROOT_URL') !== Config::instance()->get('CURRENT_URL')) {
  $button = Sphp\Html\Foundation\Sites\Buttons\Button::hyperlink(Config::instance()->get('ROOT_URL'), 'Frontpage', '_self')->addCssClass('alert', 'radius');

  echo $button;
}
