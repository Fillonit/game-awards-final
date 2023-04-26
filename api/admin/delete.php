<?php
session_start();

if ($_SESSION['isAdmin'] !== 1) {
    echo "<script>window.location.href = '/api/pages/index.php';</script>";
}
// include '../../api/model/model.php';
require_once(__DIR__ . '/../model/model.php');
$model = new Model();
$id = $_REQUEST['id'];
$delete = $model->delete($id);

if ($delete) {
    echo "<script>alert('delete successfully');</script>";
    echo "<script>window.location.href = 'dashboard.php';</script>";
}
