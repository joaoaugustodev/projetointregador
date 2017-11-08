<?php 

  if (isset($_POST['editar'])) {
    $id = $_GET['editarClient'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $telefoneresidencial = $_POST['telefoneresidencial'];
    $telefonecomercial = $_POST['telefoneresidencial'];
    $data = $_POST['data'];

    $stmt = odbc_prepare($db, "UPDATE Cliente SET nomeCompletoCliente= ?, emailCliente= ?, senhaCliente= ?,
                          CPFCliente= ?, celularCliente= ?, telComercialCliente= ?,
                          telResidencialCliente= ?, dtNascCliente= ? WHERE idCliente=$id");

    if(odbc_execute($stmt, array($nome, $email, $senha, $cpf, $telefone, $telefoneresidencial, $telefonecomercial, $data))){
      $msg = 'Categoria atualizada com sucesso!';
    }else{
      $msg = 'Erro ao atualizar a categoria';
    }
  }

  $id = $_GET['editarClient'];
  $query = odbc_exec($db, "SELECT * FROM Cliente WHERE idCliente=$id");
  $value = odbc_fetch_array($query);
?>
<?php include_once('../includes/message.php'); ?>

<div class="container">
  <div class="row">
   <form class="col s12 card-panel" method="post" action="">
     <input type="hidden" name="idcliente" value="<?= $value['idCliente'] ?>">
     <div class="row">
       <div class="input-field col s6">
         <input placeholder="Placeholder" name="nome" id="first_name" type="text" class="validate" value="<?= $value['nomeCompletoCliente'] ?>">
         <label for="first_name">Nome</label>
       </div>
       <div class="input-field col s6">
         <input id="email" type="email" class="validate" name="email" value="<?= $value['emailCliente'] ?>">
         <label for="last_name">Email</label>
       </div>
       <div class="input-field col s6">
         <input name="senha" type="text" class="validate" value="<?= $value['senhaCliente'] ?>">
         <label for="disabled">Senha</label>
       </div>
       <div class="input-field col s12 m6">
         <input id="cpf" type="text" name="cpf" class="validate" value="<?= $value['CPFCliente'] ?>">
         <label for="cpf">CPF</label>
       </div>
       <div class="input-field col s12 m6">
         <input id="phone" type="text" name="telefone" class="validate" value="<?= $value['celularCliente'] ?>">
         <label for="phone">Telefone Celular</label>
     </div>
       <div class="input-field col s12 m6">
         <input id="phone" type="text" name="telefoneresidencial" class="validate" value="<?= $value['telComercialCliente'] ?>">
         <label for="phone">Telefone Comercial</label>
       </div>
       <div class="input-field col s12 m6">
         <input id="phone" type="text" name="telefoneResidencial" class="validate" value="<?= $value['telResidencialCliente'] ?>">
         <label for="phone">Telefone Residencial</label>
       </div>
       <div class="input-field col s12 m6">
         <input id="data" type="text" name="data" class="validate" value="<?= $value['dtNascCliente'] ?>">
         <label for="data">Data de nascimento</label>
       </div>

       <div class="col s12">
         <button name="insertUser" class="btn center waves-effect waves-light btn-large">Editar</button>
       </div>
     </div>
   </form>
 </div>
</div>