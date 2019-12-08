<?php
    require_once('crud.php'); 
    session_start();
    $banco = new Conexaocrud();  

  
    
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
                <h3>editar playlist</h3>

            </div>
            <?php 
                    $banco = new Conexaocrud();
                    $w= $banco->read($_get['id']);
               
                    ?>
            <form class="form-horizontal" action="update.php" method="post">
            <div class="control-group">
                    <label class="control-label">id</label>
                    <div class="controls">
                        <input name="id" type="text" placeholder="id" value="<?php echo $_GET['id']; ?>"readonly>
                       
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Banda</label>
                    <div class="controls">
                        <input name="name" type="text" placeholder="banda" value="<?php echo $w['name']?>">
                        <?php if (!empty($bandError)): ?>
                        <span class="help-inline"></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Musica</label>
                    <div class="controls">
                        <input name="music" type="text" placeholder="musica" value="<?php echo $w['music']; ?>">
                        <?php if (!empty($musicError)): ?>
                        <span class="help-inline"><?php echo $musicError;?></span>
                        <?php endif; ?>
                    </div>
                </div>
               
                <div class="form-actions" style="background: none;border-top: none;">
                    <button type="submit" class="btn btn-success" style="background: #e87d2bf2;">atualizar</button>
                </div>
            </form>
        </div>

    </div> 
</body>

</html>