<?php 
include_once('../includes/header.php');
include_once('../db/verifysession.php');
$iduser = $_GET['user'];
?>

<div class="container profile">
	<div class="row profile__row">
		<div class="col s12 card-panel profile__content">
			<div class="col s12  yellow darken-1 profile__atention">
				<p class="bold center">ATENÇÃO! OS DADOS APRENSENTADOS SÃO DO USUARIO LOGADO QUE POR DECISÃO PRÓPRIA PODE DESATIVAR A CONTA.</p>
				<span title="fechar" class="bold close">&times;</span>
			</div>

			<div class="col s12 m4">
				<figure class="profile__bgProfile">
					<img src="../public/images/ddfds.jpg">
				</figure>
			</div>

			<div class="col s12 m6">
				<?php
				  $result = odbc_exec($db, "SELECT idUsuario, loginUsuario, nomeUsuario, tipoPerfil FROM Usuario WHERE idUsuario=$iduser");
				  $me = odbc_fetch_array($result);
				?>
				
				<div class="profile__desc">
					<div>
						<b>NOME:</b>
						<p><?= $me['nomeUsuario'] ?></p>
					</div>
					<div>
						<b>LOGIN:</b>
						<p><?= $me['loginUsuario'] ?></p>
					</div>
					<div>
						<b>Tipo de Perfil:</b>
						<p><?= $me['tipoPerfil'] ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	document.querySelector('.close').addEventListener('click', function () {
		this.parentNode.style.opacity = 0

		setTimeout(() => {
			this.parentNode.remove()
		}, 600)
	})
</script>

<?php include_once('../includes/footer.php'); ?>