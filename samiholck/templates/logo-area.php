<?php

namespace Sphp\Html\Foundation\Sites\Navigation;

use Sphp\Config\Config;

?>
<div class="grid-x full sphp-logo-area">
  <div class="cell small-12 medium-6">
    <ul class="logo">
      <li>
        <a href="<?php echo Config::instance('manual')->get('ROOT_URL') ?>" target="_self" title="Navigate back to frontpage" data-sphp-qtip>
          <img src="resources/img/logo.png" alt="samiholck.com logo">
        </a>
      </li>
    </ul>
  </div>
  <div class="cell small-12 medium-6 icon-col">
    <?php

    use Sphp\Html\Media\Icons\BrandIcons;

$bi = new BrandIcons();
    $bi->setGithub('https://github.com/samhol', 'Gihub repository', 'github');
    $bi->appendFacebook('https://www.facebook.com/sami.holck', 'Facebook page', 'fb');
    $bi->appendGooglePlus('https://plus.google.com/u/0/107385804268206063694', 'Google plus page', 'google');
    $bi->appendTwitter('https://twitter.com/SPHPframework', 'Twitter page', 'twitter');
    $bi->printHtml();
    ?>
  </div>
</div>
