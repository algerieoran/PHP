<?php

//1/---------------------------fonction de debug------------------------------------

function debug($param) {
    echo '<pre>';
    print_r($param);
    echo '</pre>';
}


//2/--------------------------fonction membres--------------------------------------

    // Fonction qui indique si l'internaute est connécté :
    function internauteEstConnecte() {
        if(isset($_SESSION['membre'])) {  // si la session "membre" existe, c'est que l'internaute est passé par la page de connexion et nous avons créé cet indice dans $_SESSION
            return true;
        } else {
            return false;
        }
        // OU :
        return(isset($_SESSION['membre']));
    }