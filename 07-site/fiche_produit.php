<?php
require_once 'inc/init.inc.php';

// Variable d'affichage :
$panier = '';
$suggestion = '';

// 1- On vérifie que le produit demandé existe bien (un produit en favori a pu être suprimé de la BDD) :
    if (isset($_GET['id_produit'])) { // si existe "id_produit" dans $_GET(donc dans l'url), c'est qu'un produit a été demandé
        
        $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array(':id_produit'=> $_GET['id_produit']));   // on sélection le produit demandé dans l'url par son id

            if($resultat->rowCount() == 0) { // s'il n'y a pas de lignes dans $resultat, le produit demandé n'est pas en BDD : on redige vers la boutique
                header('location:boutique.php');
                exit();
            }

            // si on passe ici, le produit existe en BDD :
                $produit = $resultat->fetch(PDO::FETCH_ASSOC); // on transforme l'objet $resultat en un array associatif $produit, sans boucle while car on est certain de n'avoir qu'un seul produit
                //debug($produit);
                extract($produit);  // on extrait tous les indices sous forme de variables. Exemple : $produit['titre] devient une variable $titre dont la valeur est $produit['titre]


// 2- affichage du formulaire d'ajout au panier si le stock est positif :
        if ($stock > 0) {
                // si j'ai du stock sur mon produit, on affiche le bouton d'ajout au panier :
                $panier .= '<form method="post" action="panier.php">';
                $panier .= '<input type="hidden" name="id_produit" value="'. $id_produit .'">';  // champ caché qui permet de récupérer dans $_POST la valeur de l'id du produit ajouté

                // Sélecteur pour sélectionner la cantité :
                $panier .= '<select name="quantite" clas="custom-select col-sm-2">';
                for($i = 1; $i <= $stock && $i <= 5; $i++) {
                    $panier .= "<option> $i </option>";
                }


                $panier .= '</select>';

                // Bouton d'ajout au panier :
                $panier .= '<input type="submit" name="ajout_panier" value="ajouter au panier" class="btn col-sm-8 ml-2">'; 

                $panier .= '</form>';

                $panier .= '<p><i>Nombre de produits disponibles : ' .$stock . '</i></p>';

        } else {
            $panier .= '<p>Rupture du stock ! </p>';
        }


    } else {
        // on redirige l'internaute vers la boutique car aucun produit n'a été sélectionné :
        header('location:boutique.php');
        exit();
    }
 

//Exercice : afficher 2 produits (photo et titre) aléotoirement appartenant à la catégorie du produit affiché dans la fiche_produit.php. La photo  est clicable et amène à la fiche du produit. Utilisez la variable $suggestion pour afficher le contenu. Complément : pour sélectionner aléotoirement des produits, vous utilisez la fonction ORDER BY RAND() dans la requête SQL. 

//On vérifie que les 2 produits existe bien  :

   
        
        $resultat = executeRequete("SELECT id_produit, photo, titre FROM produit WHERE categorie = :categorie ORDER BY RAND() LIMIT 2", 
        array(':categorie'=> $categorie));  // $categorie contient la catégorie du produit actuellement affiché dans la fiche_produit.php. En SQL, la foncton LIMIT permet de limiter le nombre de résultats de la requête au nombre spécifié. ORDER BY RAND() fait un tri aléotire des résultats. Attention à l'ordre de ces fonctions : TOUJOURS WHERE puis ORDER BY puis LIMIT.
        
        
          

            // si on passe ici, le produit existe en BDD :
              while($autres_produits = $resultat->fetch(PDO::FETCH_ASSOC)) {  // on transforme l'objet $resultat en un array associafif. On fait une boucle while car il y a 2 produits dans $resultat.
                debug($autres_produits);
                $suggestion .= '<div class="col-sm-3">';
                $suggestion .= '<a href="fiche_produit.php?id_produit="'. $autres_produits['titre'] .'"><img src="'. $autres_produits['photo'] .'" alt="'. $autres_produits['titre'] .'" class="img-fluid"></a>';
                $suggestion .= '</div>';
              }

               
        




//------------------------------------------AFFICHAGE / ---------------------------------------------------------------
require_once 'inc/haut.inc.php';
?>
<div class="row">
    <div class="col-lg-12">
        <h1><?php echo $titre; ?></h1>
    </div><!-- class="col-lg-12 -->

    <div class="col-md-8">
        <img class="img-fluid" src="<?php echo $photo; ?>" alt="<?php echo $titre; ?>">
    </div><!-- class="col-md-8" -->

    <div class="col-md-4">
        <h3>Description</h3>
        <p><?php echo $description; ?></p>

        <h3>Détails</h3>
        <ul>
            <li>Catégorie : <?php echo $categorie; ?></li>
            <li>Couleur : <?php echo $couleur; ?></li>
            <li>Taille : <?php echo $taille; ?></li>
        </ul>

        <h4>Prix : <?php echo $prix . ' €'; ?></h4>

        <?php echo $panier; ?>

        <a href="boutique.php?categorie=<?php echo $categorie; ?>">Retour vers votre sélection</a>

    </div><!-- class="col-md-4" -->

</div> <!-- class="row" -->


<!-- ----------------------------------------------------------------- -->
 <!--Exercice :  -->
<hr>
<div class="row">
    <div class="col-lg-12">
        <h3>Suggestions de produits</h3>
    </div>
    <?php echo $suggestion;?>
</div>



<?php
require_once 'inc/bas.inc.php';