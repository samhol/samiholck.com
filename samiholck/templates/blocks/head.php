<?php

namespace Sphp\Html;

use Sphp\Stdlib\Path;

$html = Document::html();

$titleGenerator = new \Sphp\Samiholck\MVC\TitleGenerator($titles);

//echo '<pre>';
//echo \Sphp\MVC\Router::getCleanUrl();
$redirect = trim(filter_input(INPUT_SERVER, 'REDIRECT_URL', FILTER_SANITIZE_URL), '/');
$title = $titleGenerator->createTitleFor($redirect);
Document::html()->setLanguage('en')->setDocumentTitle($title);

use Sphp\Html\Head\Meta;

$html->enableSPHP()
        ->setViewport('width=device-width, initial-scale=1.0')
        ->useFontAwesome();
Document::head()
        ->addMeta(Meta::charset('UTF-8'))
        ->addCssSrc('css/styles.all.css')
        ->addCssSrc('https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css')
       // ->useFontAwesome()
        //->useFoundationIcons()
        //->addCssSrc('css/styles.all.css')
        ->addCssSrc('https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css')
        //->setBaseAddr(Path::get()->http(), '_self')
        ->addShortcutIcon('http://data.samiholck.com/images/S-logo.png')
        ->add(Head\Link::create('http://data.samiholck.com/images/apple-touch-icon.png', 'apple-touch-icon'))
        ->addMeta(Meta::author('Sami Holck'))
        ->addMeta(Meta::keywords([
                    'php',
                    'scss',
                    'css',
                    'html',
                    'html5',
                    'foundation',
                    'JavaScript',
                    'DOM',
                    'Web development',
                    'tutorials',
                    'programming',
                    'references',
                    'examples',
                    'source code',
                    'tips']))
        ->addMeta(Meta::description('Personal homepage of Sami Holck'));
/*if ($redirect === 'contactTest') {
   Document::html()->scripts()->appendSrc('https://www.google.com/recaptcha/api.js')->setAsync()->setDefer();
}*/
  
//Document::body()->inlineStyles()->setProperty('visibility', 'hidden');
Document::html()->scripts()->appendSrc('samiholck/js/techs.js');
Document::html()->startBody();


