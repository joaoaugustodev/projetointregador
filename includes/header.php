<?php   ini_set('odbc.defaultlrl', 90000000); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Gandalf - ADMIN</title>

      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="../public/css/materialize.min.css">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="../public/css/estilo.css">
      <link rel="stylesheet" href="../public/css/estiloadmin.css">
      <link rel="icon" href="../public/images/logo.png">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
	

	<div class="navbar-fixed">
		
      <nav class="white z-depth-1">
		<!-- MENU MOBILE -->
		<div class="">
		
			<a href="#" data-activates="menu-mobile"  class="button-collapse black-text">
				<i class="large material-icons">menu</i>				
				
			</a>
			
			
		</div>	

          <div class="nav-wrapper container">
            <a href="./" class="branch ">
              <img src="../public/images/logo.png" alt="logotipo" width="60">
            </a>
            <ul id="nav-mobile" class="right black-text">
             <div class="menu-search btn-large grey lighten-5 black-text">
			 
			  
                <form action="./produtos.php" method="get">
                  <input id="search" name="nomeBusca" type="text" class="validate" placeholder="BUSCAR PRODUTO">
                </form>
              </div>
            </ul>
          </div>
		  
      </nav>
	  
    </div>
	<ul id="menu-mobile" class="side-nav">
		<li><a href="./"> HOME</a></li>
		<li><a href="./produtos.php">PRODUTOS</a></li>
		<li><a href="./categoria.php">CATEGORIA</a></li>
		<li><a href="./usuarios.php">USUARIOS</a></li>
		<li><a href="./configuracao.php?user=<?= $_SESSION['id'] ?>">CONFIGURAÇÕES</a></li>
		<li><a href="../db/logout.php">SAIR</a></li>
	</ul>			

	<!-- MENU LATERAL -->
    <div class="menuLateral hide-on-med-and-down">
      <nav class="menuLateral__nav">
		
        <ul>
          <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="HOME" href="./"><i class="large material-icons">home</i></a></li>
          <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="PRODUTOS" href="./produtos.php"><i class="large material-icons">add_shopping_cart</i></a></li>
          <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="CATEGORIA" href="./categoria.php"><i class="large material-icons">assignment_late</i></a></li>
          <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="USUARIOS" href="./usuarios.php"><i class="large material-icons">assignment_ind</i></a></li>
          <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="CONFIGURAÇÕES" href="./configuracao.php?user=<?= $_SESSION['id'] ?>"><i class="large material-icons">settings_applications</i></a></li>
          <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="SAIR" href="../db/logout.php"><i class="large material-icons">open_in_new</i></a></li>
        </ul>
      </nav>
    </div>
	<!-- FIM MENU LATERAL -->
			
</body>

<script src="../public/javascript/materialize.js"></script>
	<script>
	
		  $(".button-collapse").sideNav();

	</script>
	
