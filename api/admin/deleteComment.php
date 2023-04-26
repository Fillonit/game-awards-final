<?php
session_start();

// include '../../api/model/model.php';
require_once(__DIR__ . '/../model/model.php');
$model = new Model();
$id = $_REQUEST['id'];
$gameID = $_REQUEST['gameID'];
$prevURL = '/api/pages/game.php?id='.$gameID;
$validation = $model->validateCommentOwner($id, $_SESSION['username']);

if ($_SESSION['isAdmin'] !== 1 && $validation !== true) {
    echo "<script>window.location.href = '$prevURL';</script>";
}
$delete = $model->deleteComment($id);

if ($delete) {
    echo "<script>alert('delete successfully');</script>";
    echo "<script>window.location.href = '$prevURL';</script>";
}
