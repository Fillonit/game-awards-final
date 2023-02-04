<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


include 'model.php';
$model = new Model();

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $response = $model->login($username, $password);
    if ($response == "Incorrect username or password.") {
        echo $response;
    } else {
        $user_data = json_decode("" . $response, true);
        if (isset($user_data)) {
            session_start();
            $_SESSION["user_data"] = $user_data;
            header("Location: index.php");
        } else {
            echo "Incorrect username or password.";
        }
    }
} else {
    echo "Please enter a username and password.";
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
