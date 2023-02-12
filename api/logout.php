<?php
session_start();

// unset specific session data
unset($_SESSION['username']);
unset($_SESSION['isAdmin']);

// or destroy the entire session
session_destroy();

// redirect to another page
header('Location: login.php');
exit;
