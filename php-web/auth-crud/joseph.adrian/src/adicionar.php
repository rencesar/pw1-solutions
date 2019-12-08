<?php
    require_once('database/database.php');
    session_start();
    if (!isset($_SESSION['logado'])){
        header('location:index.html');
    }
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
            <li><a href="sair.php">Sair</a></li>
            
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="listar.php">Listar</a></li>
            <li><a href="adicionar.php">Adicionar<span class="sr-only">(current)</span></a></li>
            
          </ul>
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <div class="row placeholders">

            
            
            <div class="placeholder">
              <img src="https://i.pinimg.com/originals/ea/c2/f6/eac2f64d3115b1be9717a85cd8e4aac6.gif" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              
            </div>
          </div>
          <form action="crud/insert.php" method="post">
            <div class="form-row">
                <div class="col">
                    <label for="nome">Nome:</label>
                    <input class="form-control" type="text" name="nome" placeholder="Nome">
                </div>
                <div class="col">
                    <label for="pelagem">Pelagem:</label>
                    <input class="form-control" type="text" name="pelagem" placeholder="Pelagem">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <br>
                    <button class="btn btn-primary" type="submit">Adicionar</button>
                </div>
            </div>
        </form>
          

          
          
        </div>
      </div>
    </div>

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    
  </body>
</html>
