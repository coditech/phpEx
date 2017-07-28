<?php

require_once('./TaskManager.php');

$taskManager = new TaskManager;

function taskTemplate($id,$text,$done){
?>
	<li class="task">
		<form method="post">
			<input type="checkbox" name="done" id="task" <?php if($done){echo 'checked="checked"';}; ?>/>
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

function noTasksTemplate(){
?>
	<div>no tasks! why not create some?</div>
<?php
}

function route($taskManager,$action,$id,$text,$done){
	if($action=='edit'){
		$taskManager->edit($id,$text,$done);
	}
	else if($action == 'delete'){
		$taskManager->delete($id);
	}
	else if($action == 'new'){
		$taskManager->create($text,false);
	}
};

if(!empty($_POST)){
	$action = $_POST['action'];
	$id = $_POST['id'];
	$text = $_POST['text'];
	$done = $_POST['done'];
	route($taskManager,$action,$id,$text,$done);
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
				<?php
					$list = $taskManager->get();
					if(!$list){
						noTasksTemplate();
					}
					else{
						foreach($list as $task){
							$id = $task['id'];
							$text = $task['text'];
							$done = $task['done'];
							taskTemplate($id,$text,$done);
						}
					}
				?>
			</ul>
		<div>
	</body>
</html>
