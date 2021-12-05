<?php

session_start();

require 'database.php';
require 'log.php';

logInfo("dsd");
if(isset($_SESSION['usuario_id'])){
    $records = $conn->prepare('SELECT id, email, password FROM usuario WHERE id =:id');
    $records->bindParam(':id',$_SESSION['usuario_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if(count($results) > 0) {
        $user = $results;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)):  ?>
    <br>Bienvenido. <?= $user['email'] ?>
    <br>Estas satisfactoriamente ingresado a la página
    <a href="cerrar_sesion.php">Cerrar Sesión</a>
    <?php else:  ?>
   
    <h1>Por favor, Registrate o Inicia Sesión</h1>

    <a href="inicio_sesion.php">Iniciar Sesión</a> o 
    <a href="registrarse.php">Registrarse</a>
    <?php endif; ?>
</body>
</html>