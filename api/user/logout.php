<?php
session_start();

unset($_SESSION['username']);
unset($_SESSION['isAdmin']);
unset($_SESSION['userID']);

session_unset();
session_destroy();

header('Location: login.php');
exit;
