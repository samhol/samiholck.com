<?php

namespace Sphp\Html\Foundation\Sites\Navigation;

use Sphp\Html\Foundation\Sites\Bars\TopBar;
use Sphp\Html\Foundation\Sites\Navigation\SubMenu;
use Sphp\Html\Foundation\Sites\Navigation\MenuBuilder;
require_once(__DIR__ . '/../menuArrays.php');
try {
  ob_start();
  $navi = (new TopBar());
$leftDrop = new DropdownMenu();
  $builder = new MenuBuilder();
  $leftDrop->appendSubMenu($builder->buildSub($links));
  $navi->left()->setContent($leftDrop);
  $navi->printHtml();

  $content = ob_get_contents();
} catch (\Exception $e) {
  $content .= new \Sphp\Html\Foundation\F6\Containers\ExceptionCallout($e, true);
}
ob_end_clean();
echo $content;
unset($content);
?>
