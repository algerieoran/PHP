<?php

// Exercice :
/*
    1- Vous créez une page "profile" qui affiche un nom et un prénom.
    2- Vous y ajoutez un lien en GET "modifier mon profile" et un second "suprimer mon profile".
    Ces liens passent dans l'url à la page exercice.php elle-même que l'on cliqué sur le lien "modifier mon profile" ou sur le lien " supprimer mon profile". Pensez qu'il faut un indice et une valeur pour chaque action.

    3- Si on a cliqué sur le lien "modifier mon profile", c'est-à-dire que avez reçu cette info en GET, vous afficher le message "Vous avez  demandé la modification de votre profile", et si c'est la suppression qui est demandée, vous afficher le message " Vous avez demandé la suppression de votre profile" 
 */


 $message = '';   // variable pour contenir les message pour l'internaute

 //var_dump($_GET); 

if (isset($_GET['action'])&& $_GET['action'] == 'modifier') {  // il faut vérifier d'abord l'existence de l'indice "action" dans $_GET AVANT d'en vérifier la valeur
    $message = '<p> Vous avez demandé de modifier votre profile. ' .  '</p>';
} 

if (isset($_GET['action'])&& $_GET['action'] == 'supprimer') {
    $message = '<p> Vous avez demandé de supprimer votre profile. ' . '</p>';
} 

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Profile</title>
    </head>
    <body>

        <h1>Profile</h1>

        <?php echo $message; ?>
        
        <p>Nom : Belal</p>
        <p>Prenom : Souad</p>

        <a href="exercice.php?action=modifier">modifier mon profile</a><br>
        <a href="exercice.php?action=supprimer">suprimer mon profile</a><br>
        
    </body>
</html>

