<?php
include('Templates/Header.php');
include('Utils/signup-card.php');
?>
<main>
    <form class='signup-form' action="logic.php" method="post">
        <div>
            <label for="name">Name: </label>
            <br />
            <input id="" name="name-create" type="text">
        </div>
        <div>
            <label for="gender">Gênero: </label>
            <br />
            <input id="" name="gender-create" type="text">
        </div>
        <div>
            <label for="email">E-mail: </label>
            <br />
            <input id="" name="email-create" type="text">
        </div>
        <div>
            <label for="password">Password: </label>
            <br />
            <input id="" name="password-create" type="text">
        </div>
        <div>
            <label for="password">IDs: </label>
            <br />
            <input id="poke-card-ids" name="poke-card-ids" type="text" >
        </div>
        <button onclick="">enviar</button>
    </form>
    <div>
        <h2> Escolha seis : </h2>
        <br />
        <div class='cards'>
            <?php        
            foreach(range(1, 151) as $val) {
                $src = DAOImage::get_min_img($val);
                print(createCard($val, $src));
            }
            ?>
        </div>
    </div>
</main>
<?php
include('Templates/Footer.php')
?>