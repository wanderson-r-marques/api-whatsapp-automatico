<?php
require 'class/Connection.php';
if(isset($_POST['telefone']) && $_POST['telefone'] != '')
{
  $con = Connection::connect();

  $descricao = $_POST['descricao'];
  $telefone = $_POST['telefone'];
  $telefone = str_replace('(','',$telefone);
  $telefone = str_replace(')','',$telefone);
  $telefone = str_replace('-','',$telefone);
  $telefone = str_replace(' ','',$telefone);
  $telefone = str_replace('  ','',$telefone);
  $telefone = str_replace('   ','',$telefone);
  $telefone = '55'.$telefone;
  $mensagem = $_POST['mensagem'];
  $imagem = $_POST['imagem$'];
  $smtp = $con->prepare("INSERT INTO cur_mensagem (  
    `descricao`,
    `telefone`,
    `mensagem`,
    `tipo_envio`,
    `cur_token`
  )
  VALUES
    (    
      '$descricao',
      '$telefone',
      '$mensagem',    
      1,
      2
    )");
  
  if($smtp->execute())
  {
    $msg = '<div class="alert alert-success">Cadastro realizado com sucesso!</div>';
  }else
  {
    $msg = '<div class="alert alert-danger">Cadastro não realizado! Verifique os dados.</div>';
  }    
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body>
  <div class="py-5 text-center text-white" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-10 p-4">
          <h1 class="text-light">Mensageria</h1>
          <p class="mb-4 lead text-light">Formulário de mensagens para Whatsapp</p>
          <?= $msg ?>
          <form action="index.php" method="post" enctype="multipart/form">
            <div class="form-row">
              <div class="form-group col-md-6"> <input name="descricao" required type="text" class="form-control" id="form22" placeholder="Descrição*"> </div>
              <div class="form-group col-md-6"> <input name="telefone" required type="text" class="form-control" id="form24" placeholder="Telefone*"> </div>
            </div>
            <div class="form-group"> <input name="imagem"  type="file" class="form-control-file" id="form25" placeholder="Imagem"> </div>
            <div class="form-group"> <textarea name="mensagem" required class="form-control" id="form26" rows="3" placeholder="Mensagem"></textarea> </div> 
            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>