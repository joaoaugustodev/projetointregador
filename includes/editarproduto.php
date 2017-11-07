<?php
  ini_set('odbc.defaultlrl', 90000000);

  if (isset($_POST['produtobtn'])) {
    try {
      $id = $_POST['editarprod'];
      $nome = utf8_encode($_POST['nome']);
      $descProduto = utf8_encode($_POST['descProd']);
      $precProduto = $_POST['precProduto'];
      $descontoPromocao = $_POST['descontoPromocao'];
      $ativoProduto = $_POST['ativoProduto'];
      $qtdMinEstoque = $_POST['qtdMinEstoque'];
      $arquivo = $_FILES['imagem']['tmp_name'];
      $imagem = @fopen($arquivo, "r");
      $conteudo = @fread($imagem, filesize($arquivo));

      if (empty($arquivo)) {
        $stmt = odbc_prepare($db, "UPDATE Produto SET nomeProduto= ?, descProduto= ?, precProduto= ?, descontoPromocao= ?, ativoProduto= ?, qtdMinEstoque = ? WHERE idProduto=$id");
      } else {

        $stmt = odbc_prepare($db, "UPDATE Produto SET nomeProduto= ?, descProduto= ?, precProduto= ?, descontoPromocao= ?, ativoProduto= ?, qtdMinEstoque = ?, imagem= ? WHERE idProduto=$id");
      }
      


      if(odbc_execute($stmt, array($nome, $descProduto, $precProduto, $descontoPromocao, $ativoProduto, $qtdMinEstoque, $conteudo))){
        $msg = 'Produto atualizado com sucesso!';
      }else{
        $msg = 'Erro ao atualizar o produto';
      }
    } catch (Exception $e) {
      echo $e;
    }
  }

  $id = $_GET['editarproduto'];
  $query = odbc_exec($db, "SELECT * FROM Produto WHERE idProduto=$id");
  $value = odbc_fetch_array($query);
  $desc = utf8_decode($value['descProduto']);

  $image =  base64_encode($value['imagem']);
?>

<?php include_once('../includes/message.php'); ?>
<br><br>
<div class="container">
  <div class="row">
    <form class="col s12" method="post" action="" enctype="multipart/form-data">
      <input type="hidden" name="editarprod" value="<?= $value['idProduto'] ?>">
      <div class="row">

        <div class="input-field col s6">
          <input placeholder="Placeholder" name="nome" id="first_name" type="text" class="validate" value="<?= $value['nomeProduto'] ?>">
          <label for="first_name">Nome</label>
        </div>

        <div class="input-field col s6">
        <input id="email" type="text" class="validate" name="descProd" value="<?= $desc ?>">
          <label for="last_name">Descrição</label>
        </div>

        <div class="input-field col s12 m6">
          <input id="cpf" type="text" name="precProduto" class="validate" value="<?= $value['precProduto'] ?>">
          <label for="cpf">Preço</label>
        </div>

        <div class="input-field col s12 m6">
          <input id="phone" type="text" name="descontoPromocao" class="validate" value="<?= $value['descontoPromocao'] ?>">
          <label for="phone">Desconto</label>
        </div>

        <div class="input-field col s12 m6">
          <select name="ativoProduto" class="validate">
            <?php if ($value['ativoProduto'] == '1'): ?>
              <option value="1" select>Ativo</option>
              <option value="0">Desativar</option>
            <?php else: ?>
              <option value="1">Ativo</option>
              <option value="0" select>Desativar</option>
            <?php endif; ?>
          </select>
          <label for="phone">Ativo / Desativo</label>
        </div>

        <div class="input-field col s12 m6">
          <input id="phone" type="text" name="qtdMinEstoque" class="validate" value="<?= $value['qtdMinEstoque'] ?>">
          <label for="phone">Qtd. Estoque</label>
        </div>

        <div class="input-field col s12 m6">
          <input id="data" type="file" name="imagem" accept=".png, .jpg, .gif" class="validate">
        </div>

        <div class="input-field col s12 m6">
          <img src="<?= 'data:image/jpg;base64,'. $image;  ?>" alt="thumnail" id="upimage" width="300" height="auto">
        </div>

        <button class="btn submit btn" name="produtobtn">Editar</button>
      </div>
    </form>
  </div>
</div>