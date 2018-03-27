<?php

use Sphp\Html\Media\Icons\Svg;
?>
<div class="grid-x sphp-slick-container"> 
  <div class="cell auto">
    <div class="sphp-tech-slick" id="skill-icons">

      <div class="sphp-info-button" data-tech="sphp-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/s-logo.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="html5-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/html5-logo.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="css-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/css3-logo.svg') ?>
        </div>
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/sass-logo.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="js-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/js-logo.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="nodejs-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/nodejs-logo.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="gulp-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/gulp-logo.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="foundation-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/foundation-logo.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="php-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/php-original.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="symfony-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/symfony.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="zend-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/zend-logo.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="doctrine-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/doctrine-logo.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="mysql-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/mysql-logo.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="postgresql-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/postgresql.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="sqlite-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/sqlite-logo.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="java-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/java-logo.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="apache-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/apache-logo.svg') ?>
        </div>
      </div>

      <div class="sphp-info-button" data-tech="photoshop-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/photoshop-logo.svg') ?>
        </div>
      </div>
      <div class="sphp-info-button" data-tech="c-info">
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/c-logo.svg') ?>
        </div>
        <div class="svg-container">
          <?php echo Svg::fromFile('samiholck/svg/cpp-logo.svg') ?>
        </div>
      </div>

    </div>
  </div>
</div>


<div class="info-carousel" id="skill-info">
  <?php include('content/skills-parsed.php') ?>
</div>
