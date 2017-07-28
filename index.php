<?php

function taskTemplate($id,$text){
?>
	<li>
		<form method="post">
			<input type="checkbox" name="done" id="task"/>
			<label for="task"><?php echo $text?></label>
			<input type="hidden" name="id" value="<?php echo $id ?>"/>
			<input type="hidden" name="action" value="edit"/>
			<input type="submit" name="ok" value="ok">
		</form>
		<form method="post">
			<input type="hidden" name="id" value="<?php echo $id ?>"/>
			<input type="hidden" name="action" value="delete"/>
			<input type="submit" name="delete" value="delete">
		</form>
	</li>
<?php
}

?>
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
				<?php taskTemplate(1,"hello"); ?>
				<?php taskTemplate(2,"helli"); ?>
			</ul>
		<div>
	</body>
</html>
