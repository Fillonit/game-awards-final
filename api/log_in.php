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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noctus - Game Reviews & Awards</title>

    <link rel="shortcut icon" href="assets/img/nocticon.png" type="image/x-icon">
    <link rel="stylesheet" href="../login.css">
    <script src="../login.js" defer></script>

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    <style>
        body {
            height: 100vh;
            width: 100%;
            overflow: hidden;

            background-color: #131313;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            box-shadow: rgba(0, 0, 0, 0.3) 2px 2px 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title-bar">
            <div onclick="exitLogin()">&times;</div>
            <div>&#95;</div>
        </div>
        <div class="content">
            <div class="logo"></div>
            <form class="form" id="form">
                <input class="textfield" type="text" name="username" placeholder="Username" onfocus="inputFocus()"
                    id="username" />
                <input class="textfield" type="password" name="password" placeholder="Password" onfocus="inputFocus()"
                    id="password" />
                <p id="error"></p>
                <div class="button-group">
                    <button class="btn login">Login</button>
                    <button class="btn" onclick="exitLogin()">Cancel</button>
                </div><a class="forgot-password" href="?method=forgotPassword">Forgotten your password?</a>
                <hr class="separator" />
                <a class="forgot-password" href="?method=register"><button class="btn"
                        onclick="return register();">Create Account</button></a>
            </form>
        </div>
    </div>
</body>

</html>