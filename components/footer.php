<?php

namespace sph\html\foundation;

use sph\html\MouseCoordinatesViewer as MouseCoordinatesViewer;
use sph\html\ViewportSizeViewer as ViewportSizeViewer;
use sph\html\TechLinkList as TechLinkList;
?>
<!-- Start footer -->
<div class="sphSticky">
	<footer>
		<div class="sph-row hide-for-print">
			<div class="small-12 columns">
				<div class="panel flap radius">

					<?php include_once("footerLinks.php"); ?>
					<div class="sph-row " style="border-top: 1px solid #666;">
						<div class="column small 12 large-4">
							<?php (new MouseCoordinatesViewer())->setStyle("display", "inline-block")->printHtml() ?>
							<?php (new ViewportSizeViewer())->setStyle("display", "inline-block")->printHtml() ?>
						</div>
						<div class="column large-4 hide-for-large-down text-center">
							<a class="browser" href="https://www.google.com/intl/en/chrome/browser/" title="Google Chrome browser"
							   target="_blank"><img src="sph/pics/chrome.png" alt="Google Chrome browser"></a>
							<a class="browser" href="http://www.mozilla.org/en-US/firefox/all/" title="Firefox browser"
							   target="_blank"><img src="sph/pics/firefox.png" alt="Firefox browser"></a>
							<a class="browser" href="http://windows.microsoft.com/en-us/internet-explorer/download-ie" title="Internet Explorer browser"
							   target="_blank"><img src="sph/pics/ie.png" alt="Internet Explorer browser"></a>
							<a class="browser" href="http://www.opera.com/" title="Opera browser"
							   target="_blank"><img src="sph/pics/opera.png" alt="Opera browser"></a>
							<a class="browser" href="http://www.apple.com/safari/" title="Safari browser"
							   target="_blank"><img src="sph/pics/safari.png" alt="Safari browser"></a>
						</div>
						<div class="column small-12 large-4 hide-for-large-down">
							<?php (new TechLinkList())->setStyle("float", "right")->printHtml() ?>
						</div>
					</div>
					<div class="sph-row">
						<div class="column small-12 copyright text-center">
							Copyright &copy; 2007-<?php echo date("Y"); ?> Sami Holck. All rights reserved. ||
							<b>Script executed in:</b> <i><?php echo \sph\tools\Timer::getEcecutionTime(3) ?> seconds</i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>
<!-- End footer -->