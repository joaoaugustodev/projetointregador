<?php 
include_once('../includes/header.php');
include_once('../db/verifysession.php');
$iduser = $_GET['user'];

if (isset($_POST['profileimage'])) {
	$arquivo_tmp = $_FILES[ 'profile-inp' ][ 'tmp_name' ];
    $nome = $_FILES[ 'profile-inp' ][ 'name' ];

    $extensao = pathinfo( $nome, PATHINFO_EXTENSION );
    $novonome = 'profile'.$iduser.'.'.$extensao;
    $destino = '../public/images/'.$novonome;

    move_uploaded_file($arquivo_tmp, $destino);
}

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
					<img src="../public/images/profile<?= $iduser; ?>.jpg" id="image-profile" width="100%" height="100%">
					<span class="white-text icon-bg"><i class="material-icons">portrait</i></span>
					<form action="" class="form-bg" method="post" enctype="multipart/form-data">
						<input name="profile-inp" type="file" id="profile-input" accept=".jpg" title="Escolha uma imagem para o seu perfil">
						<input type="hidden" name="profileimage">
					</form>
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

				<a href="./desativar.php?desativaruser=<?= $iduser ?>" class="btn profile__desativa">Desativar conta</a>
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

	window['profile-input'].addEventListener('change', function (e) {
		const reader = new FileReader()
		const confirmer = confirm('Você tem certeza?')

		if (confirmer) {

	      reader.onload = function(){
	        var dataURL = reader.result
	        var output = window['image-profile']
	        output.src = dataURL

	        setTimeout(function () {
	        	document.querySelector('.form-bg').submit()
	        }, 350)
	      }

	      reader.readAsDataURL(e.target.files[0])
	    }
	})
</script>
