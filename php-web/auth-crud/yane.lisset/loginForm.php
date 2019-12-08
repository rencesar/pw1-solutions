<?php
require_once("crud.php");

    $usernameError = null;
    $passwordError = null;

    if(isset($_POST['username'])) {
        $username = $_POST['username'];
    }
    if(isset($_POST['password'])) {
        $password = $_POST['password'];

        // validate input
        $valid = true;
        if (empty($username)) {
            $usernameError = 'Informe um usuario!';
            $valid = false;
        }

        if (empty($password)) {
            $passwordError = 'Informe uma senha!';
            $valid = false;
        }
    }
?>
<div>
    <h4>Login:</h4>
</div>
<form class="form-horizontal" action="home.php" method="post">
    <div class="control-group <?php echo !empty($usernameError)?'error':'';?>">
        <label class="control-label">Username</label>
        <div class="controls">
            <input name="username" type="text"  placeholder="Username" value="<?php echo !empty($username)?$username:'';?>">
            <?php if (!empty($usernameError)): ?>
                <span class="help-inline"><?php echo $usernameError;?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
        <label class="control-label">Password</label>
        <div class="controls">
            <input name="password" type="password" placeholder="password" value="<?php echo !empty($password)?$password:'';?>">
            <?php if (!empty($passwordError)): ?>
                <span class="help-inline"><?php echo $passwordError;?></span>
            <?php endif;?>
        </div>
    </div>
    <div class="form-actions" style="background: none";>
        <input type="hidden" name="login" value="true">
        <button type="submit" class="btn btn-success" style="background:#4679a6">Login</button>
    </div>
</form>