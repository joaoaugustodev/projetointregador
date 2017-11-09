<?php
  include_once('../db/verifysession.php');
  include_once('../includes/header.php');

  if (isset($_POST['cadastrabtn'])) {
  	$nome = $_POST['nome'];
  	$descricao = $_POST['descCategoria'];

  	$stmt = odbc_prepare($db, "INSERT INTO Categoria(nomeCategoria, descCategoria) VALUES(?, ?)");
      $param = array($nome, descricao);

	if(odbc_execute($stmt, $param)){
	   $msg = 'Categoria cadastrada com sucesso!';
	}else{
	    $msg = 'Erro ao cadastrar a categoria';
	}

  }

 ?>

 <?php include_once('../includes/message.php'); ?>

<div class="container">
	<div class="col s12 m6">
		<div class="row">
			<div class="col s12 m12 card-panel">
				<h5 class="center list-clients">LISTA DE CATEGORIA</h5>
				<div class="wrap-overflow">
					<table class="center striped responsive-table">
						<thead>
						  <tr>
							  <th>ID</th>
							  <th>NOME</th>
							  <th>DESCRIÇÃO</th>
							  <th>EDITAR</th>
							  <th>DELETAR</th>
						  </tr>
						</thead>

						<tbody>
							<?php 
								$query = odbc_exec($db, "SELECT * FROM Categoria");
								
								if (intval(odbc_fetch_row($query)) > 0):
									while ($categoria = odbc_fetch_array($query)):
							?>
							<tr>
								<td><?= utf8_encode($categoria['idCategoria']); ?></td>
								<td><div class="nowrap"><?= utf8_encode($categoria['nomeCategoria']); ?></div></td>
								<td><div class="nowrap"><?= utf8_encode($categoria['descCategoria']); ?></div></td>
								<td><a href="./editar.php?editarcategoria=<?= $categoria['idCategoria'];?>"><i class="material-icons">create</i></a></td>
								<td><a href="?excluircategoria=<?= $categoria['idCategoria'];?>"><i class="material-icons">delete_forever</i></a></td>
							</tr>
							<?php endwhile; ?>
							<?php else: ?>
							<tr>
								<td colspan="5"><span class="center bold">NENHUMA CATEGORIA</span></td>
							</tr>
						<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col s12 card-panel">
				<h4 class="center">Cadastro de Produto</h4>
			    <form class="col s12 cadastraProduto" method="post" action="" enctype="multipart/form-data">
			      <div class="row">

			        <div class="input-field col s6">
			          <input name="nome" id="first_name" type="text" class="validate" required>
			          <label for="first_name">Nome</label>
			        </div>

			        <div class="input-field col s6">
			        <input id="email" type="text" class="validate" name="descCategoria" required>
			          <label for="last_name">Descrição</label>
			        </div>

			        <button class="btn cadastra" name="cadastrabtn">Cadastrar</button>
			      </div>
			    </form>
			</div>
		</div>
	</div>
	</div>
</div>

 <?php include_once('../includes/footer.php'); ?>