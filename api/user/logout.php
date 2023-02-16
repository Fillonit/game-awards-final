<?php
session_start();

unset($_SESSION['username']);
unset($_SESSION['isAdmin']);

session_destroy();

header('Location: login.php');
exit;
