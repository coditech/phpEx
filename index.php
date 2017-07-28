i<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php
			print_r($_POST)
		?>
		<div id="Wrapper">
			<ul>
				<li>
					<form method="post">
						<input type="checkbox" name="done" id="task"/>
						<label for="task">This is a task</label>
						<input type="hidden" name="id" value="a"/>
						<input type="submit" name="ok" value="ok">
						<input type="submit" name="delete" value="delete">
					</form>
				</li>
			</ul>
		<div>
	</body>
</html>
