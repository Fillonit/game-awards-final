<?php
session_start();

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'gameawards';
$conn;
$data = mysqli_connect($server, $username, $password, $database);

if ($data === false) {
    die("connection error");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "' ";

    $result = mysqli_query($data, $sql);

    $row = mysqli_fetch_array($result);


    if ($row["isAdmin"] == 0) {

        $_SESSION["username"] = $username;
        $_SESSION["isAdmin"] = 0;
        echo "<script>window.location.href = '/';</script>";
    } elseif ($row["isAdmin"] == 1) {
        $_SESSION["username"] = $username;
        $_SESSION["isAdmin"] = 1;
        header("location:dashboard.php");
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

    <link rel="shortcut icon" href="../assets/img/nocticon.png" type="image/x-icon">
    <link rel="stylesheet" href="../login.css">
    <!-- <script src="../login.js" defer></script> -->

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
            <form class="form" id="form" method='POST' action="log_in.php">
                <input class="textfield" type="text" name="username" placeholder="Username" onfocus="inputFocus()" id="username" />
                <input class="textfield" type="password" name="password" placeholder="Password" onfocus="inputFocus()" id="password" />
                <p id="error"></p>
                <div class="button-group">
                    <button class="btn login">Login</button>
                    <button class="btn" onclick="exitLogin()">Cancel</button>
                </div><a class="forgot-password" href="?method=forgotPassword">Forgotten your password?</a>
                <hr class="separator" />
                <a class="forgot-password" href="?method=register"><button class="btn" onclick="return register();">Create Account</button></a>
            </form>
        </div>
    </div>
</body>

</html>