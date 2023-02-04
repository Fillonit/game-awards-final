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
            $_SESSION['user']['isAdmin'] = $user['user']['isAdmin'];
            $_SESSION['user']['username'] = $user['user']['username'];

            header('location: dashboard.php');
        }else{
            $error = "Incorrect username or password";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php
        if(isset($error)){
            echo "<p style='color:red'>".$error."</p>";
        }
    ?>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
