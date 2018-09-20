<?php

/* Sujet :
    -Créez une fonction qui permet de convertir une date FR en date US, ou inversement.
    cette fonction prend 2 paramètres : une date et le format de conversion "US" ou "FR".

    Vous validez que le paramètre format de sotie est bien "US" ou "FR". La fonction retourne un message si ce n'est pas le cas.
*/

// Préambule à l'exercice :

$aujourdhui = date('d-m-Y');  // donne la date du jour au format indiqué
echo $aujourdhui . '<br>';

// ------------------
//Convertir une date d'un format vers un autre :
$date ='2018-08-24';
echo 'La date au format US : '. $date .'<br>';


echo 'La date au format FR : '. $objetDate->format('d-m-Y');  // la méthode format() permet de convertir un objet date selon le format indiqué

echo '<hr>';

// Votre Exercice :

function formaterDate ($date, $format) {
    $objetDate = new DateTime($date);

    if ($format == 'FR'){

        return $objetDate->format('d-m-Y'); 

    } elseif ($format == 'US'){

        return $objetDate->format('Y-m-d'); 

    } elseif ($format !== 'FR' && $date !== 'US'){

        echo 'Erreur de format de date !!';
    }

}

echo formaterDate ('2018-08-29', 'FR');

echo '<hr>';

// Correction : 


    function afficheDate ($date, $format) {

        //Vérifier la valeur du paramètre $format :
            if ($format != 'FR' && $format != 'US'){
                return 'Erreur de format de date !';
            }
        // une fois le(s) paramètres(s) validés, on fait le traitement :
        
        if ($format == 'US'){

        $objetDate = new DateTime($date);
        return 'La date au format US : '. $objetDate->format('Y-m-d'); 

        } else {

            $objetDate = new DateTime($date);
            return 'La date au format FR : '. $objetDate->format('d-m-Y');

        }

    }

echo afficheDate ('29-08-2018', 'US');
echo'<br>';
echo afficheDate ('2018-08-29', 'FR');
echo'<br>';
echo afficheDate ('2018-08-29', 'XX');
echo'<br>';


