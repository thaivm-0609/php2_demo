<?php
// include_once 'app/models/Student.php';
// include_once 'app/controllers/BaseController.php';
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Student;

class StudentController extends BaseController {
    protected $studentModel;

    public function __construct() {
        $this->studentModel = new Student();
    }

    public function getStudent() {
        $students = $this->studentModel->getListStudent();
        return $this->render('students.index',compact('students'));
    }

    public function create() {
        return $this->render('students.create');
    }

    public function store() {
        if (isset($_POST['create'])) {
            $errors = [];

            $name = $_POST['name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];

            if (empty($name)) {
                $errors[] = 'Tên không được bỏ trống';
            }

            if (empty($email)) {
                $errors[] = 'Email không được bỏ trống';
            }
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Email không đúng định dạng';
            }

            if (count($errors) > 0) {
                redirect('errors', $errors, 'create');
            } else {
                $student = $this->studentModel->storeStudent($name,$email,$gender);
                redirect('success', 'Thêm mới thành công', '/');    
            }
        }
    }

    public function edit($id) {
        $student = $this->studentModel->getById($id); //lấy ra thằng cần sửa
        
        return $this->render('students.edit',compact('student'));
    }

    public function update($id) {
        if (isset($_POST['update'])) {
            $errors = [];

            $name = $_POST['name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            if (empty($name)) {
                $errors[] = 'Tên không được bỏ trống';
            }

            if (empty($email)) {
                $errors[] = 'Email không được bỏ trống';
            }
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Email không đúng định dạng';
            }

            if (count($errors) > 0) {
                redirect('errors', $errors, 'edit/'.$id);
            } else {
                $this->studentModel->updateStudent($id,$name,$email,$gender);
                redirect('success', 'Cập nhật thành công', '/');
            }
        }
    }

    public function delete($id) {
        $this->studentModel->deleteStudent($id);
        redirect('success', 'Bạn đã xoá thành công', '/');
    }
}
