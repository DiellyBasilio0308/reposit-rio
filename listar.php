<?php
    require_once "model/Solteiro.php";

?>

<!DOCTYPE HTML>
<html lang="pt-br"> 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
  <title>Catálogo de solteiros</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
	 crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<link href="style.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
   
   <?php include "inc/header.php"; ?>
<main>
  <h4>Pretendentes disponíveis:</h4>
  <div style="overflow-x:auto;">
<table class="container table">
        <thead>
        <tr class="bg-danger">
                <th>#</th>
                <th>Nome</th>
                <th>Cidade</th>
                <th>Idade</th>
                <th>Whatsapp</th>
                <th>Instagram</th>
                <th>Expectativas</th>
                <th>Editar</th>
                <th>Excluir</th>
                <th>
                <a
        href="index.php" class="btn btn-primary">
            Adicionar
        </a>
                </th>
            </tr>
        </thead>
    <?php
    $solteiros = Solteiro::retornarTodos();

    foreach($solteiros as $s):
    ?>
    <tbody class="table-danger">
        <tr class="table-danger">
            <td> <?php echo $s->getId(); ?> </td>
            <td> <?= $s->getNome(); ?> </td>
            <td> <?= $s->getCidade(); ?> </td>
            <td> <?= $s->getIdade(); ?> </td>
            <td> <?= $s->getWhatsapp(); ?> </td>
            <td> <?= $s->getInstagram(); ?> </td>
            <td> <?= $s->getExpectativas(); ?> </td>
            <td>
        <a
        href="ws/Editar-solteiro.php?id=<?= $s->getId(); ?>"
        class="btn btn-secondary material-icons">
            edit
        </a>
            </td>
            <td>
        <a
        href="javascript:excluirItemSelecionado(<?= $s->getId(); ?>)"
        class="btn btn-danger material-icons">
            delete
        </a>
            </td>
        </tr>
    </tbody>
    <?php 
    endforeach;
    ?>
    </table>
  </div>
    </main>
     <?PHP include "inc/footer.php"; ?>
     <script>
           function excluirItemSelecionado(id){
var mensagem;
var retorno = confirm("Tem certeza que deseja excluí-lo?");
if (retorno == true)
{
   //mensagem = "Operação confirmada";
   location.href = "ws/Deletar-solteiro.php?id=" + id;
}
else
{
//mensagem = "Você cancelou a operação";
   location.href = "listar.php";
   
}
          }
</script>

  </body>
</html>