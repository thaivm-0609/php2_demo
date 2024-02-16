<?php
include_once 'app/models/Student.php';
include_once 'app/controllers/BaseController.php';
function getStudent() {
    $students = getListStudent();
    return render('students.index',compact('students'));
}