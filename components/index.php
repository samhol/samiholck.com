<?php

namespace sph\html;

//error_reporting(E_ALL);
//ini_set("display_errors", "1");
include_once("../sph/settings.php");
include_once(\sph\PDO_SESSIONING);
include_once("htmlHead.php");
?>
<body>
	<div class="page-wrap">
		<div class="fixed top-bar-container">
			<?php include_once("topNavi.php"); ?>
		</div>
		<div class="sph-row">
			<div class="small-12 column">
				<div class="sph-row">
					<div class="large-3 column hide-for-medium-down">
						<div class="logo text-center">
							<img src="components/pics/logo.png" alt="">
						</div>
						<nav>
							<?php include_once "sidenav.php"; ?>
						</nav>
					</div>
					<div class="mainContent small-12 large-9 column">
						<div class="manpage">
							<?php include_once("manualBuilder.php"); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php (new BackToTopButton())->printHtml();
	?>
	<?php include_once("footer.php"); ?>
</body>
</html>