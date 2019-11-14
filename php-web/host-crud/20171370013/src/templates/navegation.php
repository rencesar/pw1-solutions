<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Renato's CRUD</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Criar</a>
        <a class="p-2 text-dark" href="#">Listar</a>
    </nav>
    <?php 
        require_once('utils/auth.php');

        if($logged_user) {
            echo '<span class="btn mr-md-3">'.$logged_user->username.'</span>
            <a class="btn btn-outline-primary mr-md-3" href="./sair.php">Sair</a>';
        } else {
            echo '<a class="btn btn-outline-primary mr-md-3" href="./register.php">Registrar</a>
            <a class="btn btn-outline-primary" href="./login.php">Login</a>';
        }
    ?>
    
</div>