<?php

namespace Sphp\Html;

use Sphp\Http\HttpCodeCollection;
use Sphp\Stdlib\Path;
use Sphp\MVC\Router;
Document::setHtmlVersion(Document::HTML5);

$errorCode = filter_input(INPUT_SERVER, 'REDIRECT_STATUS', FILTER_SANITIZE_NUMBER_INT);
if ($errorCode === null) {
  $errorCode = filter_input(INPUT_GET, 'error_code', FILTER_SANITIZE_NUMBER_INT);
} if ($errorCode === null){
  
}
$title = 'foo';
$html = Document::html();


use Sphp\Html\Head\Meta;
$html->setLanguage('en');
$html->head()
        ->useFontAwesome()
        ->addCssSrc('css/styles.css')
        ->addCssSrc('vendor/zurb/foundation/dist/css/foundation.min.css')
        ->addCssSrc('https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css')
        ->addCssSrc('//cdn.jsdelivr.net/devicons/1.8.0/css/devicons.min.css')
        ->setBaseAddr(Path::get()->http(), '_self')
        ->addShortcutIcon(Path::get()->http('components/pics/error.png'))
        ->addMeta(Meta::author('Sami Holck'))
        ->addMeta(Meta::keywords(['sami', 'holck', 'personal', 'site']))
        ->addMeta(Meta::description('Raision veneseuran kotisivut'));

echo $html->getOpeningTag() . $html->head();
