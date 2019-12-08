<?php
    require_once('../database/database.php');
    session_start();
    if (!isset($_SESSION['logado'])){
        header('location:../index.html');
    }

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- css bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Adicionar</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="add.php">Adicionar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listar.php" >Listar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sair.php" >Sair</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
        $banco = new Database();
        $read = $banco->readAll();
        echo '<div class="container"><table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Atualizar</th>
            <th scope="col">Remover</th>
          </tr>
        </thead>
        <tbody>';
        foreach($read as $dns){
            echo "<tr>
    <td>".$dns['id']."</td>
    <td>".$dns['name']."</td>
    <td>".$dns['address']."</td>
    <td><a data-toggle='collapse' href='#collapse".$dns['id']."' role='button' aria-expanded='false' aria-controls='collapse".$dns['id']."'>Atualizar</a></td>
    <td><a href='remove.php?id=".$dns['id']."'>Remover</a></td>
</tr>
<tr class='collapse' id='collapse".$dns['id']."'>
    <form action='update.php' method='post'>
        <td><input class='form-control' type='text' name='id' value='".$dns['id']."' readonly></td>
        <td><input class='form-control' type='text' name='nome' value='".$dns['name']."'></td>
        <td><input class='form-control' type='text' name='endereco' value='".$dns['address']."'></td>
        <td><button class='btn btn-primary' type='submit'>Atualizar</button></td>
        <td></td>
    </form>
</tr>";
        }
        echo '</table></tbody></div>';

    ?>

    <!-- scrits bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>
</html>