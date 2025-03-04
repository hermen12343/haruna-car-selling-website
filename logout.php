<?php
session_start(); 

$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the login page (or homepage)
header("Location: index.php");
exit();
?>