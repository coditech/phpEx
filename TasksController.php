<?php

require_once('./TaskManager.php');
require_once('./Task.php');

class TasksController{

    public $taskManager;

    public function __construct(){
        $this->taskManager = new TaskManager;
    }

    public function routeIfMethodIsPost(){
        if(!empty($_POST)){
            $action = $_POST['action'];
            $id = $_POST['id'];
            $text = $_POST['text'];
            $done = $_POST['done'];
            $this->route($action,$id,$text,$done);
            return true;
        };
        return false;
    }

    public function route($action,$id,$text,$done){
        $taskManager = $this->taskManager;
        if($action=='edit'){
            $taskManager->edit($id,$text,$done);
        }
        else if($action == 'delete'){
            $taskManager->delete($id);
        }
        else if($action == 'new'){
            $taskManager->create($text,false);
        }
    }

    public function renderEmpty(){
    ?>
        <div>no tasks! why not create some?</div>
    <?php
    }

    public function renderList($list){
        echo "<ul>";
        foreach($list as $task){
            $id = $task['id'];
            $text = $task['text'];
            $done = $task['done'];
            $task = new Task($id,$text,$done);
            $task->render($id,$text,$done);
        }
        echo "</ul>";
    }

    public function renderCreateForm(){
        ?>
        <form method="post">
            <input type="text" name="text" value=""/>
            <input type="hidden" name="action" value="new"/>
            <button class="btn btn-ok"></button>
        </form>
        <?php
    }

    public function renderListOrEmpty(){
        $list = $this->taskManager->get();
        if(!$list){
            $this->renderEmpty();
        }
        else{
            $this->renderList($list);
        }

    }


}

?>
