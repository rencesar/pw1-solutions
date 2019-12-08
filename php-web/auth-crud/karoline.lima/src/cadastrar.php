<?php
require('database/database.php');
$database = new CrudDatabase();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <div>
        <form action="methods/insert.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nome</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Nome" name="name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
                </div>

                <div class="form-group">
                    <label for="inputAddress">.Idade</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Idade" name="idade">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>

</html>