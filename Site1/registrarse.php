<?php
require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])){
    $sql = "INSERT INTO usuario (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email',$_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password',$password);

    if($stmt->execute()){
        $message = 'Usuario creado correctamente';
    } else{
        $message = 'Ha ocurrido un error al crear su usuario';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>


<?php require 'partials/header.php' ?>

<?php if(!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif; ?>


<h1>Registrarse</h1>
<span>o <a href="inicio_sesion.php">Iniciar Sesión</a></span>
<form action="registrarse.php" method="post">
        <input type="text" name="email" placeholder="Ingrese tu correo" >
        <input type="password" name="password" placeholder="Ingresa tu contraseña">
        <input type="password" name="confirm_password" placeholder="Confirma tu contraseña">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>