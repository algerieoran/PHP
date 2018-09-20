<?php

// Sujet :
/* Vous créez un tableau PHP contenant les pays suivants :
-France
-Italie
-Espagne
-Inconnu
-Allemagne

Vous leur associer les valeurs suivantes :
-Paris
-Rome
-Madrid
-'?'
-Berlin

Vous parcourez ce tableau pour afficher la phrase " La capitale x se setue en y " dans un <p>, où x remplace la capitale et y le pays.

Pour le pays "inconnu", vous afficherez " La capitale de inconnu n'existe pas !" à la place de la phrase présédente.

*/ 

// creation d'un tableau php qui contient les pays associés avec les valeurs suivantes :
$liste = array(
    'France' => 'Paris',
    'Italie' => 'Rome',
    'Espagne' => 'Madrid',
    'Inconnu' => '?',
    'Allmagne'=> 'Berlin'
);


// AFFICHAGE :
foreach($liste as $ind => $val) {
    if ($val == '?') {
        echo '<h3>'.'La capitale de ' . $ind . ' n\'existe pas !'.'</h3>';
  
    } else {
        echo '<p>'.'La capitale ' . $val . ' se setue en '.$ind .'.</p>';
    }
  }
  
  
 //---------------------------------------------------------------------------------
    