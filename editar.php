<?php
include_once 'php_actions/db_connect.php';
include_once 'includes/header.php';

if(isset($_GET['id'])):
  $id = mysqli_escape_string($connect, $_GET['id']);

  $query = "SELECT * FROM testeapiphp WHERE Id = '$id'";
  $result = mysqli_query($connect, $query);
  $dados = mysqli_fetch_array($result);
endif;
?>

<div class="row">
    <div class="col s12 m6 push-m3"> 
        <h3 class="light">Editar funcionario</h3>
        <form action="php_actions/update.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $dados['Id']; ?>">
          <div class="input-field col s12">
            <input type="text" name="nome" id="nome" value="<?php echo $dados['Nome']; ?>" required>
            <label for="nome">Nome</label>
          </div>

          <div class="input-field col s12">
            <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['Sobrenome']; ?>" required>
            <label for="sobrenome">Sobrenome</label>
          </div>

          <div class="input-field col s12">
            <input type="text" name="email" id="email" value="<?php echo $dados['Email']; ?>" required>
            <label for="email">E-mail</label>
          </div>

           <button type="submit" name="btn-editar" class="btn">Atualizar</button>
           <a href="index.php" class="btn red">Cancelar</a>
       </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>