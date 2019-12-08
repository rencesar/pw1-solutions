<?php require_once('database.php');
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <title>Login do estudante</title>

    <style>
      .login {
        text-align: center;
        display: block;
        width: 50%;
        margin: auto;
        margin-top: 10%;
      }
      form {
        margin-top: 50px;
        margin-left: 40px;
      }
    </style>
</head>
<body>
<div class="login">
  <h2>
      Confirme sua senha
  </h2>

  <form action="app.php" method="post" class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
      <label for="inputPassword2" class="sr-only">Email</label>
      <input type="text" class="form-control" name="form-login-email" placeholder="Email">
    </div> 
    <div class="form-group mx-sm-3 mb-2">
      <label for="inputPassword2" class="sr-only">Senha</label>
      <input type="password" class="form-control" name="form-login-senha" id="inputPassword2" placeholder="Senha">
    </div>  
    <button type="submit" class="btn btn-primary mb-2">Confirmar identidade</button>
    <button type="submit" class="btn btn-primary mb-2 ml-3">Criar nova conta</button>
  </form>

</div>
<script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>