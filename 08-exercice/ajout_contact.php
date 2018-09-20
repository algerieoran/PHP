
<?php
/*
1- Créer une base de donnée "contacts" avec une table "contact" :

       id_ contact     PK AI INT(3)
       nom             VARCHAR(20)
       prenom          VARCHAR(20)
       telephone       VARCHAR(10)
       annee_rencontre YEAR
       email           VARCHAR(255)
       type_contact    ENUM('ami', 'famille','professionnel', 'autre').  

2- Créer un formulaire HTML (avec Doctype ... ) afin d'ajouter des contacts dans la BDD.
     Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.  
     
3- Sur le formulaire, effectuer les contrôles nécessaires :
       -les champs nom et prénom contiennent 2 caractères minimum
       -le champs téléphone contient 10 chiffres
       -l'année de rencontre doit être une année valide
       -le type de contact doit être conforme à la liste des contacts
       -l'email doit être visible   

En cas d'erreur de saisie, afficher les messages d'erreur au-dessus du formulaire.
       
4- Ajouter les contacts à la BDD et afficher un message en cas de succés ou en cas d'échec.

   */


   // Mon travail :

   //Créer un formulaire HTML (avec Doctype ... ) afin d'ajouter des contacts dans la BDD :

    $message = '';  // pour afficher les messages à l'internaute

    /*correction 01 :---------------------------------------------------------------------------------------
    echo '<pre>';
    print_r($_POST);
    echo '<pre>';
    --------------------------------------------------------------------------------------------------------
    */

    // 2- Connection à la BDD :
        $pdo = new PDO('mysql:host=localhost;dbname=contacts', 
        'root',  
        '', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') 
        );


    // 3- Traitement du formulaire :
        if(!empty($_POST)) {  // si "$_POST" est rempli c'est que le formulaire a été soumis.

        // Contrôles sur le formulaire :
        
        if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) $message .= '<div>Le nom doit comporter entre 2 et 20 caractères.</div>'; // on verifie si l'indice "prenom" existe bien, s'il n'existe pas on met un message à l'internaute . On vérifie aussi sa longeur qui doit être comprise entre 3 et 20 caractères.

        if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) $message .= '<div>Le prénom doit comporter entre 2 et 20 caractères.</div>'; 

        if (!isset($_POST['telephone']) || strlen($_POST['telephone']) != 10 || !ctype_digit($_POST['telephone'])) $message .= '<div>Le numéro telephone est invalide !</div>';

        if (!isset($_POST['annee_rencontre']) || !ctype_digit($_POST['annee_rencontre']) || $_POST['annee_rencontre'] < (date('Y')-100) || $_POST['annee_rencontre'] > date('Y')) $message .= '<div>L\'année de rencotre est invalide !</div>';  

        /* correction 03 : OU :---------------------------------------------------------------------------------------------------------------------------------
        on réutilise la fonction utilisateur validateDate() :

        function validateDate($date, $format ='d-m-Y') {  
        
            $d = DateTime::createFromFormat($format, $date);  

            if ($d && $d->format($format) == $date) {  
                 return true;
            }else {
                 return false;
             }

        }

        if (!isset($_POST['annee_rencontre']) || !validateDate($_POST['annee_rencontre'], 'Y')) $message .= '<div>L\'année de rencotre est invalide !</div>';  
        --------------------------------------------------------------------------------------------------------------------------------------------------------
        */

        if (!isset($_POST['type_contact']) || ($_POST['type_contact'] != 'ami' && $_POST['type_contact'] != 'famille' && $_POST['type_contact'] != 'profesionnel' && $_POST['type_contact'] != 'autre')) $message .= '<div>Type de contact est invalide.</div>';

        if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $message .= '<div class="bg-danger">le Email est incorrecte.</div>'; // fonction aussi pour valider les URL. 



    // 4-Insertion en BDD si il n'y a pas de message d'erreur :
        if(empty($message)) {  // si $message est vide c'est qu'il n'y a pas d'erreur.


            // On échappe toutes les valeurs de $_POST :
            foreach($_POST as $indice => $valeur) {
                $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
            }
    
    

            // On fait une requêtte préparer :
            $result = $pdo->prepare("INSERT INTO contact (nom, prenom, telephone, annee_rencontre, type_contact, email) VALUES (:nom, :prenom, :telephone, :annee_rencontre, :type_contact, :email)");
    
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

    }// fin if (!empty($_POST))

         

           

    ?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>contacts</title>
        <style>
        .green {
            background: green;
        }

        .red {
            background: red;
        }
        </style>
    </head>
    <body>
    <div>
    
        <!-- 1- Création du formulaire :  -->

        <?php echo $message; ?>

        <h1>Formulaire des contacts :</h1>


        <form method="post" action="">

        <div>
            <input type="hidden" id="id_ contact" name="id_ contact" value="0">
        </div>

        <div>
            <label for="nom">Nom</label><br>
            <input type="text" id="nom" name="nom" value="">
        </div>

        <div>
            <label for="prenom">Prénom</label><br>
            <input type="text" id="prenom" name="prenom" value="">
        </div>

        <div>
            <label for="telephone">Téléphone</label><br>
            <input type="text" id="telephone" name="telephone" value="">
        </div>

       
       <?php
        echo '<label>Année de rencontre</label><br>';
        echo '<select name="annee_rencontre" id="annee_rencontre">';
        $i = 2018;
        while ( $i >= 1918) {
           echo "<option>$i</option>";
           $i--;
       }
       echo '</select>';
       echo '<br><br>';

       /* correction 01 :---------------------------------------------------------------------------------------
       for($i = date('Y'), $i >= date ('Y')-100; $i--){ date('Y') donne l'annee en cours, soit 2018
           echo "<option>$i</option>";
       }
       ----------------------------------------------------------------------------------------------------------
       */
       ?>
     


        <div>
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" value="">
        </div>

       <div>
            <label>Type de contact</label><br>
            <select name="type_contact" id="type_contact">
            <option value="ami">Ami</option>
            <option value="famille">Famille</option>
            <option value="professionnel">Profesionnel</option>
            <option value="autre">Autre</option>
            </select><br><br>
       </div>

        <div><input type="submit" value="ajouter"></div>

        </form>
    </div>
        
    </body>
    </html>



    