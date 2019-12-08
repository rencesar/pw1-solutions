<?php

$query = DAOTrainer::read($_SESSION['login']);
$nome = $query['name'];
$gen = $query['gender'];
($gen == 'M') ? $gen = 'o' : $gen = 'a';


echo 
    "<ul>
        <li><a href='index.php'>home</a></li>
        <li><a href='pokemons.php'>pokemons</a></li>
        <li><a href='update.php'>alterar</a></li>
    </ul>
    <ul>
        <p>Bem vind${gen}, ${nome}</p>
        <li><a href='logout.php'>sair</a></li>
    </ul>";

?>
