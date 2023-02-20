<?php
session_start();

include '../../api/model/model.php';
$model = new Model();
$id = $_REQUEST['id'];

if ($_SESSION['isAdmin'] !== 1 ) {
    echo "<script>window.location.href = '/api/admin/contactDashboard.php';</script>";
}
$delete = $model->deleteContactMessage($id);

if ($delete) {
    echo "<script>alert('delete successfully');</script>";
    echo "<script>window.location.href = '/api/admin/contactDashboard.php';</script>";
}
