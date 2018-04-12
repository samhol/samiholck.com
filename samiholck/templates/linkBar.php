<?php

use Sphp\Html\Foundation\Sites\Buttons\ButtonGroup;
use Sphp\Stdlib\Parser;
use Sphp\Stdlib\Networks\URL;
use Sphp\Html\Media\Icons\FontAwesome;

$links = Parser::fromFile('samiholck/config/linkBar.yml');
$linkBar = new ButtonGroup();
$url = URL::getCurrent();

foreach ($links as $link) {
  $text = FontAwesome::get($link['icon']) . ' ' . $link['text'];
  $hyperLink = $linkBar->appendHyperlink($link['href'], $text);
  if ($url->equals($link['href'])) {
    $hyperLink->addCssClass('disabled');
  }
}

echo "<hr>$linkBar";
