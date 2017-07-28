<?php

function taskTemplate($id,$text){
?>
	<li class="task">
		<form method="post">
			<input type="checkbox" name="done" id="task"/>
			<input type="text" name="text" value="<?php echo $text?>"/>
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

function route($action,$id,$text,$done){
	if($action=='edit'){
		echo "action is edit and id is $id, done is $done and text is $text";
	}
	else if($action == 'delete'){
		echo "action is delete and id is $id";
	}
	else if($action == 'new'){
		echo "action is new and text is $text";
	}
};

if(!empty($_POST)){
	$action = $_POST['action'];
	$id = $_POST['id'];
	$text = $_POST['text'];
	$done = $_POST['done'];
	route($action,$id,$text,$done);
};

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
