<?php

session_start();

require 'database.php';

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
