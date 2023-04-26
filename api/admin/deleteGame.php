<?php
session_start();

// include '../../api/model/model.php';
require_once(__DIR__ . '/../model/model.php');
$model = new Model();
$id = $_REQUEST['id'];

if ($_SESSION['isAdmin'] !== 1 ) {
    echo "<script>window.location.href = '/api/admin/gameDashboard.php';</script>";
}
$delete = $model->deleteGame($id);

if ($delete) {
    echo "<script>alert('delete successfully');</script>";
    echo "<script>window.location.href = '/api/admin/gameDashboard.php';</script>";
}
