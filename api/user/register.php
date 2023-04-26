<?php
// include '../../api/model/model.php';
require_once(__DIR__ . '/../model/model.php');
$model = new Model();
$username = $_POST['username'];
$password = $_POST['password'];

$userExists = $model->userExists($username);
if ($userExists) {
    echo '<script>alert("A user with that username already exists")</script>';
    echo "<script>window.location.href = '/api/pages/index.php';</script>";
    return;
} else {
    $insert = $model->insert();
}