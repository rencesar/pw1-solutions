<?php

function createCard($val, $src, $poke) : string {
    $html = 
    "<div id='$val' class='poke-max-card'>
        <img src='$src' />
        <div class='name'>{$poke['name']}</div>
        <div class='pokeid'>#{$poke['id_pokemon']}</div>
        <ul class='status'>
            <li>HP: {$poke['hp']}</li>
            <li>Att: {$poke['ataque']}</li>
            <li>Def: {$poke['defesa']}</li>
            <li>Sp. Att: {$poke['spataque']}</li>
            <li>Sp. Def: {$poke['spdefesa']}</li>
            <li>Vel: {$poke['velocidade']}</li>
        </ul>
    </div>";

    return $html;
}

?>