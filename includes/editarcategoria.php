<?php 
  if (isset($_POST['editarcat'])) {
    $id = $_POST['editarcategoria'];
    $nome = $_POST['nome'];
    $categoria = $_POST['descCategoria'];

    $stmt = odbc_prepare($db, "UPDATE Categoria SET  nomeCategoria = ?, descCategoria = ? WHERE idCategoria=$id");

    if(odbc_execute($stmt, array($nome, $categoria))){
      $msg = 'Categoria atualizado com sucesso!';
    }else{
      $msg = 'Erro ao atualizar a Categoria';
    }
  }

  $id = $_GET['editarcategoria'];
  $query = odbc_exec($db, "SELECT * FROM Categoria WHERE idCategoria=$id");
  $value = odbc_fetch_array($query);
?>

<?php include_once('../includes/message.php'); ?>

<div class="container">
	<div class="row">
		<div class="col s12 card-panel">
			<h4 class="center">Cadastro de Produto</h4>
		    <form class="col s12 cadastraProduto" method="post" action="">
		      <input type="hidden" name="editarcategoria" value="<?= $value['idCategoria']?>">
		      <div class="row">

		        <div class="input-field col s6">
		          <input name="nome" id="first_name" value="<?= $value['nomeCategoria']?>" type="text" class="validate" required>
		          <label for="first_name">Nome</label>
		        </div>

		        <div class="input-field col s6">
		        <input id="email" type="text" class="validate" value="<?= $value['descCategoria']?>" name="descCategoria" required>
		          <label for="last_name">Descrição</label>
		        </div>

		        <button class="btn cadastra" name="editarcat">Cadastrar</button>
		      </div>
		    </form>
		</div>
	</div>
</div>