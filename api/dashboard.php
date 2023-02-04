<?php 

// start a session to store user data
session_start();
session_start();

// Check if the user is logged in and has isAdmin = 1
if (!isset($_SESSION['user']) || !isset($_SESSION['user']['isAdmin']) || $_SESSION['user']['isAdmin'] != 1) {
    header('Location: login.php');
    exit;
}

// check if user is not logged in
if(!isset($_SESSION['user'])){
    header("Location: log_in.php");
}

// include the Model class
include_once 'model.php';
$model = new Model();

// get user data
$user = $model->getUser($_SESSION['user']['username'], $_SESSION['user']['password']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $user['username']; ?></h1>
    <p>This is your dashboard.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
