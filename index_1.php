<?php

namespace Sphp\Core;

include_once("components/settings.php");

include_once("components/templates/htmlHead.php");
?>
<body>
  <div class="page-wrap">
    <?php include_once("components/templates/topBar.php"); ?>
    <div class="row">
      <div class="small-12 column">
        <div class="row">
          <div class="large-3 column hide-for-medium-down">
            <div class="logo text-center">
              <img src="components/pics/logo.png" alt="SPHP framework">
            </div>
            <nav>
              <?php //include_once("components/sidenav.php"); ?>
            </nav>
          </div>
          <div class="mainContent small-12 large-9 column">
            <div class="manpage">
              <h2>WEB works and other interests of mine</h2>

              <p>... So why did I do it? I could offer a million answers - all false. The truth is that I'm a bad person. But, that's gonna change - I'm going to change. This is the last of that sort of thing. Now I'm cleaning up and I'm moving on, going straight and choosing life. I'm looking forward to it already. I'm gonna be just like you. The job, the family, the fucking big television. The washing machine, the car, the compact disc and electric tin opener, good health, low cholesterol, dental insurance, mortgage, starter home, leisure wear, luggage, three piece suite, DIY, game shows, junk food, children, walks in the park, nine to five, good at golf, washing the car, choice of sweaters, family Christmas, indexed pension, tax exemption, clearing gutters, getting by, looking ahead, the day you die.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
 // include_once("components/footer.php");

  use Sphp\Html\Apps\BackToTopButton as BackToTopButton;

$backToTopBtn = new BackToTopButton();
  $backToTopBtn
          ->setTitle("Back To Top")
          ->printHtml();
  $html->documentClose();
  ?>
  
