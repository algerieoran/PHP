<?php

// Exercice :

/* 
Créer un formulaire avec les champs ville et code postal, et une zone de texte adresse.

Vous envoyez les données saisies par l'internaute dans exercice-traitement.php.

Vous y affichez ces saisies en précisant l'étiquette correspondante.

*/
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Formulaire</title>
    </head>
    <body>
        <h1>Formulaire</h1>

        <form action="exercice_traitement.php" method="post">

            <div>
                <label for="ville" >Ville</label>
                <input type="text" name="ville" id="ville" value="">
            </div>

            <div>
                <label for="codepostal" >Le code POstal</label>
                <input type="text" name="codepostal" id="codepostal" value="">
            </div>

            <div>
                <label for="adresse" >L'adresse</label>
                <input type="text" name="adresse" id="adresse" value="">
            </div>
            <div>
                <input type="submit" name="validation" value="envoyer">
            </div>

        </form>
        
    </body>
</html>