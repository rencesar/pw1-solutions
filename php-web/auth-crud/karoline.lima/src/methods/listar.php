<?php
require('../database/database.php');

session_start();
if (!isset($_SESSION['auth'])) {
  header('Location:../index.php');
}

$database = new CrudDatabase();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Listar</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/bootstrap.min.css" />


</head>

<body>
  <div class="container">

    <div class="card text-center">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">Listar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sair.php" tabindex="-1" aria-disabled="true">Sair</a>

          </li>

        </ul>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Nome</th>
              <th scope="col">Idade</th>
              <th scope="col">Editar</th>
              <th scope="col">Excluir</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $inf = $database->readAll();
            foreach ($inf as $info) {
              ?>
              <tr>
                <th scope="row"><?php echo $info['id']; ?></th>
                <td><?php echo $info['name']; ?></td>
                <td><?php echo $info['idade']; ?></td>

                <td><a href='../updateForm.php?id= <?php echo $info['id']; ?>'>
                    <i class="material-icons">autorenew</i>
                  </a></td>

                <td><a href='delete.php?id=<?php echo $info['id']; ?>'>
                    <i class="material-icons">delete</i>
                  </a></td>

              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>

</html>