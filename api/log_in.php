<?php
    session_start();

    if(isset($_SESSION['user']['username']) && $_SESSION['user']['isAdmin'] = 1){
        header('location: dashboard.php');
    }
    
    if(isset($_POST['submit'])){
        include 'model.php';
        $model = new Model();
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = $model->login($username, $password);
        $user = $data;

        if(isset($user) && !empty($user)){
            $_SESSION['user']['isAdmin'] = $user['isAdmin'];
            $_SESSION['user']['username'] = $user['username'];

            header('location: dashboard.php');
        }else{
            $error = "Incorrect username or password";
        }
    }
?>