<?php

//Exercice :
 /*Vous allez créer la page de getion des membres dans le back-office :
 1- Seul les admins ont accés à cette page. Les autres sont redirigés vers connexion.php.
 2- Afficher dans cette page tous les membres inscrits sous forme de table html, avec toutes les infos SAUF le mot de passe.
 3- Afficher le nombre de membres.
*/
require_once '../inc/init.inc.php';

// 1- On vérifie si membre est admin :
    if(!internauteEstConnecteEtAdmin()) {
        header('location:../connexion.php');   // si pas admin, on le redirige vers la page de connexion
        exit();
}

// 2- Affichage des membres inscrits sous forme de table html, avec toutes les infos sauf le mot de passe :

    $resultat = $pdo->query("SELECT id_membre, pseudo, nom, prenom, email, civilite, ville, code_postal, adresse, statut FROM membre");  

    $contenu .= '<p> Nombre de membres est de :   ' . $resultat->rowCount() . '</p>';
    $contenu .= '<table border="1">';
    // La ligne d'entêtes :
    $contenu .= '<tr>';

        $contenu .= '<th>id produit</th>';
        $contenu .= '<th>pseudo</th>';
        $contenu .= '<th>nom</th>';
        $contenu .= '<th>prenom</th>';
        $contenu .= '<th>email</th>';
        $contenu .= '<th>civilité</th>';
        $contenu .= '<th>ville</th>';
        $contenu .= '<th>code_postal</th>';
        $contenu .= '<th>adresse</th>';
        $contenu .= '<th>statut</th>';

    $contenu .= '</tr>';

    // Affichage des autres lignes :

    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        //debug($ligne);

        $contenu .= '<tr>';
            //affichage des infos de chaque ligne $ligne :
            foreach($ligne as $indice => $val) {

                $contenu .= '<td>' . $val . '</td>';
                
              }

        $contenu .= '</tr>';

    }
$contenu .= '</table>';

//debug($contenu);

//---------------------------------AFFICHAGE / ------------------------------------------------------
require_once '../inc/haut.inc.php';
?>

 <h1 class="mt-4">Gestion des membres </h1>




<?php
echo $contenu;
require_once '../inc/bas.inc.php';
