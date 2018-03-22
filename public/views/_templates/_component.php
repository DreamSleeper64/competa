<section class="component">
<div class="component-test"></div>
	<?php

	if(empty($_GET['view'])) {
		include getcwd()."/views/default/default.php";
	}
	if(!empty($_GET['view'])) {

		$app = getcwd();
		$view = $_GET['view'];
		include getcwd().'/views/'.$view.'/'.$view.'.php';
	}
 ?>
</section>