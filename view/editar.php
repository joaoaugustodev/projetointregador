<?php
header('Content-Type: text/html; charset=utf-8');

include_once('../includes/header.php');
include_once('../db/verifysession.php');

if (isset($_GET['editarClient'])) {
  include_once('../includes/editarcliente.php');
}

if (isset($_GET['editarproduto'])) {
  include_once('../includes/editarproduto.php');
}

if (isset($_GET['editarUser'])) {
  include_once('../includes/editarusuario.php');
}
?>


<?php include_once('../includes/footer.php') ?>
