<?php

class Task{
    public $id;
    public $text;
    public $done;

    public function __construct($id,$text,$done=false){
        $this->id = $id;
        $this->text = $text;
        $this->done = $done;
    }

    public function render(){
        $id = $this->id;
        $text = $this->text;
        $done = $this->done;
    ?>
        <li class="task">
            <form method="post">
                <input type="checkbox" name="done" id="task_<?php echo $id?>" <?php if($done){echo 'checked="checked"';}; ?>/>
                <label for="task_<?php echo $id?>"></label>
                <input type="text" name="text" value="<?php echo $text?>"/>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
                <input type="hidden" name="action" value="edit"/>
                <button class="btn btn-ok"></button>
            </form>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
                <input type="hidden" name="action" value="delete"/>
                <button class="btn btn-delete"></button>
            </form>
        </li>
    <?php
    }

}

?>
