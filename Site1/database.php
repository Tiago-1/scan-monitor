<?php
 $server = 'localhost:3306';
 $username = 'admin';
 $password = 'password';
 $database = 'registro';

 try {
     $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
 } catch (PDOException $e){
    die('Conexión fallida: '.$e->getMessage());
 }
?>