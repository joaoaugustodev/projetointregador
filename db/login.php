<?php

include('./db/conection.php');

if (isset( $_REQUEST['user']) && isset($_REQUEST['password'])) {
    session_start();
    

    $user = $_REQUEST['user'];
    $pass = $_REQUEST['password'];


    $stmt = odbc_prepare($db, 'SELECT idUsuario, nomeUsuario, tipoPerfil, usuarioAtivo FROM Usuario WHERE loginUsuario = ? AND senhaUsuario = ?');
    odbc_execute($stmt, array($user, $pass));
    $usuario = odbc_fetch_array($stmt);
    
    if ($usuario && $usuario['usuarioAtivo'] == '1') {
       $_SESSION['user'] = $user;
       $_SESSION['nivel'] = $usuario['tipoPerfil'];
       $_SESSION['id'] = $usuario['idUsuario'];
       header('Location: ./view/');
    } else {
        $msg = 'Login / senha inválidos ou usuario inativo!';
    }
}