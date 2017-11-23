<?php 
  if (isset($_POST['editUser'])) {
    $id = $_GET['editarUser'];
    $nomeUsuario = $_POST['nome'];
    $loginUsuario = $_POST['login'];
    $tipo = $_POST['tipo'];
    $ativo = $_POST['ativo'];

    $stmt = odbc_prepare($db, "UPDATE Usuario SET nomeUsuario= ?, loginUsuario= ?, tipoPerfil= ?, usuarioAtivo = ? WHERE idUsuario=$id");

    if(odbc_execute($stmt, array($nomeUsuario, $loginUsuario, $tipo, $ativo))){
      $msg = 'Usuario atualizado com sucesso!';
    }else{
      $msg = 'Erro ao atualizar a usuario';
    }
  }

  $id = $_GET['editarUser'];
  $query = odbc_exec($db, "SELECT * FROM Usuario WHERE idUsuario=$id");
  $value = odbc_fetch_array($query);
?>
<?php include_once('../includes/message.php'); ?>

<div class="container">
  <div class="row">
    <div class="col s12 m12 card-panel">
     <h5 class="center">Editar</h5>
     <div class="row">
       <form class="col s12" method="post">
         <div class="row">
           <div class="input-field col s6">
             <input id="first_name" name="nome" type="text" class="validate" required value="<?= $value['nomeUsuario'] ?>">
             <label for="first_name">Nome</label>
           </div>
           <div class="input-field col s6">
             <input id="last_name" name="login" type="text" class="validate" required value="<?= $value['loginUsuario'] ?>">
             <label for="last_name">Login</label>
           </div>
         </div>
         <div class="row">
           <div class="input-field col s12 m5">
             <select name="tipo" class="validate" value="<?= $value['tipo'] ?>">
               <option value="A" select>A</option>
               <option value="B">B</option>
               <option value="C">C</option>
             </select>
             <label for="tipoperfil">Tipo de Perfil</label>
           </div>
           <div class="input-field col s12 m6">
             <select name="ativo" class="validate" value="<?= $value['tipoPerfil'] ?>">
               <option value="1" select>Ativo</option>
               <option value="0">Desativo</option>
             </select>
             <label for="userActive">Usuario Ativo</label>
           </div>
         </div>
         <button name="editUser" class="btn center waves-effect waves-light btn-large">Editar</button>
         <br>
       </form>
     </div>
   </div>
 </div>
</div>

