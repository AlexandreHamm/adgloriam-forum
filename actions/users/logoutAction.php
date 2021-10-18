<?php
session_start();
$_SESSION = [];
session_destroy();
header('Location: ../../login.php');
// header("Refresh:0");