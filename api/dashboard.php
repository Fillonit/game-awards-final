<?php 

// start a session to store user data
session_start();

// check if user is not logged in
if(!isset($_SESSION['user_id'])){
    header("Location: log_in.php");
}

// include the Model class
include_once 'model.php';
$model = new Model();

// get user data
$user = $model->getUser($_SESSION['user_id']);

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
