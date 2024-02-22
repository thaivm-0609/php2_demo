<?php
// require_once 'app/models/BaseModel.php';
namespace App\Models;

use App\Models\BaseModel;

class Student extends BaseModel {
    public function getListStudent() {
        $sql = "select * from students";
        $this->setQuery($sql);
        // return $this->loadAllRows([],$sql);
        return $this->loadAllRows([]);
    }

    public function getById($id) {
        $sql = "SELECT * FROM students WHERE id = ?";
        $this->setQuery($sql);

        return $this->loadRow([$id]);
    }

    public function storeStudent($name,$email,$gender) {
        $sql = "INSERT INTO students (name,email,gender) VALUES (?,?,?)";
        $this->setQuery($sql);

        return $this->execute([$name,$email,$gender]);
    }

    public function updateStudent($id,$name,$email,$gender) {
        $sql = "UPDATE students SET name=?,email=?,gender=? WHERE id = ?";
        $this->setQuery($sql);

        return $this->execute([$name,$email,$gender,$id]);
    }

    public function deleteStudent($id) {
        $sql = "DELETE from students WHERE id = ?";
        $this->setQuery($sql);
        
        return $this->execute([$id]);
    }
}

?>