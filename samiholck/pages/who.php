<?php

namespace Sphp\Manual;

$birth = new \DateTime('1975-09-16 00:25 EET');
$now = new \DateTime();
$age = $now->diff($birth);

md(<<<MD
#WHO AM I? <small>...and does it matter?</small>

I am a $age->y years $age->m months and $age->d days old Finnish man... 
<hr>
MD
);

namespace Sphp\Html\Foundation\Sites\Media;

use Sphp\Html\Foundation\Sites\Grids\BlockGrid;
use Sphp\Html\Foundation\Sites\Media\ResponsiveEmbed;

$video1 = ResponsiveEmbed::youtube('u0eJRXOOikg')->setAspectRatio('widescreen')->setLazy();
$video2 = ResponsiveEmbed::youtube('wng6c0oLkQE')->setAspectRatio('widescreen')->setLazy();
$video3 = ResponsiveEmbed::youtube('QmOT6-MfK14')->setAspectRatio('widescreen')->setLazy();
$video4 = ResponsiveEmbed::youtube('0NbBjNiw4tk')->setAspectRatio('widescreen')->setLazy();
$grid = new BlockGrid('small-up-1', 'medium-up-2', 'large-up-3');
$grid->append($video1);
$grid->append($video2);
$grid->append($video3);
$grid->append($video4);

echo "$grid\n<hr>";
