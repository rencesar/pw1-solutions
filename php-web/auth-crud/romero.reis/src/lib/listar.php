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
    <?php
        $db = new Database();
        $lines = $db->readAll();
        if($lines){

        }
        echo '<table>
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
        foreach($lines as $dns){
            echo "
<tr>
    <form action='update.php' method='post'>
        <td><input hidden=true type='text' name='id' value='".$dns['id']."'>".$dns['id']."</td>
        <td><input type='text' name='nome' value='".$dns['name']."'></td>
        <td><input type='text' name='endereco' value='".$dns['address']."'></td>
        <td><button type='submit'>Atualizar</button></td>
        <td><a href='remove.php?id=".$dns['id']."'>Remover</a></td>
    </form>
</tr>";
        }
        echo '</tbody></table>';

    ?>

</body>
</html>