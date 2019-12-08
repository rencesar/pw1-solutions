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
    
    <title>Listar</title>
</head>
<body>
    <nav>
        <div>
            <ul>
                <li>
                    <a href="add.php">Adicionar</a>
                </li>
                <li>
                    <a href="listar.php" >Listar</a>
                </li>
                <li>
                    <a href="sair.php" >Sair</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
        $banco = new Database();
        $getAll = $banco->readAll();
        echo '<div class="container"><form><table class="table">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Atualizar</th>
            <th>Remover</th>
          </tr>
        <tbody>';
        foreach($getAll as $host){
            echo "<tr>
    <td>".$host['id']."</td>
    <td>".$host['name']."</td>
    <td>".$host['address']."</td>
    <td><a data-toggle='collapse' href='#collapse".$host['id']."' role='button' aria-expanded='false' aria-controls='collapse".$host['id']."'>Atualizar</a></td>
    <td><a href='deletar.php?id=".$host['id']."'>Deletar</a></td>
</tr>
<tr class='collapse' id='collapse".$host['id']."'>
    <form action='update.php' method='post'>
        <td><input class='form-control' type='text' name='id' value='".$host['id']."' readonly></td>
        <td><input class='form-control' type='text' name='nome' value='".$host['name']."'></td>
        <td><input class='form-control' type='text' name='endereco' value='".$host['address']."'></td>
        <td><button class='btn btn-primary' type='submit'>Atualizar</button></td>
        <td></td>
    </form>
</tr>";
        }
        echo '</form></table></tbody></div>';
    ?>

    <!-- scrits bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>
</html>