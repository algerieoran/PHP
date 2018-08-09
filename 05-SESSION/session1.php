<?php

//------------------------------
// La superglobal $_SESSION :
//------------------------------
/* Un fichier temporaire appelé "session" est créé sur le seveur avec un identifiant unique. Cette session est liée à un seul internaute car dans le même temps, un cookie est déposé sur le poste de l'internaute avec l'identifiant. Ce cookie se détruit lorsqu'on quitte le navigateur.

Le fichier session peut contenir toutes sortes d'informations, y compris sensible, car il n'est pas accéssible par l'internaute, donc pas modifiable. On y stocke par exemple des données de login, ou les infos d'un panier d'achat.

Tous les sites qui fonctionnent sur le principe de connexion (votre site bancaire) ou ceux qui ont besoin de suivre un internaute de page en page (par exemple conserver son panier) utilisent les sessions.

les données stockés dans une session sont accssicible et modifiable à partie de la superglobal $_SESSION

*/

// Création d'une nouvelle session ou ouverture d'une session existante :
session_start();   //permet de créer un fichier de session OU de l'ouvrir si il existe déjà. session_start() s'occupe aussi de la gestion des cookies relatifs aux sessions.

// Remplir une session :
$_SESSION['pseudo'] = 'JohnDoe';
$_SESSION['mdp'] = '1234';    // la superglobale $_SESSION étant un array, on accède à ses informations comme dans n'importe quel tableau en utilisant des crochets "[]"

echo '1- La session apès remplissage ;';
var_dump($_SESSION);

// on peut visualiser le contenu de la session physique dans exampp/tmp.

// Vider une partie de la session :
unset($_SESSION['mdp']);   // unset() permet de supprimer une partie de ma sesseion, ici supprime l'indice "mdp"

echo '<br> 2- La session apès suppression du mdp : <br>';
var_dump($_SESSION);


// Supprimer entierment une session :
//session_destroy();

echo '<br> 3- La sesssion apès supression : <br>';
var_dump($_SESSION);   // nous voyons encore le contenu de la session ici. En effet, il faut s'avoir que session_destroy() est d'abord lu par l'interpreteur, puis exécuter réellemnet qu' à la toute fin du script : pour le voir, vérifier le dossier xampp/tmp/ où la session n'existe plus.

// Les sessions ont avantage d'etre disponibles partout sur le site, et donc dans tous les scripts (voir session2.php).












?>