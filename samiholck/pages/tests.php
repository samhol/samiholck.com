<?php

namespace Sphp\Html\Foundation\Sites\Bars;
?>
<pre>
<?php
use Sphp\Log\Console;
$console = new Console();
$console->addLog('perkele\''."'saaataanaa'");
$console->run();
Console::error('error');
Console::log('log');
Console::table(range('a', 'e'));
?>
</pre>

