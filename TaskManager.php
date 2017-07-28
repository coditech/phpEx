<?php

class TaskManager{
    public $file_db;

    public function __construct(){
        try {
            $this->file_db = new PDO('sqlite:sample.sqlite3');
        }catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }

        $this->file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->file_db->exec("CREATE TABLE IF NOT EXISTS tasks (id INTEGER PRIMARY KEY, text TEXT, done BOOLEAN)");
    }

    function get(){
	    $list = $this->file_db->query('SELECT * FROM tasks');
	    return $list;
    }

    public function create($text,$done){
        $insert = "INSERT INTO tasks (text, done) VALUES (:text, :done)";
        $stmt = $this->file_db->prepare($insert);
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':done', $done);
        $stmt->execute();
    }

    public function edit($id,$text,$done){
        $update = "UPDATE tasks SET text=:text,  done=:done WHERE id = :id";
        $stmt = $this->file_db->prepare($update);
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':done', $done);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function delete($id){
        $delete = "DELETE FROM tasks WHERE id = :id";
        $stmt = $this->file_db->prepare($delete);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}
