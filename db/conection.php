<?php

$db_host = "mybanksenac.database.windows.net";
$db_name = "mybank";
$db_user = "joaosenac2017";
$db_pass = "02Jesuina";
$dsn = "Driver={SQL Server};Server=$db_host;Port=1433;Database=$db_name;";

if ( !$db = odbc_connect($dsn, $db_user, $db_pass)) {
    echo "Erro ao conectar ao BANCO DE DADOS";
    die();
}
