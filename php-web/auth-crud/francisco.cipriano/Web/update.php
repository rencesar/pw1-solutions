<?php
include('Templates/Header.php');

if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {
    $query = DAOTrainer::read($_SESSION['login']);

    $name = $query['name'];
    $gender = $query['gender'];
    $email = $query['email'];

    $html = 
    "<main>
        <form class='signup-form' action='logic.php' method='post'>
            <div>
                <label for='name'>Name: </label>
                <br />
                <input id='' name='name-update' type='text' value='$name'>
            </div>
            <div>
                <label for='gender'>Gênero: </label>
                <br />
                <input id='' name='gender-update' type='text' value='$gender'>
            </div>
            <div>
                <label for='email'>E-mail: </label>
                <br />
                <input id='' name='email-update' type='text' value='$email'>
            </div>
            <button onclick=''>enviar</button>
        </form>
    </main>
    </body>
    </html>";

    echo $html;

} else {
    header("Location: index.php");
}

?>
