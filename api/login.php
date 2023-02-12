<?php 
    include 'model.php';
    $model = new Model();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = $model->login($username, $password);
 
    if ($login) {
        echo ($login);
    }
 ?>