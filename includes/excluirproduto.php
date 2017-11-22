<?php
if(isset($_GET['excluirproduto'])){
  $select = odbc_exec($db, "SELECT * FROM ItemPedido where idPedido = {$_GET['excluirproduto']}");

  if (odbc_fetch_row($select) == 0) {
    if(odbc_exec($db, "	DELETE FROM  Produto  WHERE idProduto = {$_GET['excluirproduto']}")){
      $msg = 'produto removido com sucesso';
    }else{
      $msg = 'Erro ao excluir o produto';
    }
  } else {
    $msg = 'Erro ao excluir a categoria, pois existe um produto cadastro com essa categoria';
  }
}

?>
