<?php

namespace Sphp\Html\Foundation\Sites\Navigation;

error_reporting(E_ALL);
ini_set("display_errors", "1"); 

require_once('samiholck/settings.php');

$redirect = filter_input(INPUT_SERVER, 'REDIRECT_URL', FILTER_SANITIZE_URL);

$cacheSuffix = str_replace(['.', '/'], ['-', ''], $redirect) . "-cache";

if ($outputCache->start("$cacheSuffix-head") === false) {
  require_once('samiholck/templates/blocks/head.php');
  $outputCache->end();
}
?>
<?php
if ($outputCache->start("$cacheSuffix-topbar") === false) {
  include('samiholck/templates/logo-area.php');
  include('samiholck/templates/menus/topBar.php');
  $outputCache->end();
}
?>
<div class="grid-container">
  <div class="grid-x grid-margin-x grid-padding-x medium-margin-uncollapse">

    <div class="mainContent small-auto cell"> 
      <main class="container">
        <?php
        $man_cache = "$cacheSuffix-content";
        if ($outputCache->start($man_cache) === false) {
          $router->execute();
          $outputCache->end();
        }
        ?>
      </main>
    </div>
  </div>
</div>
<?php
if ($outputCache->start('footer') === false) {
  include('samiholck/templates/blocks/footer.php');
  include('samiholck/templates/backToTopButton.php');
  $outputCache->end();
}
?>
</div>
<?php
$html->documentClose();

