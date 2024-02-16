<?php
require_once 'app/models/BaseModel.php';
function getListStudent() {
    $sql = "select * from students";
    return loadAllRows([],$sql);
}
?>