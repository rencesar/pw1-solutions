<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />

</head>

<body>
    <div class="login">
        <form action="methods/auth.php" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">Nome</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nome" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="password">
            </div>
            <div>
                    <a class="dropdown-item" href="cadastrar.php">Ainda não possui cadastro? Cadastre-se</a>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
        

    </div>
</body>

</html>