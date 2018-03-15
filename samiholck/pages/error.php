<?php

namespace Sphp\Manual;

use Sphp\Html\Foundation\Sites\Media\ResponsiveEmbed;

md(<<<TEXT

<h1 class="error-404">404 <small>Error</small></h1>
Take me back to samiholck.com

TEXT
);

$video1 = ResponsiveEmbed::youtube('GY8PkikQ8ZE')->setAspectRatio('widescreen');
echo $video1;
