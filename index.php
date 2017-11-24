<?php

namespace Sphp\Core;

include_once("components/settings.php");

include_once("components/templates/htmlHead.php");
?>
<body class="Site">
  <div class="Site-content">
    <div class="off-canvas position-left" id="offCanvas" data-off-canvas>

      <!-- Close button -->
      <button class="close-button" aria-label="Close menu" type="button" data-close>
        <span aria-hidden="true">&times;</span>
      </button>

      <!-- Menu -->
      <ul class="vertical menu">
        <li><a href="#">Foundation</a></li>
        <li><a href="#">Dot</a></li>
        <li><a href="#">ZURB</a></li>
        <li><a href="#">Com</a></li>
        <li><a href="#">Slash</a></li>
        <li><a href="#">Sites</a></li>
      </ul>

    </div>

    <div class="off-canvas-content" data-off-canvas-content>
      <div class="grid-x expanded top-row">
        <div class="large-3 cell hide-for-medium-down end">
          <div class="logo">
            <img src="components/pics/logo.png" alt="SPHP framework">
          </div>
        </div>
      </div>
      <?php include_once("components/templates/topBar.php"); ?>
      <div class="grid-x stuff">
        <div class="mainContent large-offset-3 small-12 large-9 cell">
          <main>
            <h1>WEB works and other interests of mine</h1>
            <article>
              <h2>... So why did I do it?</h2>
            <p> I could offer a million answers - all false. 
              The truth is that I'm a bad person. But, that's gonna change - I'm going to change. This is the last of that sort of thing. Now I'm cleaning up and I'm moving on, going straight and choosing life. I'm looking forward to it already. I'm gonna be just like you. The job, the family, the fucking big television. The washing machine, the car, the compact disc and electric tin opener, good health, low cholesterol, dental insurance, mortgage, starter home, leisure wear, luggage, three piece suite, DIY, game shows, junk food, children, walks in the park, nine to five, good at golf, washing the car, choice of sweaters, family Christmas, indexed pension, tax exemption, clearing gutters, getting by, looking ahead, the day you die.</p>
          </article>
          </main>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="footer">
  <div class="row columns">
      <ul class="brand-icons zoom rounded"> 
        <li data-sphp-qtip-viewport="#footer" data-sphp-qtip="" data-sphp-qtip-at="top center" data-sphp-qtip-my="bottom center" data-hasqtip="3" oldtitle="Löydät meidät myös Facebookista" title="">
          <a href="https://www.facebook.com/groups/763725060384903/?fref=ts" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </li> 
      </ul>
      <ul class="brand-icons zoom rounded techs"> 
        <li data-sphp-qtip="" data-sphp-qtip-viewport="#footer" data-sphp-qtip-at="top center" data-sphp-qtip-my="bottom center" data-hasqtip="4" oldtitle="CSS3" title="" aria-describedby="qtip-4">
          <a href="https://www.w3.org/Style/CSS/" target="_blank"><i class="fa fa-css3 small" aria-hidden="true"></i></a>
        </li> 
        <li data-sphp-qtip="" data-sphp-qtip-viewport="#footer" data-sphp-qtip-at="top center" data-sphp-qtip-my="bottom center" data-hasqtip="5" oldtitle="HTML5" title="">
          <a href="https://www.w3.org/TR/html5/" target="_blank"><i class="fa fa-html5 small" aria-hidden="true"></i></a>
        </li> 
      </ul>
  </div>
  <div class="copyright">© 2017 Sami Holck</div>
</footer>
<?php

// include_once("components/footer.php");

use Sphp\Html\Apps\BackToTopButton as BackToTopButton;
use Sphp\Html\Document;

/* $backToTopBtn = new BackToTopButton();
  $backToTopBtn
  ->setTitle("Back To Top")
  ->printHtml(); */
Document::html()->enableSPHP()->documentClose();
?>
