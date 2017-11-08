<?php
header('Content-Type: text/html; charset=utf-8');

include_once('../includes/header.php');
include_once('../db/verifysession.php');

$paramsValue = array('editarClient', 'editarproduto');


if (in_array('editarClient', $paramsValue) && isset($_GET['editarClient'])) {
  include_once('../includes/editarcliente.php');
}

if (in_array('editarproduto', $paramsValue) &&  isset($_GET['editarproduto'])) {
  include_once('../includes/editarproduto.php');
}


?>


<?php include_once('../includes/footer.php') ?>
