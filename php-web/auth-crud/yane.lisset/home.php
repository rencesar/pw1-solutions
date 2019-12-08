<?php
session_start();
require 'crud.php';
$db = new Conexaocrud();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <h3 style="text-align: center;">Crud - playlist
    <div>
    <a href="create.php" class="btn btn-success" style="background: #369dbc;"><i class="material-icons">playlist_add</i></a>
    </div>
    </h3>
    
    <div class="row" style="margin-right: 7rem;">
        <table class="table table-striped table-bordered" style="margin-left: 4rem; margin-right: 26rem;">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Banda</th>
                    <th>Música</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php
$inf = $db->readAll();
foreach ($inf as $info):
?>
                <tr>
                    <td><?php echo $info['id']; ?></td>
                    <td><?php echo $info['name']; ?></td>
                    <td><?php echo $info['music']; ?></td>
                    <td><a href="updateForm.php?id=<?php echo $info['id']; ?>" class="btn" style="background: #f7cb8f;"><i
                                class="material-icons">edit</i></a></td>
                    
                    <td> <a class="btn btn-danger" href="delete.php?id=<?php echo $info['id']; ?>" style="background: gray"><i
                                class="material-icons">delete_forever</i></a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div style="display: flex;flex-direction: row-reverse"><a href="sair.php" class="btn btn-info"
            style="margin-right: 5rem; background: #000000b3">sair</a></div>
    </div>
</body>

</html>