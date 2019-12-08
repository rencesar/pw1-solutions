<?php
    session_start();
    if (!isset($_SESSION['logado']))
        header('location:index.html');

    require_once('database/database.php');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <nav>
        <a href="#">Navbar</a>
        <button type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
        </button>
        <div id="navbarNav">
            <ul>
                <li>
                    <a href="lib/add.php">Adicionar</a>
                </li>
                <li>
                    <a href="lib/listar.php">Listar</a>
                </li>
                <li>
                    <a href="lib/sair.php">Sair</a>
                </li>
            </ul>
        </div>
    </nav>

</body>
</html>