<?php

use Sphp\Config\Config;
use Sphp\Html\Media\Icons\FontAwesome;
use Sphp\Html\Foundation\Sites\Buttons\ButtonGroup;
if (Config::instance()->get('ROOT_URL') !== Config::instance()->get('CURRENT_URL')) {
  $button = Sphp\Html\Foundation\Sites\Buttons\Button::hyperlink(Config::instance()->get('ROOT_URL'), FontAwesome::get('fas fa-home').' home', '_self')->addCssClass('alert', 'radius');

 // echo $button;
}
$buttonGroup = new ButtonGroup();
$buttonGroup->appendHyperlink(Config::instance()->get('ROOT_URL'), FontAwesome::get('fas fa-home').' home', '_self')->addCssClass('alert', 'radius');
$buttonGroup->appendHyperlink(Config::instance()->get('ROOT_URL'), FontAwesome::get('fas fa-info-circle').' Who?', '_self')->addCssClass('alert', 'radius');
$buttonGroup->appendHyperlink(Config::instance()->get('ROOT_URL'), FontAwesome::get('fas fa-info-circle').' Why?', '_self')->addCssClass('alert', 'radius');

  echo $buttonGroup->addCssClass('page-navi', 'radius');
