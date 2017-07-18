<?php

namespace sph\html\foundation\navigation;
use sph\html\Hyperlink as Hyperlink;

$navi = new TopBar();
$sphMenu = new DropDownMenu(new Hyperlink("http://playground.samiholck.com/", "SPHP framework", "sphp"));
$sphMenu->appendLink("https://github.com/samhol/SPHP-framework", "SPHP on GitHub")
		->appendSeparator("API documentation:")
		->appendLink("http://apigen.samiholck.com/", "Apigen")
		->appendLink("http://jsdocs.samiholck.com/", "JsDocs")
		->appendSeparator("Borrowed stuff:");
$borrowedPHPMenu = (new DropDownMenu("PHP stuff"))
		->appendLink("http://symfony.com/doc/current/components/class_loader/introduction.html", "Symfony ClassLoader")
		->appendLink("https://github.com/cbschuld/Browser.php", "Browser class")
		->appendLink("https://github.com/Synchro/PHPMailer", "PHPMailer library");
$sphMenu->append($borrowedPHPMenu);
$clientSideMenu = new DropDownMenu("Clientside");
$clientSideMenu->appendLink("http://modernizr.com/", "Modernizr")
		->appendLink("http://jquery.com/", "jQuery")
		->appendLink("http://foundation.zurb.com/", "Foundation");
$sphMenu->append($clientSideMenu);
$relicsMenu = new DropDownMenu("Relics");
$relicsMenu->appendLink("http://users.utu.fi/samhol/oldies/CV", "Very old CV")
		->appendSeparator("Keijupäiväkodit:")
		->appendLink("http://users.utu.fi/samhol/KPK", "Frontpage")
		->appendSeparator("HOLCKSTERZ zones:")
		->appendLink("http://users.utu.fi/samhol/", "New zone (broken)")
		->appendLink("http://users.utu.fi/samhol/oldies", "Old zone (less broken)")
		->appendSeparator("For Turku Polytechnics:")
		->appendLink("http://users.utu.fi/samhol/oldies/server/", "DVD - ja multimedialaboratorio");

$navi->useGridWidth()->right()
		->appendDivider()
		->append($sphMenu)
		->appendDivider()
		->append($relicsMenu)
		->appendDivider();
//$navi->append(new ATag("http://www.tuetk.net/", "Turun koripalloerotuomarikerho"));
echo $navi;
?>
