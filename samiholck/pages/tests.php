<?php

namespace Sphp\Html\Foundation\Sites\Bars;
?>
<pre>
  <?php

  use Sphp\Log\Console;

$console = new Console();
  $console->addLog('perkele' . "'saaataanaa'");
  $console->run();
  Console::error('error');
  Console::log('log');
  Console::table(range('a', 'e'));

  use Sphp\Html\Media\Icons\Svg;

var_dump(\Sphp\Stdlib\Networks\RemoteResource::getMimeType('http://www.samiholck.com/samiholck/svg/s-logo.php'));
//echo "\n".Svg::fromUrl('http://www.samiholck.com/samiholck/svg/s-logo.php');
//echo "\n".Svg::fromFile('./samiholck/svg/js-logo.svg');
//echo "\n".Svg::fromFile('./samiholck/svg/js-logo.svg');
  var_dump(mime_content_type('./samiholck/svg/js-logo.svg'));
//echo Svg::fromFile('http://www.samiholck.com/samiholck/svg/s-lo3go.php');
//use Sphp\Html\Media\Icons\Svg;
  ?>
</pre>
<div style="width: 150px;">
  <div class="grid-x small-up-2">
    <div class="cell">
      <?php echo Svg::fromFile('samiholck/svg/html5-logo.svg') ?></div>
    <div class="cell">
      <?php echo Svg::fromFile('samiholck/svg/html5-logo.svg') ?></div>
    <div class="cell">
      <?php echo Svg::fromFile('samiholck/svg/html5-logo.svg') ?></div>
    <div class="cell">
      <?php echo Svg::fromFile('samiholck/svg/html5-logo.svg') ?></div>
  </div>
</div>
