<?php
  include_once('../db/verifysession.php');
  include_once('../includes/header.php'); 
?>
    <div class="container">
        <div class="col s12 sample-admin">
            <div class="overflow">
              <div class="col s4 space hd">
                <span class="grey-text">ESPAÇO LIVRE EM DISCO</span>
                <div class="space__disk grey-text">
                  <?php
                    $space = @disk_free_space('/dev/sda1') ? @disk_free_space('/dev/sda1') : @disk_free_space('c:');
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
          </div>
    </div>
	
	
<div class="container">
	<div class="row">
		<div class="col-md-12">
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
						  while($clients = odbc_fetch_array($result)):
					  ?>
					  
					   <tr>
						  <td><?= $clients['idCliente']; ?></td>
						  <td><?= $clients['nomeCompletocliente']; ?></td>
						  <td><?= $clients['emailCliente']; ?></td>
						  <th><a href="./editar?editarClient=<?= $clients['idCliente']; ?>"><i class="material-icons">create</i></a></th>
						  <th><a href="./excluir?excluirClient=<?= $clients['idCliente']; ?>"><i class="material-icons">delete_forever</i></a></th>
					  </tr>

					  <?php endwhile; ?>
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
							while ($products = odbc_fetch_array($result)): 
						?>
						<tr>
							<td><?= utf8_encode($products['idProduto']); ?></td>
							<td><div class="nowrap"><?= utf8_encode($products['nomeProduto']); ?></div></td>
							<td><div class="nowrap"><?= utf8_encode($products['descProduto']); ?></div></td>
							<th><a href="./editar?editarproduto=<?= $products['idProduto'];?>"><i class="material-icons">create</i></a></th>
							<th><a href="./excluir?excluirproduto=<?= $products['idProduto'];?>"><i class="material-icons">delete_forever</i></a></th>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
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