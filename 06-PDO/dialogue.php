<?php
//-----------------
// Cas pratique : espace de commentaires
//-----------------

// Objectif : créer un formulaire pour poster des commentaires et le sécuriser.


/* Créer une BDD : dialogue
   Table         : commentaire
   Champs        : id_commentaire       INT(3) PK - AI
                   pseudo               VARCHAR(20)
                   message              TEXT
                   date_enregistrement  DATETIME 
*/
// II. Connection à la BDD et le traitement de $_POST :
$pdo = new PDO('mysql:host=localhost;dbname=dialogue',
'root',
'', 
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') 
);

//print_r($_POST);

if (!empty($_POST)) {  // signifie si le formulaire est remply"not empty"
    //Traitement contre les afailles js (xss) ou  les failles css : on parle d'echappement des données reçue :

    // on commence par mettre du code css dans le champs "message" : <style> body {display:none}</style>
    // pour s'en prémunir :
    $_POST['pseudo'] = htmlspecialchars($_POST['pseudo'],ENT_QUOTES);  // convertit les caractères spéciaux (<, >, &, "", '') en entités HTML (exemple : le < devient &lt;) ce qui permet de rendre inoffensives les balises HTML. On parle d'échappement des données reçues.
    $_POST['message'] = htmlspecialchars($_POST['message'],ENT_QUOTES);
    







    // Insertion du commentaire de l'internaute en BDD : nous allons faire une premiere requêtte qui n'est pas protégée contre les injections et qui n'accepte pas les apostrophes :

    //$resultat = $pdo->query("INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]')");


    // Nous faisons l'injection SQL  suivante dans le champs "message" :    ok');DELETE FROM commentaire;(
    // pour se prémunir des injection SQL , nous faisons des requêttes préparées. Par ailleurs, elle permettra la saisie d'apstrophes par l'internaute :
    $resultat = $pdo->prepare("INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES (:pseudo, NOW(), :message)"); 
    $resultat->bindParam(':pseudo', $_POST['pseudo']);
    $resultat->bindParam(':message', $_POST['message']);

    $resultat->execute();


    //Comment ça marche ? le fait de mettre des marqueurs dans la requêtte permet de ne pas concaténer les instructions SQL avec l'injection SQL. Par ailleurs, on faisons un bindParam, les instructions SQL sont dissociées les unes des autres et neutralisées par PDO qui les transforment en strings inoffensifs. En effet, le SGBD attends des valeurs à la place des marqueurs dont il sait qu'elles ne sont pas du code à exécuter.

}




?>
<!-- I . formulaire de saisie des messages -->
<h1> Votre message </h1>
<form method="post" action="">

    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value="<?php echo $_POST['pseudo']?? ''; ?>"><br><!-- l-oppérateur "??"en php7 signifie "prend le premier qui existe". Ici on affiche donc $_POST['pseudo'] s'il existe, sinon un string vide -->

    <label for="message">Message</label><br>
    <textarea id="message" name="message"><?php echo $_POST['pseudo']?? ''; ?></textarea><br>

    <input type="submit" name="envoi" value="envoyer">

</form>

<?php
// III. Affichage des messages :
$resultat = $pdo->query("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d/%m/%Y') AS datefr, DATE_FORMAT(date_enregistrement, '%H:%i:%s') AS heurefr FROM commentaire ORDER BY date_enregistrement DESC");

echo '<h2>' . $resultat->rowCount() . 'commentaires</h2>';

while ($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)) {
   // var_dump($commentaire);
   echo '<p>Par '. $commentaire['pseudo'] . ' le ' . $commentaire['datefr'] . ' à ' . $commentaire['heurefr'] . '</p>';
   echo '<p>' . $commentaire['message'] . '</p><hr>';
}


// Conclusion : faire systématiquement sur données reçues : 1 htmlspecialchars() et une requêtte préparée
?>
