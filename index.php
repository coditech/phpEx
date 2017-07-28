<?php

try {
	$file_db = new PDO('sqlite:sample.sqlite3');
}catch(PDOException $e) {
	echo $e->getMessage();
	die();
}

$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$file_db->exec("CREATE TABLE IF NOT EXISTS tasks (id INTEGER PRIMARY KEY, text TEXT, done BOOLEAN)");

function createTask($file_db,$text,$done){
	$insert = "INSERT INTO tasks (text, done) VALUES (:text, :done)";
	$stmt = $file_db->prepare($insert);
	$stmt->bindParam(':text', $text);
	$stmt->bindParam(':done', $done);
	$stmt->execute();
}

function getTasks($file_db){
	$list = $file_db->query('SELECT * FROM tasks');
	return $list;
}

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

function noTasksTemplate(){
?>
	<div>no tasks! why not create some?</div>
<?php
}

function route($file_db,$action,$id,$text,$done){
	if($action=='edit'){
		echo "action is edit and id is $id, done is $done and text is $text";
	}
	else if($action == 'delete'){
		echo "action is delete and id is $id";
	}
	else if($action == 'new'){
		echo "action is new and text is $text";
		createTask($file_db,$text,false);
	}
};

if(!empty($_POST)){
	$action = $_POST['action'];
	$id = $_POST['id'];
	$text = $_POST['text'];
	$done = $_POST['done'];
	route($file_db,$action,$id,$text,$done);
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
					$list = getTasks($file_db);
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
