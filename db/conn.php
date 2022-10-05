<?php 
//Development Connections
// $host ='127.0.0.1';
// $db ='attendance_db';
// $user ='root';
// $pass ='';
// $charset ='utf8mb4';

//remote database connections 
$host = 'sql5.freemysqlhosting.net';
$db = 'sql5524234';
$user = 'sql5524234';
$pass = 'kAgG1JhkGD';
$charset ='utf8mb4';



$dsn ="mysql:host=$host;dbname=$db;charset=$charset";

try {
    //code...
    $pdo = new PDO($dsn,$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // echo "Database  connection  established.\n";
} 
catch (PDOException $e) {
    //echo "<h1 class='text-danger'>No Database Found</h1>";
   // echo "Error: " . $e->getMessage();
     throw new PDOException($e->getMessage());
}

require_once 'crud.php';
require_once 'user.php';
$crud = new crud($pdo);
$user = new user($pdo);
$user->insertUser("admin","password");

?>