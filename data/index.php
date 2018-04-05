<?php

namespace Sphp\Html\Foundation\Sites\Navigation;

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once('../samiholck/settings.php');

use Sphp\Http\Headers\Headers;

// required header
$headers = new Headers();
$headers->allowOrigin('*');
$headers->contentType('application/json; charset=UTF-8');
$headers->allowMethods('POST');
$headers->execute();

use Sphp\Stdlib\Parser;

$arr = Parser::fromFile('data/personal-info.yml');
$json =  json_encode($arr, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
echo $json;
//print_r(json_decode($json));
