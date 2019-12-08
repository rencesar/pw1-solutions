<?php
 
    require_once 'crud.php';
    $banco = new Conexaocrud();
   

    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $musicError = null;
        $valid = true;

        // keep track post values
        $name = $_POST['name'];
        $music = $_POST['music'];
        $banco = new Conexaocrud();
    $banco->create($name,$music);
    }
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Criar banda/musica</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Banda</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="banda/cantor(a)" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo  $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($musicError)?'error':'';?>">
                        <label class="control-label">Música</label>
                        <div class="controls">
                            <input name="music" type="text" placeholder="música" value="<?php echo !empty($password)?$password:'';?>">
                            <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $musicError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">criar</button>
                          <a class="btn btn-default" href="home.php">voltar</a>
                        </div>
                    </form>
                </div>
    </div>
  </body>
</html>
