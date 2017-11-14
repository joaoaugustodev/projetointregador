<?php
  include_once('../db/verifysession.php');
  include_once('../includes/header.php');
  include_once('../includes/excluirproduto.php');

  if (isset($_POST['produtobtn'])) {
    try {
      $id = $_POST['editarprod'];
      $idUser = $_SESSION['id'];
      $nome = utf8_encode($_POST['nome']);
      $categoria = $_POST['categoria'];
      $descProduto = utf8_decode($_POST['descProd']);
      $product_preco = str_replace(',', '.', str_replace('.', '', $_POST['precProduto']));
      $product_desconto = str_replace(',', '.', str_replace('.', '', $_POST['descontoPromocao']));
      $ativoProduto = $_POST['ativoProduto'];
      $qtdMinEstoque = $_POST['qtdMinEstoque'];
      $arquivo = $_FILES['imagem']['tmp_name'];
      $imagem = @fopen($arquivo, "r");
      $conteudo = @fread($imagem, filesize($arquivo));

      $stmt = odbc_prepare($db, "INSERT INTO Produto(nomeProduto, descProduto, precProduto, descontoPromocao, idCategoria, ativoProduto, idUsuario, qtdMinEstoque, imagem) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $param = array($nome, $descProduto, $product_preco, $product_desconto, $categoria, $ativoProduto, $idUser, $qtdMinEstoque, $conteudo);

      if(odbc_execute($stmt, $param)){
        $msg = 'Produto cadastrado com sucesso!';
      }else{
        $msg = 'Erro ao cadastrar o produto';

      }
    } catch (Exception $e) {
      echo $e;
    }
  }
?>

<br>
<br>

<?php include_once('../includes/message.php');
 ?>

<?php 
    if (isset($_GET['nomeBusca'])):
      $busca = $_GET['nomeBusca'];
      $result = odbc_exec($db, "SELECT * FROM Produto WHERE nomeProduto LIKE '%$busca%'");
?>

  <div class="container">
    <div class="row">
        <?php
          while ($products = odbc_fetch_array($result)):
            $image =  base64_encode($products['imagem']);
        ?>
          <div class="col s12 m4 cards-produto__card">
            <div class="card cards-produto__cardchild">
              <div class="card-image">
                <img src="<?= 'data:image/jpg;base64,'.$image ?>" width="100%" height="300">
              </div>
              <div class="card-content cards-produto__carddesc">
                <span title="<?= utf8_encode($products['nomeProduto']) ?>" class="title card-title text-black"><?= utf8_decode($products['nomeProduto']) ?></span>
                <p><?= utf8_encode($products['descProduto']) ?></p>
              </div>
              <div class="card-action">
                <div class="col s12 cardPrice">
                  <span class="title cardPrice__price valorProd">De: <span class="formatMoney"><?= floatval($products['precProduto']) ?></span></span>
                  <span class="title cardPrice__price descontoProd">Por: <span class="formatMoney"><?= floatval($products['precProduto']) - floatval($products['descontoPromocao']) ?></span></span>
                </div>
                <hr>
                <a href="./editar.php?editarproduto=<?= $products['idProduto'] ?>">Editar</a>
                <a href="?excluirproduto=<?= $products['idProduto'];?>"></a>
              </div>
            </div>
          </div>
        <?php  endwhile; ?>
    </div>
  </div>

<?php else: ?>

  <div class="container">
    <div class="row">
      <div class="col s12 card-panel newProduto">
        <a href="#modal1" class="modal-trigger"><i class="material-icons">exposure_plus_1</i> ADD PRODUTO</a>
      </div>

      <div class="col s12 father">
        <?php
          $result = odbc_exec($db, 'SELECT * FROM Produto');
          while ($products = odbc_fetch_array($result)):
          $image =  base64_encode($products['imagem']);

        ?>
          <div class="col s12 m4 cards-produto__card">
            <div class="card cards-produto__cardchild">
              <div class="card-image">
                <img src="<?= 'data:image/jpg;base64,'.$image ?>" width="100%" height="300">
              </div>
              <div class="card-content cards-produto__carddesc">
                <span title="<?= utf8_encode($products['nomeProduto']) ?>" class="title card-title text-black"><?= utf8_decode($products['nomeProduto']) ?></span>
                <p><?= utf8_encode($products['descProduto']) ?></p>
              </div>
              <div class="card-action">
                <div class="col s12 cardPrice">
                  <span class="title cardPrice__price valorProd">De: <span class="formatMoney"><?= floatval($products['precProduto']) ?></span></span>
                  <span class="title cardPrice__price descontoProd">Por: <span class="formatMoney"><?= floatval($products['precProduto']) - floatval($products['descontoPromocao']) ?></span></span>
                </div>
                <hr>
                <a href="./editar.php?editarproduto=<?= $products['idProduto'] ?>">Editar</a>
                <a href="?excluirproduto=<?= $products['idProduto'];?>">Deletar</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
    </div>
  </div>
  </div>

  <div id="modal1" class="modal modalizar">
    <div class="row">
    <h4 class="center">Cadastro de Produto</h4>
    <form class="col s12 cadastraProduto" method="post" action="" enctype="multipart/form-data">
      <input type="hidden" name="editarprod" value="">
      <div class="row">

        <div class="input-field col s6">
          <input name="nome" id="first_name" type="text" class="validate" required>
          <label for="first_name">Nome</label>
        </div>

        <div class="input-field col s6">
        <input id="email" type="text" class="validate" name="descProd" required>
          <label for="last_name">Descrição</label>
        </div>

        <div class="input-field col s12 m6">
          <input id="cpf" type="text" name="precProduto" class="validate" required>
          <label for="cpf">Preço</label>
        </div>

        <div class="input-field col s12 m6">
          <input id="phone" type="text" name="descontoPromocao" class="validate"  required>
          <label for="phone">Desconto</label>
        </div>

        <div class="input-field col s12 m6">
          <select name="ativoProduto" class="validate">
              <option value="1" select>Ativar</option>
              <option value="0">Desativar</option>
          </select>
          <label for="phone">Ativo / Desativo</label>
        </div>


        <div class="input-field col s12 m6">
          <select name="categoria" class="validate">
              <?php 
                $query = odbc_exec($db, 'SELECT idCategoria, nomeCategoria FROM Categoria');
                while ($categoria = odbc_fetch_array($query)):
              ?>
                <option value="<?= $categoria['idCategoria'] ?>"><?= utf8_encode($categoria['nomeCategoria']) ?></option>
              <?php endwhile; ?>
          </select>
          <label for="phone">Categoria</label>
        </div>

        <div class="input-field col s12 m6">
          <input id="phone" type="text" name="qtdMinEstoque" class="validate">
          <label for="phone">Qtd. Estoque</label>
        </div>

        <div class="input-field col s12 m6">
          <input id="img" type="file" name="imagem" accept=".png, .jpg, .gif" class="validate">
        </div>

        <div class="input-field col s12 m6">
          <img src="" alt="" id="upimage" width="300" height="auto">
          <p class="msg bold"></p>
        </div>

        <button class="btn cadastra center" name="produtobtn">Cadastrar</button>
      </div>
    </form>
  </div>
  </div>
<?php endif; ?>

<script>
  let price = document.querySelectorAll('.formatMoney')

  price.forEach(function (currency) {
    let priceBr = parseFloat(currency.textContent).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })
    currency.textContent = priceBr
  })

  window['img'].addEventListener('change', function (e) {
    const reader = new FileReader()
    const button = document.querySelector('.cadastra')
    const message = document.querySelector('.msg')

    if (e.target.files[0].size / 1024 > 300) {

      button.disabled = true
      message.innerHTML = 'Imagem deve ter menos que 300KB'
      message.classList.add('red-text')
      window['upimage'].src = ''

    } else {
      reader.onload = function(){
        var dataURL = reader.result
        button.disabled = false
        message.innerHTML = ''
        message.classList.remove('red-text')
        var output = window['upimage']
        output.src = dataURL
      }

      reader.readAsDataURL(e.target.files[0])
    }

  })
</script>

<?php include_once('../includes/footer.php'); ?>
