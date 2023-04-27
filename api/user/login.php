<?php
session_start();

$server = "db4free.net";
$username = "adminnocturne";
$password = "!es27MiQfAaWb_k";
$database = "gamingawards";
$conn = mysqli_connect($server, $username, $password, $database);

if ($conn === false) {
    die("connection error");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "' ";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {
        if ($row["isAdmin"] == 0) {
            $_SESSION["username"] = $username;
            $_SESSION["userID"] = $row['id'];
            $_SESSION["isAdmin"] = 0;
            header("Location: /api/pages/index.php");
            exit();
        } elseif ($row["isAdmin"] == 1) {
            $_SESSION["username"] = $username;
            $_SESSION["userID"] = $row['id'];
            $_SESSION["isAdmin"] = 1;
            header("Location: /api/admin/dashboard.php");
            exit();
        }
    } else {
        echo "<script>alert('Incorrect username or password');</script>";
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

    <link rel="shortcut icon" href="../../assets/img/nocticon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/login.css">
    <script src="../../assets/js/login.js" defer></script>

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="container">
        <div class="title-bar">
            <div onclick="exitLogin()">&times;</div>
            <div>&#95;</div>
        </div>
        <div class="content">
            <div class="logo"></div>
            <form class="form" id="form" method='POST' action="login.php">
                <input class="textfield" type="text" name="username" placeholder="Username" onfocus="inputFocus()" id="username" />
                <input class="textfield" type="password" name="password" placeholder="Password" onfocus="inputFocus()" id="password" />
                <p id="error"></p>
                <div class="button-group">
                    <button class="btn login" onclick="submitForm();">Login</button>
                    <button class="btn" onclick="exitLogin()">Cancel</button>
                </div><a class="forgot-password" href="?method=forgotPassword">Forgotten your password?</a>
                <hr class="separator" />
                <a class="forgot-password" href="?method=register"><button class="btn" onclick="return register();" type="submit" name="Submit">Create Account</button></a>
            </form>
        </div>
    </div>
    <script>
        function submitForm() {
            document.getElementById("form").action = 'login.php';
            document.getElementById("form").submit();
        }

        function register() {
            document.getElementById("form").action = 'register.php';
            document.getElementById("form").submit();
        }
    </script>
</body>

</html>