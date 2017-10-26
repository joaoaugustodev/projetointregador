<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header('Location: /projetointregador/');
        exit();
    }

    include('../db/conection.php');
?>

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
      <link rel="icon" href="../public/images/logo.png">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <div class="navbar-fixed">
      <nav class="white">
          <div class="nav-wrapper container">
            <a href="./" class="brand-logo">
              <img src="../public/images/logo.png" alt="logotipo" width="60">
            </a>

            <ul id="nav-mobile" class="right hide-on-med-and-down black-text">
              <li><a class="black-text" href="#">Produtos</a></li>
              <li><a class="black-text" href="#">Usuarios</a></li>
              <li><a class="black-text" href="#">Pedidos</a></li>
              <li><a class="logout z-depth-0 white-text btn" href="../db/logout.php">Logout</a></li>
            </ul>
          </div>
      </nav>
    </div>
    <br>
    <div class="container">
        <div class="col s12 sample-admin">

            <div class="col s4 space hd">
              <span class="grey-text">ESPAÇO LIVRE EM DISCO</span>
              <div class="space__disk grey-text">
                <?php
                  $space = disk_free_space('/dev/sda1') ? disk_free_space('/dev/sda1') : disk_free_space('c:');
                  echo substr($space / 1024 / 1024 / 1024, 0, 3).'<sub>GB</sub>';
                ?>
              </div>
            </div>

            <div class="col s4 space memory">
              <span class="grey-text">MEMORIA EM USO</span>
              <div class="space__disk grey-text">
                <?php
                  $space = ('c:') ? 'c:' : '/dev/sda1';
                  echo substr(memory_get_usage() / 1024, 0, 3).'<sub>KB</sub>';
                ?>
              </div>
            </div>
            
            <div class="col s4 space users">
              <span class="grey-text">LOGADO COMO</span>
              <div class="space__disk grey-text">
                <?= strtoupper($_SESSION['user']); ?>
              </div>
            </div>
        </div>

        <br>   

        <div class="row">
            <div class="col s6">
                <table class="striped responsive-table">
                    <thead>
                      <tr>
                          <th>Name</th>
                          <th>Item Name</th>
                          <th>Item Price</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                      </tr>
                      <tr>
                        <td>Alan</td>
                        <td>Jellybean</td>
                        <td>$3.76</td>
                      </tr>
                      <tr>
                        <td>Jonathan</td>
                        <td>Lollipop</td>
                        <td>$7.00</td>
                      </tr>
                    </tbody>
                </table>
            </div>

            <div class="col s6">
                <h4>LISTA DE PEDIDOS</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, sit, odit assumenda voluptates doloremque accusantium nam, architecto rerum minima autem ex quae iure deleniti cupiditate hic soluta explicabo laudantium alias?</p>
                <br>
                <button class="btn button-editar">Editar</button>
            </div>
            <div class="col s6">
              <h5 class="center list-clients">LISTA DE CLIENTES</h5>

              <div class="wrap-overflow">
                  <table class="centered striped responsive-table">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>Email</th>
                            <th>EDITAR</th>
                            <th>DELETAR</th>
                        </tr>
                      </thead>

                      <tbody>

                          <?php 
                              $result = odbc_exec($db, 'SELECT idCliente, nomeCompletocliente, emailCliente FROM Cliente');
                              while ($clients = odbc_fetch_array($result)) { 
                          ?>
                           <tr>
                              <td><?= $clients['idCliente'] ?></td>
                              <td><?= $clients['nomeCompletocliente'] ?></td>
                              <td><?= $clients['emailCliente'] ?></td>
                              <th><a href="?editar=<?= $clients['idCliente'] ?>"><i class="material-icons">create</i></a></th>
                              <th><a href="?excluir=<?= $clients['idCliente'] ?>"><i class="material-icons">delete_forever</i></a></th>
                          </tr>

                          <? }?>
                      </tbody>
                  </table>
              </div>
            </div>

            <div class="col s6">
                <h5 class="center list-clients">LISTA DE PRODUTOS</h5>

                <div class="wrap-overflow">
                    <table class="centered striped responsive-table">
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
                                $result = odbc_exec($db, 'SELECT idProduto, nomeProduto, descProduto FROM Produto');
                                while ($products = odbc_fetch_array($result)) { 
                            ?>
                            <tr>
                                <td><?= utf8_encode($products['idProduto']) ?></td>
                                <td><div class="nowrap"><?= utf8_encode($products['nomeProduto']) ?></div></td>
                                <td><div class="nowrap"><?= utf8_encode($products['descProduto']) ?></div></td>
                                <th><a href="?editar=<?= $products['idProduto'] ?>"><i class="material-icons">create</i></a></th>
                                <th><a href="?excluir=<?= $products['idProduto'] ?>"><i class="material-icons">delete_forever</i></a></th>
                            </tr>

                            <? }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="../public/javascript/jquery-3.2.1.min.js"></script>
  <script src="../public/javascript/materialize.min.js"></script>
  <script src="../public/javascript/init.js"></script>
</body>
</html>