<?php
session_start();

include 'model.php';
$model = new Model();

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = json_decode($model->login($username, $password), true);
    
    if(isset($user)) {
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
    } else {
        echo "Incorrect username or password.";
    }
}

?>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
