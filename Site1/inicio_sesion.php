<?php

session_start();

require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])){
  $records = $conn->prepare('SELECT id, email, password FROM usuario WHERE email=:email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if(count($results) > 0 && password_verify($_POST['password'], $results['password'])){
    $_SESSION['usuario_id'] = $results['id'];
    header('Location: pagina_inicio.php');
  } else{
      $message = 'Lo siento, los datos no coinciden';
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>



<?php require 'partials/header.php' ?>

    <h1>Iniciar Sesión</h1>
    <span>o <a href="registrarse.php">Registrarse</a></span>
    
    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
        <?php endif; ?>
    
    <form action="inicio_sesion.php" method="post">
        <input type="text" name="email" placeholder="Ingrese tu correo" >
        <input type="password" name="password" placeholder="Ingresa tu contraseña">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>