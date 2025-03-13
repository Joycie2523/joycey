<?php

namespace Aries\Dbmodel\Models;

use Aries\Dbmodel\Includes\Database;

class Todo extends Database {
    private $db;

    public function __construct() {
        parent::__construct();
        $this->db = $this->getConnection();
    }

    public function getTodos() {
        $sql = "SELECT * FROM tbl_todo";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTodo($id) {
        $sql = "SELECT * FROM tbl_todo WHERE t_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function createTodo($data) {
        $sql = "INSERT INTO tbl_todo (todo_name) VALUES (:todo_name)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'todo_name' => $data['todo_name'],
        ]);
        return $this->db->lastInsertId();
    }

    public function updateTodo($data) {
        $sql = "UPDATE tbl_todo SET todo_name = :todo_name WHERE t_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'id' => $data['id'],
            'todo_name' => $data['todo_name'],
        ]);
        return "Record UPDATED successfully";
    }

    public function deleteTodo($id) {
        $sql = "DELETE FROM tbl_todo WHERE t_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        return "Record DELETED successfully";
    }   
}

?>

