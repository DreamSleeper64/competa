<?php include "../goo/autoloader.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Competa</title>
	<link rel="stylesheet" href="css/main.css" />
</head>
<body>
<?php include "views/_templates/_nav.php" ?>
<?php include "views/_templates/_component.php" ?>
<?php include "views/_templates/_footer.php" ?>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript">
	let x = document.querySelector('.request-form__input')[0];
	console.log(x);
	x.addEventListener('click', function() {
		alert('ehm');

	});

</script>
</body>
</html>