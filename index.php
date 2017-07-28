<?php

require_once('./TasksController.php');
$c = new TasksController;

if($c->routeIfMethodIsPost()){
	header("Location: http://" . $_SERVER['HTTP_HOST']);
	exit();
}

?>
<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="Wrapper">
			<?php $c->renderCreateForm();  ?>
			<?php $c->renderListOrEmpty(); ?>
		<div>
	</body>
</html>
