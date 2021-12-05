<?php
 $server = 'localhost';
 $username = 'root';
 $password = 'PelusaPerlita97';
 $database = 'registro';


 try {
     $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
 } catch (PDOException $e){
    die('Conexión fallida: '.$e->getMessage());
 }
?>