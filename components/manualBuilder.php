<?php

namespace sph\tools;

include_once __DIR__ . "/manualTools/main.php";
if (isset($_REQUEST["page"])) {
	$req = ArrayUtils::map($_REQUEST, array("xssClean"));
	$path = __DIR__ . "/pages/";
	if (!in_array($req["page"] . ".php", FileUtils::dirToArray(__DIR__ . "/pages"))) {
		include __DIR__ . "/error.php";
	} else {
		include_once $path . $req["page"] . ".php";
	}
} else {
	include(__DIR__ . "/pages/index.php");
}
?>