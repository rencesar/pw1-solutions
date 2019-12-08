<?php

echo
    "<ul>
        <li><a href='index.php'>home</a></li>
        <li><a href='pokemons.php'>pokemons</a></li>
    </ul>
    <div>
        <form action='logic.php' method='post'>
            <div>
                <input id='' name='login' type='text' placeholder='email'>
            </div>
            <div>
                <input id='' name='password' type='password' placeholder='password'>
            </div>
            <button>entrar</button>
        </form>
        <a href='signup.php'>cadastrar-se</a>
    </div>";

?>