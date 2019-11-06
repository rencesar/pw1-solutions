<?php include("utils/config.php");?>
<?php
    session_start();
    if ($_SESSION['auth']){
        header('location: home.php');
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;
        echo $password;
        echo $username;
        
        if($username && $password) {
            // Check on database
            $_SESSION['auth'] = true;
            header('location: home.php');
        }
    }


?>

<?php include('templates/header.php') ?>
<?php include('templates/navegation.php') ?>

<div class="container">
    <form class="form-signin" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="usernameInput" class="sr-only">Username</label>
        <input type="text" name="username" id="usernameInput" class="form-control" placeholder="Username" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>


</body>
</div>

<?php include('templates/footer.php') ?>