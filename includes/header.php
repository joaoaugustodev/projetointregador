<!DOCTYPE html>
<html lang="pt-br">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>GStore - ADMIN</title>

      <!-- Compiled and minified CSS -->         
      <link rel="stylesheet" href="../public/css/materialize.min.css">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="../public/css/estilo.css">
      <link rel="stylesheet" href="../public/css/estiloadmin.css">
      <link rel="icon" href="../public/images/logo.png">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <div class="navbar-fixed">
      <nav class="white z-depth-1">
          <div class="nav-wrapper container">
            <a href="./" class="branch">
              <img src="../public/images/logo.png" alt="logotipo" width="60">
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down black-text">
              <div class="menu-search">
                <input id="search" type="text" class="validate" placeholder="PROCURA">
              </div>
            </ul>
          </div>
      </nav>
    </div>

    <div class="menuLateral">
      <nav class="menuLateral__nav">
        <ul>
          <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="HOME" href="./"><i class="large material-icons">home</i></a></li>
          <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="PRODUTOS" href="#"><i class="large material-icons">add_shopping_cart</i></a></li>
          <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="PEDIDOS" href="#"><i class="large material-icons">assignment_late</i></a></li>
          <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="USUARIOS" href="./usuarios.php"><i class="large material-icons">assignment_ind</i></a></li>
          <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="CONFIGURAÇÕES" href="./configuracao.php?user=<?= $_SESSION['id'] ?>"><i class="large material-icons">settings_applications</i></a></li>
          <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="SAIR" href="../db/logout.php"><i class="large material-icons">open_in_new</i></a></li>
        </ul>
      </nav>
    </div>