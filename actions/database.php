<?php
if(!isset($_SESSION)) {
    session_start();
}
try{
    $db = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
}catch(Exception $e){
    die('Error ' . $e->getMessage());
}
