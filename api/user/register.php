<?php
    include '../../api/model/model.php';
    $model = new Model();
    $insert = $model->insert();

    $type = $_POST['type'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $array = array(
        "type" => $type,
        "username" => $username,
        "password" => $password
    );
    echo json_encode($array);