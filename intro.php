<?php

namespace Sphp\Html;


error_reporting(E_ALL);
ini_set("display_errors", "1");

require_once('samiholck/settings.php');

$redirect = filter_input(INPUT_SERVER, 'REDIRECT_URL', FILTER_SANITIZE_URL);

use Sphp\Stdlib\Path;

$html = Document::html();

$titleGenerator = new \Sphp\Manual\MVC\TitleGenerator($titles);

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
        ->addCssSrc('css/intro/styles.all.css')
        ->addCssSrc('https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css')
       // ->useFontAwesome()
        //->useFoundationIcons()
        //->addCssSrc('css/styles.all.css')
        //->addCssSrc('https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css')
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
/*if ($redirect === 'contactTest') {
   Document::html()->scripts()->appendSrc('https://www.google.com/recaptcha/api.js')->setAsync()->setDefer();
}*/
  
//Document::body()->inlineStyles()->setProperty('visibility', 'hidden');
//Document::html()->scripts()->appendSrc('samiholck/js/techs.js');
Document::html()->startBody();



$cacheSuffix = str_replace(['.', '/'], ['-', ''], $redirect) . "-cache";


?>

<div class="orbit clean-hero-slider" role="region" aria-label="Favorite Space Pictures" data-orbit>
  <div class="orbit-wrapper">
    <div class="orbit-controls">
      <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
      <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
    </div>
    <ul class="orbit-container">
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="intro/burning.jpg" alt="Falmes in Mellilä">
          <figcaption class="orbit-caption">
            <h3>Burning desire</h3>
            <p>Etiam porta sem malesuada magna mollis euismod. Vestibulum id ligula porta felis euismod semper.</p>
            <a href="#" class="button yellow">Mattis Elit</a>
          </figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="intro/summer_night.jpg" alt="Summer night in Mellilä">
          <figcaption class="orbit-caption">
            <h3>Full Stack Web developer</h3>
            <p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec ullamcorper nulla non metus auctor fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#" class="button yellow">Egestas Amet</a>
          </figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="intro/project.jpg" alt="Painting the barn">
          <figcaption class="orbit-caption">
            <h3>Projects</h3>
            <p>Fusce dapibus, tellus ac cursus commodo, sit amet risus. Cras mattis consectetur purus sit amet fermentum. Maecenas sed diam sit amet non magna.</p>
            <div class="button-group">
            <a href="#" class="button yellow">samiholck.com</a>
            <a href="#" class="button yellow">SPHPlayground</a>
            <a href="#" class="button yellow">Raision veneseura</a>
            </div>
          </figcaption>
        </figure>
      </li>
    </ul>
  </div>
  <nav class="orbit-bullets">
    <button class="is-active" data-slide="1"><span class="show-for-sr">Lorem Ipsum Etiam</span></button>
    <button data-slide="2"><span class="show-for-sr">Lorem Ipsum Etiam</span></button>
    <button data-slide="3"><span class="show-for-sr">Lorem Ipsum Etiam</span></button>
  </nav>
</div>

<?php

$html->documentClose();
