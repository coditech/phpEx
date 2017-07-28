i<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php
			print_r($_POST)
		?>
		<div id="Wrapper">
			<form method="post">
				<input type="text" name="text" value=""/>
				<input type="hidden" name="action" value="new"/>
				<input type="submit" name="ok" value="ok"/>
			</form>
			<ul>
				<li>
					<form method="post">
						<input type="checkbox" name="done" id="task"/>
						<label for="task">This is a task</label>
						<input type="hidden" name="id" value="a"/>
						<input type="hidden" name="action" value="edit"/>
						<input type="submit" name="ok" value="ok">
					</form>
					<form method="post">
						<input type="hidden" name="id" value="a"/>
						<input type="hidden" name="action" value="delete"/>
						<input type="submit" name="delete" value="delete">
					</form>
				</li>
			</ul>
		<div>
	</body>
</html>
