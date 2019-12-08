<?php

function createCard($arr, $pokeids) : string {
    $html = 
    "<div class='index-card-trainer'>
        <div>$arr[name]</div>
        <div>$arr[gender]</div>
        <div>$arr[email]</div>
        <form action='logic.php' method='post'>
            <button name='email-delete' value='$arr[email]' class='index-card-trainer-button'>x</button>
        </form>"
    ;

    $html .= "<div class='index-card-min-poke'>";


    foreach($pokeids as $pokeid) {
        $src = DAOImage::get_min_img($pokeid['id_pokemon']);
        $html .= "<div>
                    <img src='$src' />
                </div>";
    }
    $html .= "</div>";


    $html .= "</div>";

    return $html;
}

?>