<?php

use Sphp\Config\Config;
use Sphp\Html\Media\Icons\FontAwesome;
use Sphp\Html\Foundation\Sites\Buttons\ButtonGroup;

$curl = Sphp\Stdlib\Networks\URL::getCurrent();
$path = $curl->getPath();
$links = Sphp\Stdlib\Parser::fromFile('samiholck/config/navi.yaml');
$buttonGroup = new ButtonGroup();
$root = Config::instance()->get('ROOT_URL');
foreach ($links as $link) {
  if ($path !== $link['path']) {
    $buttonGroup->appendHyperlink($root . $link['path'], FontAwesome::get($link['icon']) .' '. $link['text']);
  }
}

echo $buttonGroup->addCssClass('page-navi', 'radius');
