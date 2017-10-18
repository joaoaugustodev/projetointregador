<?php

if (isset( $_REQUEST['user']) && isset($_REQUEST['password'])) {
    session_start();
    
    $user = $_REQUEST['user'];
    $pass = $_REQUEST['password'];
    
    
    $db_host = "senacprojeto.database.windows.net";
    $db_name = "PI2";
    $db_user = "senacii";
    $db_pass = "Senac2017";
    $dsn = "Driver={SQL Server};Server=$db_host;Port=1433;Database=$db_name;";
    
    if( !$db = odbc_connect($dsn, $db_user, $db_pass)){
        echo "Erro ao conectar ao BANCO DE DADOS";
        exit();
    }
    
    $stmt = odbc_prepare($db, 'SELECT idUsuario, nomeUsuario FROM Usuario WHERE loginUsuario = ? AND senhaUsuario = ?');
    odbc_execute($stmt, array($user, $pass));
    $usuario = odbc_fetch_array($stmt);
    
    if ($usuario) {
       $_SESSION['user'] = $user;
       header('Location: ./view/');
    } else {
        $msg = 'true';
    }
    
} else {
    echo '';
}