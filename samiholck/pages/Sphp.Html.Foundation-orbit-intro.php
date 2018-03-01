<?php

namespace Sphp\Html\Foundation\Sites; 

use Sphp\Html\Foundation\Sites\Media\Orbit\Orbit;
use Sphp\Html\Foundation\Sites\Media\Orbit\HtmlSlide;

$orbitIntro = new Orbit();
$orbitIntro->addCssClass('foundation-intro');
$orbitIntro->slides()->appendMdFile('samiholck/pages/Foundation-intro/Grids.php');
$navSlide = new HtmlSlide();
$navSlide->appendMdFile('samiholck/pages/Foundation-intro/Navigation.php');
$orbitIntro->slides()->append($navSlide);
$buttonSlide = new HtmlSlide();
$buttonSlide->appendMdFile('samiholck/pages/Foundation-intro/Buttons.php');
$orbitIntro->slides()->append($buttonSlide);
$orbitIntro->slides()->appendMdFile('samiholck/pages/Foundation-intro/Media.php');
$orbitIntro->slides()->appendMdFile('samiholck/pages/Foundation-intro/Forms.php');

$orbitIntro->printHtml();
