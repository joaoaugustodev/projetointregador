<?php
include_once('../db/verifysession.php');


if (isset($_GET['desativaruser'])) {
	$id = $_GET['desativaruser'];
	$stmt = odbc_prepare($db, "UPDATE Usuario SET usuarioAtivo= ? WHERE idUsuario=$id");

	if(odbc_execute($stmt, array('0'))){
	   header('Location: ../db/logout.php');
	}else{
	  $msg = 'Erro ao desativar usuario';
	}
}