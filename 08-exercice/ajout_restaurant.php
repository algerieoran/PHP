<?php

/*
Sujet :
1- créer une BDD "restaurants" avec une table "restaurant" :
id_restaurant  PK AI INT (3)
nom            VARCHAR (100)
adresse           VARCHAR (255)
telephone           VARCHAR (10)
type           ENUM ('gastronomique', 'brasserie', 'pizzeria', 'autre')
note           INT (1)
avis            text 



2- Créer un formulaure HTML (avec doctype...) afin d'ajouter un restaurant en BDD. Les champs type et note (de 1 à 5) sont des menus déroulants.

3- Effectuer les vérifications nécéssaires :
    le champ nom contient 2 caractères minimum
    le champ adresse ne doit pas etre vide
    le téléphone doit contenir 10 chiffres 
    le type doit être conforme  à la liste des types de la BDD 
    la note est un nombre entier entre 0 et 5
    l'avis ne doit pas etre vide 


    En cas d'erreur de saieie, afficher un message au-dessus du formulaire 
     
    4- Ajouter un ou plusieurs réstaurants à la BDD et afficher un message de succès ou d'écheque l'ors dee l'enregistrement.
    */

    print_r($_POST);

    //- Effectuer les vérifications nécéssaires :
        $message = '';
        // 1- Connection à la BDD :
        $pdo = new PDO('mysql:host=localhost;dbname=restaurants', 
        'root',  
        '', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') 
        );


        // 2- Traitement du formulaire :
                if(!empty($_POST)) {  // si "$_POST" est rempli c'est que le formulaire a été soumis.

                    if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 100) $message .= '<div>Le nom doit comporter entre 2 et 100 caractères.</div>';
                    if (!isset($_POST['adresse']) || empty($_POST['adresse']) ||  strlen($_POST['adresse']) > 255) $message .= '<div>Le champ d\'adresse ne doit pas être vide.</div>';
                    if (!isset($_POST['telephone']) || strlen($_POST['telephone']) != 10 || !ctype_digit($_POST['telephone'])) $message .= '<div>Le numéro telephone est invalide !</div>';
                    if (!isset($_POST['type']) || ($_POST['type'] != 'gastronomique' && $_POST['type'] != 'pezziria' && $_POST['type'] != 'autre' && $_POST['type'] != 'brasserie')) $message .= '<div>Type de restaurant est invalide.</div>';
                    if (!isset($_POST['note']) || ($_POST['note'] != '1' && $_POST['note'] != '2' && $_POST['note'] != '3' && $_POST['note'] != '4' && $_POST['note'] != '5')) $message .= '<div>La note est invalide.</div>';
                    if (!isset($_POST['avis']) || empty($_POST['avis'])) $message .= '<div>Le champ d \'avis ne doit pas être vide.</div>';

        
        // 3-Insertion en BDD si il n'y a pas de message d'erreur :
        if(empty($message)) {  // si $message est vide c'est qu'il n'y a pas d'erreur.


            // On échappe toutes les valeurs de $_POST :
            foreach($_POST as $indice => $valeur) {
                $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
            }
    
    

            // On fait une requêtte préparer :
            $result = $pdo->prepare("INSERT INTO contact (nom, adresse, telephone, type, note, avis) VALUES (:nom, :adresse, :telephone, :type, :note, :avis)");
    // à completer !!
            $result->bindParam(':prenom',$_POST['prenom']);
            $result->bindParam(':nom',$_POST['nom']);
            $result->bindParam(':telephone',$_POST['telephone']);
            $result->bindParam(':annee_rencontre',$_POST['annee_rencontre']);
            $result->bindParam(':type_contact',$_POST['type_contact']);
            $result->bindParam(':email',$_POST['email']);
    
    
            $req=$result->execute();  // la méthode execute() renvoie un booléen selon que  la requêtte a marché (true) ou pas (false)
    
            //Afficher un message de réussite ou d'echec :
            if ($req) { 
                $message .= '<div class="green">Le contact a bien été ajouté</div>';
            } else {
                $message .= '<div class="red">Une érreue est survenue lors de l\'enregistrement.</div>';
            }

        }//fin if (!empty($message))

            } // fin du if(!empty($_POST))

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ajout Restaurant</title>
    </head>
    <body>
        <h1>Ajout Restaurant :</h1>
        <?php echo $message; ?>
           

        <form method="post" action="">

            <div>
                <label for="nom">Nom</label><br>
                <input type="text" id="nom" name="nom" value="">
            </div>

            <div>
                <label for="adresse">Adresse</label><br>
                <input type="text" id="adresse" name="adresse" value="">
            </div>

            <div>
                <label for="telephone">Téléphone</label><br>
                <input type="text" id="telephone" name="telephone" value="">
            </div>

            <div>
                <label>Type </label><br>
                <select name="type" id="type">
                <option value="gastronomique">Gastronomique</option>
                <option value="brasserie">Brasserie</option>
                <option value="pezziria">Pézziria</option>
                <option value="autre">Autre</option>
                </select><br><br>
            </div>

            <div>
                <label>Note </label><br>
                <select name="note" id="note">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                </select><br><br>
            </div>

            <div>
                <label for="avis">Avis</label><br>
                <textarea name="avis" id="avis"></textarea>
            </div>

            <div>
                <input type="submit" value="ajouter">
            </div>

        </form>
            
    </body>
</html>