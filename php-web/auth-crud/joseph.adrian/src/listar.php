<?php
    require_once('database/database.php');
    /*session_start();
    if (!isset($_SESSION['logado'])){
        header('location:index.html');
    }*/
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Auth-CRUD gato</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/listar.css" rel="stylesheet">



  
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Auth-crud gato</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="crud/sair.php">Sair</a></li>
            
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="listar.php">Listar <span class="sr-only">(current)</span></a></li>
            <li><a href="adicionar.php">Adicionar</a></li>
            
          </ul>
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <div class="row placeholders">

            
            
            <div class="placeholder">
              <img src="https://i.pinimg.com/originals/ea/c2/f6/eac2f64d3115b1be9717a85cd8e4aac6.gif" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              
            </div>
          </div>
          <form class="navbar-form navbar-right">
            <input type="text" id="search" class="form-control" placeholder="Pesquisar...">
            
          </form>
          <h2 class="sub-header">Gatos</h2>

          <?php
            $banco = new Database();
            $read = $banco->readAll();
            echo '
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Pelagem</th>
                </tr>
              </thead>
              <tbody id="myTable">';
              foreach($read as $gato){
                echo "
                <tr>
                  <td>".$gato['id']."</td>
                  <td>".$gato['nome']."</td>
                  <td>".$gato['pelagem']."</td>
                  <td><a data-toggle='collapse' href='#collapse".$gato['id']."' role='button' aria-expanded='false' aria-controls='collapse".$gato['id']."'>Atualizar</a></td>
                  <td><a href='crud/remover.php?id=".$gato['id']."'>Remover</a></td>
                </tr>
                
                <tr class='collapse' id='collapse".$gato['id']."'>
                <form action='crud/update.php' method='post'>
                    <td><input class='form-control' type='text' name='id' value='".$gato['id']."' readonly></td>
                    <td><input class='form-control' type='text' name='nome' value='".$gato['nome']."'></td>
                    <td><input class='form-control' type='text' name='pelagem' value='".$gato['pelagem']."'></td>
                    <td><button class='btn btn-primary' type='submit'>Atualizar</button></td>
                    <td></td>
                </form>
            </tr>";
                    }
                    echo '</table></tbody></div>';
                ?>
        </div>
      </div>
    </div>

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/search.js"></script>
    
    
  </body>
</html>
