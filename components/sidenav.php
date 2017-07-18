<?php

namespace sph\html\foundation\navigation;
use sph\tools\Config as Config;
$httpRoot = Config::instance()->get("HTTP_ROOT");
$sidenav = (new SideNav("CONTENT"))
		->addCssClass("sph ")
		
		->appendLink($httpRoot, "Frontpage", "_self")

		->appendHeading("Current Projects") 
		->appendLink("http://www.samiholck.com/", "samiholck.com", "_blank")
		->appendLink("http://sphp.samiholck.com/", "SPHP framework", "_blank")
		->appendHeading("Past Projects") 
		->appendLink("#", "Tuetk.net", "_blank")
		->appendLink("http://keiju.samiholck.com/", "Keijupäiväkodit", "_blank")
		->appendLink("http://unikoris.naiset.samiholck.com/", "Unikoris", "_blank")
		->appendLink("https://github.com/samhol/Ville-Video", 'Ville Video <span class="label">Vaadin</span>', "_blank")
		
		->appendHeading("other interests")
		->appendLink("$httpRoot?page=html.foundation", "Foundation")
		
		->appendHeading("Related stuff:")
		->appendLink("http://foundation.zurb.com/", "Foundation", "_blank")
		->appendLink("http://jquery.com/", "jQuery", "_blank")
		->appendLink("http://www.php.net/", "PHP: Hypertext Preprocessor", "_blank");

echo $sidenav;
?>