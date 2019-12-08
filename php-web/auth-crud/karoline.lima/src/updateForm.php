<?php
require('database/database.php');

session_start();
if(!isset($_SESSION['auth'])){
  header('Location:../index.php');
}

$database = new CrudDatabase();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Atualizar</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Atualizar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="methods/listar.php">Listar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php" tabindex="-1" aria-disabled="true">Sair</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <form action="methods/update.php" method="POST">

                <?php $valor = $database->readId($_GET['id']); ?>

                <div class="form-row">
                    <div class="col-1">
                        <input type="text" class="form-control" placeholder="Id" name="id" value="<?php echo $_GET['id']; ?>" readonly>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $valor['name']; ?>">
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="Idade" name="idade" value="<?php echo $valor['idade']; ?>">
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2">Atualizar</button>
                    </div>

                </div>
            </form>

        </div>
    </div>







</body>

</html>