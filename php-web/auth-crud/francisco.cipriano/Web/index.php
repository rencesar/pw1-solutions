<?php
include('Templates/Header.php');
include('Utils/index-card-trainer.php');
?>
<main>
    <p> cadastrados </p>
    <br/>
    <div class="cards">
        <?php        
        foreach(DAOTrainer::readAll() as $val) {
            $pokeids = DAOPokeTrainer::read($val['id_trainer']);
            print(createCard($val, $pokeids));
        }
        ?>
    </div>
</main>
<?php
include('Templates/Footer.php')
?>


 