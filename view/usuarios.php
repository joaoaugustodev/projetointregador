<?php
  include_once('../db/verifysession.php');
  include_once('../includes/header.php');
?>

<br>
<br>

<?php 
	if (isset($_POST['insertUser'])) {
		try {
			$nome = $_POST['nome'];
			$login = $_POST['login'];
			$senha = $_POST['senha'];
			$tipo = $_POST['tipo'];
			$ativo = $_POST['ativo'];

			$stmt = odbc_prepare($db, "INSERT INTO Usuario(loginUsuario, senhaUsuario, nomeUsuario, tipoPerfil, usuarioAtivo) VALUES('$login', '$senha', '$nome', '$tipo', '$ativo')");

			if(odbc_execute($stmt)){
	        	$msg = 'Cadastrado com sucesso!';
	        }else{
	        	$msg = 'Erro ao cadastrar';
	        }
		} catch (Exception $e) {
			echo $e;
		}
	}
?>

<div class="container">

	<?php include_once('../includes/message.php'); ?>

	<div class="row">
		<div class="col s12 <?= ($_SESSION['nivel'] == 'A') ? 'm6' : 'm12' ?>">
			<h5 class="center">Listagem de Usuarios</h5>
				
			<br>

			<div class="wrap-overflow">
			    <table class="centered striped responsive-table">
				  <thead>
					<tr>
						<th>ID</th>
						<th>LOGIN</th>
						<th>NOME</th>
						<th>EDITAR</th>
						<th>EXCLUIR</th>
					</tr>
				  </thead>

				  <tbody>

					  <?php
						  $result = odbc_exec($db, 'SELECT idUsuario, loginUsuario, nomeUsuario, tipoPerfil FROM Usuario');
						  while($clients = odbc_fetch_array($result)):
					  ?>

					   <tr>
						  <td><?= $clients['idUsuario']; ?></td>
						  <td><?= $clients['loginUsuario']; ?></td>
						  <td><?= $clients['nomeUsuario']; ?></td>

						  <?php if ($_SESSION['nivel'] == 'A'): ?>
						  	<?php $idUser = $clients['idUsuario']; ?>
						  	<td>
						  		<?= 
						  			($clients['idUsuario'] > 1 )? "<a href='./editar.php?editarUser=$idUser'><i class='material-icons'>create</i></a>" : "" 
						  		?>
						  	</td>
						  	<td>
						  		<?= 
						  			($clients['idUsuario'] > 1 )? "<a href='./editar.php?excluirUser=$idUser'><i class='material-icons'>delete_forever</i></a>" : "" 
						  		?>
						  	</td>
						  <?php endif; ?>
					  </tr>

					  <?php endwhile; ?>
				  </tbody>
			    </table>
		    </div>
		</div>
		
		<?php if ($_SESSION['nivel'] == 'A'): ?>
			<h5 class="center">Cadastrar</h5>

			<br>

			<div class="col s12 m6">
			  <div class="row">
			    <form class="col s12" method="post">
			      <div class="row">
			        <div class="input-field col s6">
			          <input id="first_name" name="nome" type="text" class="validate" required>
			          <label for="first_name">Nome</label>
			        </div>
			        <div class="input-field col s6">
			          <input id="last_name" name="login" type="text" class="validate" required>
			          <label for="last_name">Login</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="password" name="senha" type="text" class="validate" required>
			          <label for="password">Senha</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12 m5">
			          <select name="tipo" class="validate">
			            <option value="A" select>A</option>
			            <option value="B">B</option>
			            <option value="C">C</option>
			          </select>
			          <label for="tipoperfil">Tipo de Perfil</label>
			        </div>
			        <div class="input-field col s12 m6">
			          <select name="ativo" class="validate">
			            <option value="true" select>Ativo</option>
			            <option value="false">Desativo</option>
			          </select>
			          <label for="userActive">Usuario Ativo</label>
			        </div>
			      </div>
				<br>
			      <div class="row">
			      	<button name="insertUser" class="btn">Cadastrar</button>
			      </div>
			    </form>
			  </div>
			</div>
		<?php endif; ?>

	</div>
</div>

<?php include_once('../includes/footer.php') ?>