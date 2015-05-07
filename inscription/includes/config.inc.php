<?php
// signalement des erreurs
define('LIVE', FALSE);
define('email', 'ducdeswin@outlook.com');


// reglages du niveau du site
define('BASE_URL', 'http://localhost/exoPerso/php/inscription/');
define('MYSQL', 'mysqli_connect.php');

// fuseau horaire par defaut

date_default_timezone_get('Europe/Paris');

//fonction de gestion des erreurs

function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {
    $message = "<p>An error occured in script'$e_file' on line $e_line: $e_message\n <br>";
    $message .= "Date/Time" . date('n-j-y H:i:s') . "\n<br/>";
    $message .= "<pre>" . print_r($e_vars, 1) . "</pre>\n</p>";

    if(!LIVE) {
        echo'<div class="error">' . $message . '</div><br/>';
    } else {
        mail(EMAIL, 'site Error', $message, 'From: email@example.com' );
        if($e_number != E_NOTICE){
            echo'<div class="error">A system error occured. We apologize for the incovenience.</div><br/>';
        }
    }
}

// utiliser le gestionnaire d'erreurs
set_error_handler('my_error_handler');

?>