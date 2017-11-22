<?php
if(isset($_GET['excluircategoria'])){

    if(odbc_exec($db, "	DELETE FROM  Categoria  WHERE idCategoria = {$_GET['excluircategoria']}")){
      $msg = 'Categoria removida com sucesso';
    }else{
      $msg = 'Erro ao excluir o categoria';
    }
}
  


?>