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

include 'samiholck/templates/carousels/videos.php';
