<?php

$db_host = "pi2s.database.windows.net";
$db_name = "pi2";
$db_user = "";
$db_pass = "";
$dsn = "Driver={SQL Server};Server=$db_host;Port=1433;Database=$db_name;";

if ( !$db = odbc_connect($dsn, $db_user, $db_pass)) {
    echo "Erro ao conectar ao BANCO DE DADOS";
    die();
}
