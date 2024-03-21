<?php
$dsn = "mysql:host=10.66.67.213;port=3306;dbname=dhzb";
 try {
 $pdo = @new PDO($dsn, 'root', 'j6b51228');
 }
 catch (PDOException $e) {  echo 'Connection failed: ' . $e->getMessage();
 }
?>
