<?php
/*
  namespace Sphp\Html\Foundation\Sites\Navigation;

  use Sphp\Html\Foundation\Sites\Bars\TopBar;
  use Sphp\Html\Foundation\Sites\Navigation\MenuBuilder;
  use Sphp\Html\Apps\Forms\SiteSearch360Form;
  use Sphp\Html\Adapters\QtipAdapter;
  use Sphp\Html\Foundation\Sites\Containers\ThrowableCallout;

  try {
  $navi = new TopBar();
  $navi->stackFor('medium');
  $navi->addCssClass('sphp-manual');

  //$manual = (new SubMenu('Documentation'));
  $redirect = filter_input(INPUT_SERVER, 'REDIRECT_URL', FILTER_SANITIZE_URL);
  $leftDrop = new DropdownMenu();
  $builder = new MenuBuilder(new MenuLinkBuilder(trim($redirect, '/')));
  $leftDrop->appendSubMenu($builder->buildSub($manualLinks));
  $leftDrop->appendSubMenu($builder->buildSub($dependenciesLinks));
  $leftDrop->appendSubMenu($builder->buildSub($externalApiLinks));
  $navi->left()->setContent($leftDrop);

  $form = new SiteSearch360Form('playground.samiholck.com');
  $form->setLabelText(false);
  $form->setPlaceholder('keywords in documentation');

  (new QtipAdapter($form->getSubmitButton()))->setQtipPosition('bottom right', 'top center')->setViewport($navi->right());
  $navi->right()->setContent('<ul class="menu"><li>' . $form . '</li></ul>');

  $navi->printHtml();
  } catch (\Exception $e) {
  echo new ThrowableCallout($e, true, true);
  }


 */
?>
<div class="title-bar sphp-hide-fouc-on-load" data-responsive-toggle="responsive-menu" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle="responsive-menu"><span class="show-for-sr">Menu navigation</span></button>
</div>

<div class="top-bar sphp-hide-fouc-on-load" id="responsive-menu">
  <div class="top-bar-left">
    <ul  class="vertical medium-horizontal menu" data-responsive-menu="drilldown medium-dropdown">
      <li><a href="http://www.samiholck.com/who">Who am I</a></li>
      <li><a href="http://www.samiholck.com/why">Why?</a></li>
      <li class="has-submenu">
        <a href="#">Projects</a>
        <ul class="submenu menu vertical sphp-hide-fouc-on-load" data-submenu>
          <li class="menu-text">Current:</li>
          <li><a href="http://playground.samiholck.com">SPHPlayground</a></li>
          <li class="menu-ruler"></li>
          <li><a href="http://www.raisionveneseura.fi">Raision veneseura</a></li>
          <li class="menu-text">Past: <i class="fas fa-ban fa-pull-right"></i></li>
          <li><a href="http://www.samiholck.com/archive/keiju">Keijupäiväkodit</a></li>
          <li><a href="http://www.samiholck.com/archive/unikoris">Unikoris</a></li>
          <li><a href="http://www.samiholck.com/archive/dvdlabra">DVD laboratorio</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="top-bar-right">

  </div>
</div>
