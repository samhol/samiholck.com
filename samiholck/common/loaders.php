<?php

namespace Sphp\MVC;

use Sphp\Html\Foundation\Sites\Containers\ThrowableCallout;

require_once('manual_helper_functions.php');

$loadPage = function ($par, string $file = 'index') {
  //var_dump(func_get_args());
  try {
    ob_start();
    $page = "samiholck/pages/$file.php";
    if (is_file($page)) {
      $class = $file;
      include $page;
      include 'samiholck/templates/menus/siteNav.php';
    } else {
      $class = 'error';
      include "samiholck/pages/error.php";
    }
    $content = ob_get_contents();
  } catch (\Throwable $e) {
    $content .= (new ThrowableCallout($e))->showInitialFile()->showTrace();
  } catch (\Exception $e) {
    $content .= (new ThrowableCallout($e))->showInitialFile()->showTrace();
  }
  ob_end_clean();
  echo "<main class=\"container $class\">$content</main>";
};

$loadNotFound = function () {
  include "samiholck/pages/error.php";
};
$loadIndex = function () use ($loadPage) {
  $loadPage('index');
};

$router = (new Router())
        ->setDefaultRoute($loadNotFound)
        ->route('/', $loadIndex)
        ->route('/index.php', $loadIndex, 10)
        ->route('/<!category>', $loadPage, 9);
