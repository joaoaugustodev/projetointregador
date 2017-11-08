<?php
  if (isset($_POST['btntUser'])) {
    try {
      
      $idUser = $_POST['idUsuario'];
      $login = $_POST['login'];
      $senha = $_POST['senha'];
      $tipo = $_POST['tipo'];
      $ativo = $_POST['ativo'];
      $nome = $_POST['nome'];

      $stmt = odbc_prepare($db, "UPDATE Usuario SET loginUsuario = ?, senhaUsuario = ?, nomeUsuario = ?,  tipoPerfil = ?, usuarioAtivo = ? WHERE idUsuario=$idUser");

    if(odbc_execute($stmt, array($login, $senha, $nome, $tipo, $ativo))){
      $msg = 'Categoria atualizada com sucesso!';
    }else{
      $msg = 'Erro ao atualizar a categoria';
    }


    } catch (Exception $e) {
      echo $e;
    }
  }

  $id = $_GET['editarUser'];
  $query = odbc_exec($db, "SELECT * FROM Usuario WHERE idUsuario=$id");
  $value = odbc_fetch_array($query);
?>

<?php include_once('../includes/message.php'); ?>

<div class="container">
  <div class="col s12 m12 card-panel">
    <h5 class="center">Alterar Usuário</h5>
      <br>
      <div class="row">
        <form class="col s12" method="post">
          <input type="hidden" value="<?= $value['idUsuario'] ?>" name="idUsuario">
          <div class="row">
            <div class="input-field col s6">
              <input id="first_name" name="nome" value="<?= $value['nomeUsuario'] ?>" type="text" class="validate" required>
              <label for="first_name">Nome</label>
            </div>
            <div class="input-field col s6">
              <input id="last_name" name="login" type="text" value="<?= $value['loginUsuario'] ?>" class="validate" required>
              <label for="last_name">Login</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="password" name="senha" type="text" value="<?= $value['senhaUsuario'] ?>" class="validate" required>
              <label for="password">Senha</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6">
              <select name="tipo" class="validate">
                <?php if ($value['tipoPerfil'] == 'A'): ?>
                  <option value="A" select>A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                <?php elseif ($value['tipoPerfil'] == 'B'): ?>
                  <option value="B" select>B</option>
                  <option value="A">A</option>
                  <option value="C">C</option>
                <?php else : ?>
                  <option value="B" >B</option>
                  <option value="A">A</option>
                  <option value="C" select>C</option>
                <?php endif; ?>
              </select>
              <label for="tipoperfil">Tipo de Perfil</label>
            </div>
            <div class="input-field col s12 m6">
              <select name="ativo" class="validate">
                <?php if ($value['usuarioAtivo'] == '1'): ?>
                  <option value="1">Ativo</option>
                  <option value="0">Desativado</option>
                <?php endif; ?>
                <?php if ($value['usuarioAtivo'] == '0'): ?>
                  <option value="0">Desativado</option>
                  <option value="1">Ativo</option>
                <?php endif; ?>
              </select>
              <label for="userActive">Usuario Ativo</label>
            </div>
          </div>
          <br>
          <div class="row">
            <button name="btntUser" class="btn">Editar</button>
          </div>
        </form>
      </div>
    </div>
</div>