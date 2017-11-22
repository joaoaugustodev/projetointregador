<?php
if(isset($_GET['excluircategoria'])){
	 $select = odbc_exec($db, "SELECT * FROM Produto WHERE idCategoria = {$_GET['excluircategoria']}");
	 
	if (odbc_fetch_row($select) == 0) {
		if(odbc_exec($db, "	DELETE FROM  Categoria  WHERE idCategoria = {$_GET['excluircategoria']}")){
		  $msg = 'Categoria removida com sucesso';
		}else{
		  $msg = 'Erro ao excluir o categoria';
		}
	} else {
		$msg = 'Erro ao excluir o produto existe pedido com esse categoria';
	}
}
  


?>