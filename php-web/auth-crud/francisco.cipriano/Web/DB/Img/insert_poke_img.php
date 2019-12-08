<?php

include('../database.php');
include('../DAOPokemon.php');

$pokemons = file_get_contents("pokemons.json");
$arr = json_decode($pokemons, true);

$connection = connect();

foreach($arr as $poke) {

    $pointer = $poke['id'];

    if (strlen($pointer) < 3) $pointer = str_pad($pointer, 3, "0", STR_PAD_LEFT);
    $max = './max/'.$pointer.'.png';
    $max_data = file_get_contents($max);
    $max_escaped = bin2hex($max_data);

    $gray = './gray/'.$poke['id'].'.png';
    $gray_data = file_get_contents($gray);
    $gray_escaped = bin2hex($gray_data);

    $min = './min/'.$poke['id'].'.png';
    $data = file_get_contents($min);
    $min_escaped = bin2hex($data);

    echo $poke['id'], $poke['nome'], $poke['hp'], $poke['ataque'], $poke['defesa'], $poke['spAtaque'], $poke['spDefesa'], $poke['velocidade'];
    echo '<br />';

    DAOPokemon::create($poke['id'], $poke['nome'], $poke['hp'], $poke['ataque'], $poke['defesa'], $poke['spAtaque'], $poke['spDefesa'], $poke['velocidade'], $min_escaped, $max_escaped, $gray_escaped);
}

echo "Okay";

?>

