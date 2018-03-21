<?php

namespace Sphp\Html;

use Sphp\Stdlib\Path;

$html = Document::html();

$titleGenerator = new \Sphp\Manual\MVC\TitleGenerator($titles);

//echo '<pre>';
//echo \Sphp\MVC\Router::getCleanUrl();
$redirect = filter_input(INPUT_SERVER, 'REDIRECT_URL', FILTER_SANITIZE_URL);
$title = $titleGenerator->createTitleFor(trim($redirect, '/'));
Document::html()->setLanguage('en')->setDocumentTitle($title);

use Sphp\Html\Head\Meta;

$html->enableSPHP()->useVideoJS()->setViewport('width=device-width, initial-scale=1.0')->useFontAwesome();
Document::head()
        ->addMeta(Meta::charset('UTF-8'))
        ->addCssSrc('css/styles.all.css')
        ->addCssSrc('https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css')
       // ->useFontAwesome()
        //->useFoundationIcons()
        //->addCssSrc('css/styles.all.css')
        ->addCssSrc('https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css')
        ->setBaseAddr(Path::get()->http(), '_self')
        ->addShortcutIcon('http://www.samiholck.com/samiholck/pics/S-logo.png')
        ->add(Head\Link::create('http://www.samiholck.com/samiholck/pics/apple-touch-icon.png', 'apple-touch-icon'))
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
Document::body()->inlineStyles()->setProperty('visibility', 'hidden');
Document::html()->scripts()->appendSrc('samiholck/js/techs.js');
Document::html()->startBody();


