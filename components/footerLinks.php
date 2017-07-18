<?php

namespace sph\html\foundation;

use sph\html\lists\Ul as Ul;

$links["projects"] = (new Ul())->addCssClass("sph-linkList")
		->appendLi("Projects", "heading")
		->appendLink("http://sphp.samiholck.com/", "SPHP framework", "_blank")
		->appendLink("#", "Tuetk.net", "_self")
		->appendLink("http://keiju.samiholck.com/", "Keijupäiväkodit", "_blank")
		->appendLink("http://unikoris.naiset.samiholck.com/", "Unikoris", "_blank")
		->appendLink("https://github.com/samhol/Ville-Video", 'Ville Video <span class="label">Vaadin</span>', "_blank");
$links["basketball"] = (new Ul())->addCssClass("sph-linkList")
		->appendLi("Basketball", "heading")
		->appendLink("http://www.nba.com/", "NBA.com", "_blank")
		->appendLink("http://www.euroleague.net/", "Euroleague", "_blank")
		->appendLink("http://www.fiba.com/", "FIBA.com", "_blank")
		->appendLink("http://korisliiga.fi/", "Korisliiga", "_blank")
		->appendLink("http://www.basket.fi/", "BASKET.fi", "_blank");
$links["cycling"] = (new Ul())->addCssClass("sph-linkList")
		->appendLi("Cycling", "heading")
		->appendLink("http://www.letour.fr/us/", "Tour de France", "_blank")
		->appendLink("http://www.cube.eu/", "Cube", "_blank")
		->appendLink("http://www.bianchi.com/", "Bianchi", "_blank");

(new grids\Row($links))
		->addCssClass("sph-row")
		->printHtml();
