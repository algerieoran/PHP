<?php

/*
Sujet :
-Afficher dans une table html (avec doctype..) la liste des contacts avec les champs nom, prénom et téléphone, et un champ suplémentaire "autres infos"   qui est un lien qui permet d'afficher les détails de chaque contact.
2- Afficher sous la table html, le détail du contact quand on clique sur son lien "autres infos".
*/

$message = '';

    // 1- Connection à la BDD :
    $pdo = new PDO('mysql:host=localhost;dbname=contacts', 
    'root',  
    '', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') 
    );

// 2- Requête SQL : On veut afficher dynamiquement les résultats de la requêtes sous forme de table HTML:

    $resultat = $pdo->query("SELECT id_contact, nom, prenom, telephone FROM contact");

    $message .= '<table border="1">';
        // La ligne d'entêtes :
        $message .= '<tr>';
            // correction " c'est pas demandé dans l'exercice ) $message .= '<th>id employés</th>';
            $message .= '<th>nom</th>';
            $message .= '<th>prénom</th>';
            $message .= '<th>telephone</th>';
            $message .= '<th>Autres infos</th>';
        $message .= '</tr>';


//3- Affichage des autres lignes :

    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $message .= '<tr>';
            //affichage des infos de chaque ligne $ligne :

            /* correction : " comme on veut pas afficher le id_contact , c'est pas pratique d'utilisé la boucle foreach ". foreach($ligne as $info) {
                $message .= '<td>' . $info . '</td>';
            }
            */
            // suite correction : -----------------------------
            $message .= '<td>' . $ligne['nom'] . '</td>';
            $message .= '<td>' . $ligne['prenom'] . '</td>';
            $message .= '<td>' . $ligne['telephone'] . '</td>';
            //-------------------------------------------------

            $message .= '<td><a href="?id_contact='. $ligne['id_contact'] .'" > autres infos </a></td>'; 
        $message .= '</tr>';
    }
   
    $message .= '</table>';
// 4. Affichage des messages :
 
   
if (isset($_GET['id_contact'])) { // si existe l'indice "id_contact " dans $_GET, c'est que cet indice est passé dans l'URL, donc que l'internaute a cliqué sur un des liens "autres infos".
    $_GET['id_contact'] = htmlspecialchars($_GET['id_contact'],ENT_QUOTES); // pour se prémunir des injections css ou js via l'URL
    $resultat = $pdo->prepare("SELECT * FROM contact WHERE id_contact = :id_contact");
    $resultat->bindParam(':id_contact', $_GET['id_contact']);
    $resultat->execute();
    
    $commentaire = $resultat->fetch(PDO::FETCH_ASSOC);  // on transforme l'objet $resultat en un array associatif $commentaire. Pas de boucle car on n'a qu'un seul résultat ici.
    // correction :---------------------------
    //print_r($commentaire);

    if (!empty($commentaire)) {

            //foreach($commentaire as $valeur) {
        //   $message .= '<p>'. $valeur .'</p>';
        //}
        //------------------------------------------

        $message .= '<p>Le nom :  '. $commentaire['nom'] . '</p>';  
        $message .= '<p> le prénom : ' . $commentaire['prenom'] . '</p>';  
        $message .= '<p> Le téléphone :  ' . $commentaire['telephone'] . '</p>';
        $message .= '<p>L\'email :  '. $commentaire['email'] . '</p>';  
        $message .= '<p> l\'année de rencontre : ' . $commentaire['annee_rencontre'] . '</p>';  
        $message .= '<p> Le type de contact :  ' . $commentaire['type_contact'] .'</p>';
            
        
    } else {
        $message .= '<p> Ce contacte n\'existe pas ! </p>';  
    } // fin du if (!empty($commentaire))

}// fin du if (isset ($_GET['id_ontact']))
   



?>

<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Liste des Contacts </title>
    </head>

    <body>


    <h1>Liste des Contacts :</h1>
    <?php  echo $message; ?>



    </body>
</html>
