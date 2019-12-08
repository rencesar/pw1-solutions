<?php
include('Templates/Header.php');
include('Utils/pokemons-card.php');
?>
<main>
    <div class='cards'>
        <?php        

        foreach(range(1, 151) as $id) {
            
            $src = DAOImage::get_max_img($id);
            $poke = DAOPokemon::read($id);
            // var_dump($poke);
            print(createCard($id, $src, $poke));
        }
        ?>
    </div>
</main>
<?php
include('Templates/Footer.php')
?>
