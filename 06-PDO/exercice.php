<?php

echo '<h1> Les commerciaux et leur salaire</h1>';

/* Exercice :
    - afficher dans une liste <ul><li> le prénom, le nom et le salaire des employés appartenant au service commercial (un <li> par commercial), en utilisant une requête préparée.
    - afficher le nombre de commerciaux.
*/

// Connexion à la BDD :

$pdo = new PDO('mysql:host=localhost;dbname=entreprise',  // driver mysql : serveur ; nom de la BDD
'root',  // pseudo de la BDD
'',  // mot de passe de la BDD
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  // option 1 : pour afficher les erreurs SQL
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')  // option 2 : définit le jeu de caractères des échanges avec la BDD
);

// On fait la requête :

$service = 'commercial';

$employe = $pdo->prepare("SELECT prenom, nom, salaire FROM employes WHERE service = :service"); 
$employe->bindParam(':service', $service); 
$employe->execute();

echo '<ul>';
while($donnees = $employe->fetch(PDO::FETCH_ASSOC)) {
        echo '<li>';
            echo $donnees['prenom'] . ' ' . $donnees['nom'] . ' ' . $donnees['salaire'] . '€';
        echo '</li>';
}
echo '</ul>';

echo 'Nombre de commerciaux : ' . $employe->rowCount() . '<br>';


//---------------
// Version table HTML :
$employe->execute();

echo '<table border="1">';
    // les entêtes :
    echo '<tr>';
        echo '<th>Prénom</th>';
        echo '<th>Nom</th>';
        echo '<th>Salaire</th>';
    echo '</tr>';

     // Affichage des autres lignes :
     while($donnees = $employe->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
            echo '<td>' . $donnees['prenom'] . '</td>';
            echo '<td>' . $donnees['nom'] . '</td>';
            echo '<td>' . $donnees['salaire'] . ' €</td>';
        echo '</tr>';
    }
echo '</table>';





