<?php

include('./db/conection.php');

if (isset( $_REQUEST['user']) && isset($_REQUEST['password'])) {
    session_start();
    

    $user = $_REQUEST['user'];
    $pass = $_REQUEST['password'];


    $stmt = odbc_prepare($db, 'SELECT idUsuario, nomeUsuario, tipoPerfil FROM Usuario WHERE loginUsuario = ? AND senhaUsuario = ?');
    odbc_execute($stmt, array($user, $pass));
    $usuario = odbc_fetch_array($stmt);
    
    if ($usuario) {
       $_SESSION['user'] = $user;
       $_SESSION['nivel'] = $usuario['tipoPerfil'];
       header('Location: ./view/');
    } else {
        $msg = 'Login ou senha inválidos!';
    }
}