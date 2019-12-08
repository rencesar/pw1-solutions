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
    <title>Adicionar</title>
</head>
<body>
    <nav>
        <div>
            <ul>
                <li>
                    <a href="add.php">Adicionar</a>
                </li>
                <li>
                    <a href="listar.php">Listar</a>
                </li>
                <li>
                    <a href="sair.php">Sair</a>
                </li>
            </ul>
        </div>
    </nav>
    <div >
        <form action="insert.php" method="post">
            <div>
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" placeholder="www.seudominio.com">
                </div>
                <div>
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" placeholder="0.0.0.0">
                </div>
            </div>
            <div>
                <div >
                    <br>
                    <button type="submit">Adicionar</button>
                </div>
            </div>
        </form>

    </div>

</body>
</html>