<?php
$dsn = 'mysql:host=localhost;dbname=todo_list_mvc_db;charset=utf8'; 
$username = 'root'; 
$password = ''; 

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = "Database Error: " . $e->getMessage();
    include('../view/error.php'); 
    exit();
}
?>
