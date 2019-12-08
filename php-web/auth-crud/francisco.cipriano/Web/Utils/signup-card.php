<?php

function createCard($val, $src) : string {
    $html = 
    "<div id='$val' class='poke-min-card' style='border: none;'>
        <img src='$src' />
    </div>";

    return $html;
}

?>