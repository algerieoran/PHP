<?php

// Exercice :

/* 
Créer un formulaire avec les champs ville et code postal, et une zone de texte adresse.

Vous envoyez les données saisies par l'internaute dans exercice-traitement.php.

Vous y affichez ces saisies en précisant l'étiquette correspondante.

*/

$message = '';

//var_dump ($_POST);

if (!empty($_POST)) {   // est equivalent à if ($_POST) : signifie que $_POST n'est pas vide, donc que le formulaire a été soumis
    $message = "<p>La ville : $_POST[ville] </p>";
    $message .= "<p>Le code postal : $_POST[codepostal] </p>";
    $message .= "<p>L'adresse : $_POST[adresse] </p>";

}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Votre Formulaire</title>
    </head>
    <body>
        <h1>Vous avez indiqué :</h1>
        <?php echo $message; ?>
        
    </body>
</html>