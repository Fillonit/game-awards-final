<?php 
    include 'model.php';
    $model = new Model();
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $login = $model->login($username, $password);
 
    if (!$login) {
        echo_json({
            error: true,
            msg: 'Login failed'
        })
    }
 ?>