<?php
include_once 'php_actions/message.php';
include_once 'php_actions/db_connect.php';
include_once 'includes/header.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3"> 
        <h3 class="light">Funcionários cadastrados</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM testeapiphp";
                $result = mysqli_query($connect, $query); 
                if(mysqli_num_rows($result) > 0):
                while($dados = mysqli_fetch_array($result)):
                ?>
                <tr>
                    <td><?php echo $dados['Nome']; ?></td>
                    <td><?php echo $dados['Sobrenome']; ?></td>
                    <td><?php echo $dados['Email']; ?></td>
                    <td><a href="editar.php?id=<?php echo $dados['Id']; ?>" class="btn-floating yellow"><i class="material-icons">edit</i></a></td>
                    <td><a href="#modal<?php echo $dados['Id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                    <div id="modal<?php echo $dados['Id']; ?>" class="modal">
                      <div class="modal-content">
                          <h4>Opa!</h4>
                          <p>Gostaria mesmo de excluir este funcionário ?</p>
                      </div>
                      <div class="modal-footer">
                          <form action="php_actions/delete.php" method="post">
                              <input type="hidden" name="id" value="<?php echo $dados['Id']?>">
                              <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                          </form>
                      </div>
                    </div>
                </tr>
                <?php 
                endwhile; 
                endif;
                ?>
            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn">Cadastrar</a>
    </div>
</div>

<?php
include_once 'includes/footer.php'
?>