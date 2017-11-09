<?php
  include_once('../db/verifysession.php');
  include_once('../includes/header.php');
?>

<br>
<br>

<div class="container">
    <div class="row">
      <div class="col s12 father">
        <?php
          $result = odbc_exec($db, 'SELECT idProduto, nomeProduto, descProduto, imagem FROM Produto');
          while ($products = odbc_fetch_array($result)):
          $image =  base64_encode($products['imagem']);
        ?>
          <div class="col s6 m4 cards-produto__card">
            <div class="card cards-produto__cardchild">
              <div class="card-image">
                <img src="<?= 'data:image/jpg;base64,'.$image ?>" width="100%" height="auto">
              </div>
              <div class="card-content cards-produto__carddesc">
                <span class="card-title text-black"><?= utf8_decode($products['nomeProduto']) ?></span>
                <p><?= utf8_decode($products['descProduto']) ?></p>
              </div>
              <div class="card-action">
                <a href="#">Editar</a>
                <a href="#">Deletar</a>
              </div>
            </div>
          </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>

<?php include_once('../includes/footer.php'); ?>
