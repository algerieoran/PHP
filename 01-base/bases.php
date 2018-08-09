<style>
h2 { font-size: 15px; color: orange; }
</style>

<?php

//---------------------------------
echo '<h2> Les balises PHP </h2>';
//---------------------------------
?>

<?php
// pour ouvrir un passage PHP, on utilise la balise précédente
// pour fermer un passage en PHP, on utilise la balise suivante :
?>

<p> Bonjour </p>  <!-- en dehors des balises d'ouverture et de fermeture de PHP, nous pouvons écrire du HTML -->

<?php
// vous n'êtes pas obligé de fermer un passage PHP en fin de script.

//---------------------------------
echo '<h2> Affichage dans le navigateur </h2>';
//---------------------------------

// echo est une instruction qui permet d'afficher dans le navigateur. Notez que nous pouvons y mettre du HTML.
// Toutes les instructions se terminent par ';'.

print 'Nous sommes lundi <br>';  // autre instruction d"affichage.

// Deux autres instructions d'affichage existent  (nous les verrons plus loin ) :
print_r('messge');
echo '<br>';
var_dump('message');


// pour faire un commentaire PHP sur une seule ligne c'est exactement comme JS

 /*
pour faire un commentaire sur plusieurs lignes
 */


 //---------------------------------
echo '<h2> Variable : déclaration, affectation et type  </h2>';
//---------------------------------
//Une variable est un espace mémoire portant un nom et permettant de conserver une valeur.
// En PHP, on déclare une variable avec le signe $.

$a = 127;   // on déclare la variable $a et  lui affecte la valeur 127.
echo gettype($a);  // gettype() est une fonction prédéfinie qui retourne le type d'une variable. Ici un integer (entier)
echo '<br>';

$a = 'une chaine de caractères';
echo gettype($a);  // string
echo '<br>';

$b = '127';
echo gettype($b);  // string  // un nombre écrit entre quotes ou guillemets est interprété comme un string
echo '<br>';

$a = true;  // true ou bien false
echo gettype($a);  // boolean 
echo '<br>';

// par convention, un nom de variable commence par une miniscule, puis on met une majuscule à chaque mot. Il peut contenir des chiffres (jamais au début), ou un "_" (pas au début car signification particulière en objet, ni à la fin).



 //---------------------------------
 echo '<h2> La concaténation : </h2>';
 //---------------------------------
 // en PHP, on concatène avec le symbole "." qui peut se traduire par "suivi de".

 $x = 'Bonjour ';
 $y = 'tout le monde';

 echo $x.$y.'<br>';  // affiche "bonjour tout le monde <br>"

 // Remarque sue echo :
 echo $x , $y , '<br>';  // on peut séparer des arguments à afficher dans echo par une vergule ",". Attention, ne marche pas avec print.


 //---------------------------------
 echo '<h2> Concaténation lors de L\'affectation </h2>';
 //---------------------------------

 $prenom1 = 'Bruno';
 $prenom1 = 'Claire';
 echo $prenom1 . '<br>';

 $prenom1 = 'Bruno ';
 $prenom1 .= 'Claire';  // L'opérateur .= permet d'ajouter la valeur "Claire" à la valeur "Bruno" contenue dans $prenom1 sans l'écraser. Affiche donc "Bruno Clair".
 echo $prenom1 . '<br>';


 //---------------------------------
 echo '<h2> Guillemets et quotes </h2>';
 //---------------------------------
 $message = "aujourd'huis";
 $message ='aujourd\huis';  // on échape les apostrophes dans les quotes simples (ALTGR + 8)

 //----
 $txt = 'Bonjour';
 echo "$txt tout le monde <br>";  // dans des guillemets la variable est évaluée : C'est son contenu qui est afficgé
 echo '$txt tout le monde <br>';  // dans des quotes simples, le nom de la variable est traité comme du texte brut


//---------------------------------
echo '<h2> Constante</h2>';
//---------------------------------
// une constante permet de conservait une valeur  sauf que celle-ci ne pourra pas être modifiée durant l'exécution du ou des scripts. Utile par exemple pour conserver les paramèttres de connextion à la BDD afin de ne pas pouvoir les altérer.

define('CAPITALE', 'Paris');  // déclar la constante appelée CAPITALE et lui affevte la valeur "Paris". Par convention, les constantes s'&crivent en majuscule
echo CAPITALE . '<br>';  // affiche Paris


//---------------------------------
echo '<h2>Opérateurs arithmétiques </h2>';
//---------------------------------
 
$a = 10;
$b = 2;

echo $a + $b . '<br>';   // affiche 12
echo $a - $b . '<br>';   // affiche 8
echo $a * $b . '<br>';   // affiche 20
echo $a / $b . '<br>';   // affiche 5
echo $a % $b . '<br>';   // affiche 0  (modulo = reste de la division entiere : 10 billes réparties sue 2 personnes, il m'en reste 0)

//--------
// Opération et affectation combinées :
$a =10;
$b = 2;

$a += $b;   // équivaut $a = $a + $b, $a vaut au final 12
$a -= $b;   // équivaut $a = $a - $b, $a vaut au final 10

// Il existe aussi les opérateurs *=, /= et %=

//-------
// Incrémenter et décrémenter :
$i = 0;
$i++;  // incrémentation : on ajoute +1 à $i
$i--;  // décrémentation : on rétranche 1 à $i





//-------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------
echo '<h2>Strucures conditionnelles </h2>';
//---------------------------------

// if ....else

$a = 10; 
$b = 5;
$c = 2;

if ($a> $b) {  // si $a est supérieur à $b, la condition est évaluée à true, on entre donc dans les accolades qui suivebt :
    echo '$a est superieur à $b <br>';
} else {
    // sinon, dans le cas contraire, on entre dans le else :
    echo '$a est inférieur à $b <br>';
}

//-----------------
// L'opérateur AND qui s'écrit && :
if ($a > $b && $b > $c) {  // si $a est superier à $b et dans le même temps $b est superieur à $c, alors on entre dans les accolades :
    print 'OK por les deux conditions <br>';
}


//----------------
//L'opérateur OR qui s'écrit || :

$a = 10; 
$b = 5;
$c = 2;
if ($a == 9 || $b > $c) {  // si $a est égal (==) à 9 OU $b est superieur à $c, alors on entre dans les accolades qui suivent :
    echo ' OK pour au moins une des deux conditions <br>';
} else {
    echo ' Les deux conditions sont fausses <br>';
}
 
//-----------------
// if...elseif ...if :
if ($a == 8) {
        echo 'répense 1 : $a est égal à 8 <br>';
}elseif ($a != 10) {  // notez la syntaxe elseif en un seul mot
        echo 'répense 2 : $a est différent de 10';
} else {
        echo 'répense 3 : Les deux conditions précédentes sont fausses <br>';
}

// Remarque : on met pas de ";" à la fin des structures conditionnelles.

//-------------
// L'opérateur OU exclusif qui s'écrit XOR :
    $question1 = 'mineur';
    $question2 = 'je vote';  // exemple d'un questionnaire avec plusieurs réponses possibles
 if ($question1 == 'mineur' XOR $question2 == 'je vote') {  // avec le OU exclutif seulementy l'une des conditions doit etre valide (soit l'une soit l'autre)
     echo 'Vos réponses sont cohérentes <br>';
} else {
     echo 'Vos réponses ne sont pas cohérentes <br>';  // si les deux conditions sont vrais (cas de "mineur vote"), ou si les 2 conditions sont fausses (cas de "majeur ne vote pas"), nous entrons dans le else.
 }

//-----------
// condition ternaire :
// syntaxe contractée  de la condition if ...else :
    $a = 10;

    echo ($a = 10) ?'$a est égal à 10 <br>' : '$a est différent à 10 <br>';  // dans la ternaire, le "?" remplace if, et le ":" remplace else. On affiche le premier string si la condition est vrais, sinon le second.

// ou encore :
 $resultat = ($a = 10) ?'$a est égal à 10 <br>' : '$a est différent à 10 <br>';
echo $resultat;

//-------------
// Différences entre  == et === :
$varA = 1;// integer
$varB ='1'; // string

if($varA == $varB) {  // on compare uniquement en valeur avec l'opérateur "=="
    echo '$varA est égal $varB en valeur <br>';
}

if ($varA === $varB) {  // on compare à la fois en valeur ET en type avec l'opérateur "==="
    echo '$varA est égale à $varB en valeur et en type <br>';
} else {
    echo '$varA est différent de $varB en valeur OU en type <br>';
}

// Pour mémoire, le simple "="correspond à une afféctation.

//----------Nouveu---------------------
//---------------------------------------------------------------------------------------------
//isset() et empty() :
// Définition : 
// empty() : teste si c'est vide (c'est-à-dire 0, '', null, false ou non défini)
// isset() : teste si c'est défini ( si ça existe) ET a une valeur non NULL
//----------------------------------------------------------------------------------------------

$var1 = 0;
$var2 = '';

if (empty($var1)){  // la condition est vrais car $var1 contient 0
    echo 'on 0, vide, NULL, false ou non défini <br>';
}

if (isset($var2)) {  // kla condition est vrais car $var2 existe bien
    echo '$var2 est défini <br>';
}

// si on met les lignes 246 et 247 en commentaires, la première condition reste vrais, car $var1 est non définie, et la seconde devient fausse, car $var2 n'existe pas.

// Contexte d'utilisation : les formulaires pour empty(), l'existence de variable ou d'array avec isset() avant les utiliser.


//------
// l'opérateur NOT qui s'écrit "!" :
$var3 = 'je ne suis pas vide';

if(!empty($var3)) echo '$var3 \'est pas vide <br>';  // "!" pour NOT qui est une négation. Ici, signifie si $var3 n'est pas vide

//phpinfo();  // fonction prédéfinie qui affiche des infos sur le contexte d'exécution du script.

//-------------------------------------------------
echo '<h2> Condition switch </h2>';
//-------------------------------------------------
// La condition switch est une autre syntaxe pour un if....elseif....elseif....else.

$couleur = 'jaune';
switch($couleur){
    case 'bleu' :  // si $couleur contient la valeur 'bleu', nous exécutons l'instruction après le ":" qui suit :
    echo 'Vous aimez le bleu';
    break;  // break est obligatoire pour quiter la condition switch une fois le case exécuté
    case 'rouge' :
    echo 'Vous aimez le rouge';
    break;
    case 'vert' :
    echo 'Vous aimez le vert';
    break;
    default :  // corespond à else le cas par défaut dans lequel on entre si aucune des valeurs précédentes n'est juste
    echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert. <br>';
    break;
}

//--------- Exercice : réécrivez le suitch précédent en condition if... pour obtenir exactement le même résultat.-------------------------------------------

$couleur = 'jaune';

if ($couleur == 'bleu') {
    echo 'Vous aimez le bleu';
} elseif ($couleur == 'rouge') {
    echo 'Vous aimez le rouge'; 
}elseif ($couleur == 'vert') {
    echo 'Vous aimez le vert';
}else {
    echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert. <br>';  
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------

//-------------------------------------------------
echo '<h2> Les fonctions prédéfinies </h2>';
//-------------------------------------------------
// Une fonction prédéfénie permet de tréaliser un traitement spécifique prédéterminé dans le langage PHP.

//-----
// strpos() :
$email1 = 'prenom@site.fr';
echo strpos($email1, '@');  // indique la position 6 du charactère'@' dans la chaine $email1 (compte à partir de 0).
echo '<br>';

$email2 = 'bonjour';
echo strpos($email2, '@');  // cette ligne n'affiche rien pourtant la fonction strpos retourne bien quelque chose. Pour l'analyser nous  faisons un var_dump ci-dessous :

var_dump(strpos($email2, '@'));  // on voit grâce au ver-dump que la fonction retourne false quand elle ne trouve pas l'@. var_dump est une instruction d"affichage améliorée que l'on utilise uniquement en phase de dévélopement (on les retire en production).


echo '<br>';
//--------
// strle() :
$phrase = 'mettez une phrase ici <br>';
echo strlen($phrase);  // affiche la longeur de la chaine de caractère, ici 21. Notez que strlen() compte le nombre d'octets, et que les caractères accentés comptent pour 2. si vous  voulez compter précisément le nombre de caractères, on utilise : mb_strlen().

//----------
// strtolower(), strtoupper(), trim() :
$message = '    Hello World     !<br>';
echo strtolower($message) . '<br>';  // affiche tous en miniscule
echo strtoupper($message) . '<br>';  // affiche tous en majuscule

echo strlen($message) . '<br>';   // affiche la longeur avec les espaces

echo strlen(trim($message)) . '<br>';   // trim supprime les espaces au début et à la fin de la chaine de caractères. Puis strlen affiche la longeur de cette chaine sans les espaces.

//-----
// die() ou exit() :
//exit('ici un message');  // affiche un message (optionnel) et arrete le script.

//die('un autre message');  // die() est un "alias"(pseudonyme nom substitution)de exit : il fait la même chose.


//-----
// Le manuel PHP :
/*
Pour chercher une fonction (ou autre chose) de PHP : faire google "php nom de la fonction".

exemple : "PHP trim"

le site de référence : php.net/manual/fr/
A retenir : l'encadré blanc qui définit la fonction : en bleu les mots clés et les paramètres, en vert leur type, entre crochets les paramètres optinnels.
*/


//----------------------------------------
echo '<h2> Les fonctions utilisateurs </h2>';
//----------------------------------------------
// des fonctions sont des morceaux de codes encapsulés dans des accolades et portant un nom, qu'on appelle au  besoin pour exécuter une action précise.

// les fonctions qui ne sont pas prédéfinies mais déclarer par le développeur sont appeler fonctions utilisateur.

// Fonction sans paramètre :
function tiret() {  // on déclar une fonction avec le mot clés function, suivi du nom puis d'une paire de (), et enfin d'une paire d'accolades
    echo '<hr>';
}

tiret();  // pour exécuter une fonction, on l'appelle par son nom suivi d'une paire de ()


//----------
// fonction avec paramètre et return :

function afficherBonjour($nom) {
    return 'Bonjour ' .$nom . ', comment vas-tu ?';  // alternative :
    // return "Bonjour $nom, comment vas-tu ?";

    echo 'TEST'; // après un return , les instructions de la fonction ne sont pas lues
}

echo afficherBonjour('Luc') . '<br>';  // si la fonction possède un parametre, il faut obligatoirement lui envoyer une valeur l'ors de l'appel de la fonction. la fonction nous retourne le string "Bonjour Luc, comment vas-tu ?" gâce au mot clé return qui s'y trouve. Il faut donc faire ici un echo pour afficher le resultat


//--------------------------------------------------Exercice : --------------------------------------------------------------
// écrivez une fonction appelée appliqueTva2 qui multiplie un nombre donée par un taux donné.
function appliqueTva($nombre) {
    return $nombre * 1.2;
}

// Votre code :
function appliqueTva2($nombre, $taux) {  // on peut initialiser un paramètre par défaut si on ne reçoit pas de valeur : ici $taux prend la valeur 1.5 par défaut si on ne lui en donne pas.
    return $nombre * $taux;
}
echo appliqueTva2(20, 1.2) . '<br>';  // affiche 18

//--------------------

function appliqueTva3($nombre, $taux = 1.5) {  // $taux ayant une valeur par défaut dans les () de la fonction ci-dessus, on n'est pas obligé de lui donner un argument pour ce taux.Affiche 15
    return $nombre * $taux;
}
echo appliqueTva3(10) . '<br>';  // affiche 15

//--------------------------------------------------------------------------------------------------------------------------------

//--------------------------------------------------Exercice 02 : --------------------------------------------------------------
/* - Ecrivez la fonction factureEssence() qui calcule le coût total de votre facture en fonction du nombre de litres d'essence que vous lui donner en appelant la fonction. Cette fonction retourne la phrase " Votre facture est de X euros pour  Y litres d'essence" où X et Y sont variable.

-Pour cela vous avez besoin du prix au litre. On vous donne une fonction prixLitres() qui vous cominique ce prix. Utilisez la donc dans votre fonction factureEssence().
*/
function prixLitre() {
    return rand(100, 200)/100;  // calcule un prix aléatoire entre 1 et 2 (€)
}

// votre code :

function factureEssence($litresEssence) {

    $prixTotal = $litresEssence * prixLitre();

    return 'Votre facture est de ' . $prixTotal . ' euros pour ' . $litresEssence . ' litres d\'essence' . '<br>';
}
echo factureEssence(5);
//------------------------------------------------------------------------------------------------------------------------------------------------


//----------------------------------------------
echo '<h2> Espace local et espace global </h2>'; 
//----------------------------------------------

// de l'espace local à espace global :
//-------------------------------
function jourSemaine() {
    $jour = 'mardi';  // variable local
    return $jour . '<br>';  // return permet de sortir une valeur de la fonction
}
// echo $jour;  // ne foctionne pas car cette variable est local à la fonction, dons connue et accessible uniquement au sein de cette fonction

echo jourSemaine();  // on récupère la valeur retournée par le return de la fonction : affiche 'mardi'

// De l'espace globale à l'espace local :
//---------------------------
$pays = 'France';  // variable global

function affichePays() {
    global $pays;  // le mot clé global permet de récuperer une variable global dans un espace local de la fonction
    echo $pays . '<br>';  // on accède donc bien à cette variable
}

affichePays();  // pas de echo car il existe déjà dans la fonction


//----------------------------------------------
echo '<h2> Les structures itératives : Les boucles </h2>'; 
//----------------------------------------------
// les boucles sont destinés à répéter des lignes de codes de façon automatique.

//---------------
//Boucle while :
//---------------
 $i =0;  // valeur de départ de la boucle

 while ($i < 3) {  // tant que $i est inférieur à 3, on entre dans la boucle 
     // ici le code à répéter
     echo "$i---";  // ici affiche "0---1---2---"
     $i++;  // on oublie pas de d'incrémenter pour que la condition d'entrée dans la boucle deviennent fausse à un moment donné (sinon on obtient une boucle infinie)
 }

 // Note : pas de ";" à la fin du while (=structure)

 echo '<br>';

 //------------------------------------- Exercice :----------------------------------------------------------------------------------
 // à l'aide d'une boucle while, afficher dans un sélecteur les années depuis 1918 à 2018.
 echo '<select>';
 $i = 1918;
 while ( $i <= 2018) {
    echo "<option>$i</option>";
    $i++;
}
echo '</select>';
//------------------------------------------------------------------------------------------------------------------------------------
echo '<br>';
//---------------
//Boucle do...while :
//---------------
// La boucle do while a la particularité de s'exécuter au loin une fois, puis tant que la condition de fin est vraie.

$j =0;

do {
    echo 'Je fais un tour de boucle';
    $j++;
} while ($j > 10);  // la condition est évaluer a false tout de suite (1 n'etant pas supérieur à10), et pourtant la boucle a tourné une fois. Attention au ";" après le while.

echo '<br>';
//---------------
//Boucle for :
//---------------
// La boucle for est une autre syntaxe de la boucle while dans laquelle les paramètres valeur de départ, condition d'entrée dans la boucle et incrémentation sont regroupés dans les () du for.

for ($i = 0; $i < 10; $i++) {  // tant que $i est inférieur à 10, on entre dans la boucle, puis on incrémente $i à la fin de la boucle avant de revenir dans la condition.
    echo $i . '<br>';  // on fait 10 tours pour les valeurs de $i allant de 0 à 9
}


//-----------------------------------------Exercice : -----------------------------------------------------------------
// afficher 12 <option> avec les valeurs de 1 à 12 à l'aide d'une boucle for.

echo '<select>';
for ($i =1; $i <= 12; $i++) {
    echo "<option>$i</option>";
} 
echo '</select>';


//---------------
//Boucle foreach :
//---------------
// Il existe aussi la boucle foreach que nous aborderons au chapitre des arrays. Elle sert à parcourir les éléments d'un tableau.

echo '<br>';
//----------------------------------------------
echo '<h2> Exercice de mélanges HTML et PHP </h2>'; 
//----------------------------------------------

//------------ Exercice 01 : faites une boucle FOR qui affiche 0 à 9 sur la même ligne. Résultat attendu :------------------------------

for ($i = 0; $i <= 9; $i++) {
    echo $i;
}
//---------------------------------------------------------------------------------------------------------------------------------------
echo '<br>';
//--------------- Exercice 02 : faites une boucle FOR qui affiche 0 à 9 sur la même ligne, dans une table. Résultat attendu :------------
echo'<table border="1">';
echo'<tr>';
for ($i = 0; $i <= 9; $i++) {
    echo "<td>$i</td>";
}
echo'</tr>';
echo'</table>';
//---------------------------------------------------------------------------------------------------------------------------------------
echo '<br>';
//-------------exercice 03 : faites une table HTML de 10ligne et 10 colonnes avec une valaur quelconque à l'intérieur dans un premier temps,. Puiqs dans un second temps, numéroter les cellules de 0 à 99. Résultat attendu :

echo '<table border="1">';
for ($i = 0; $i <= 9; $i++) {
    echo '<tr>';
        for ($n = 0; $n <=  9; $n++) {
            echo '<td>'.$i.$n.'</td>';
        }
    echo '</tr>';
}
echo '</table>';

//--------------
echo '<br>';
//----correction :
echo '<hr>';
echo '<br>';


$numero = 0;
echo '<table border="1">';

for ($i = 0; $i <= 9; $i++) {

    echo '<tr>';
        for ($n = 0; $n <=  9; $n++) {
            echo '<td>'. $numero .'</td>';
            $numero++;
        }
    echo '</tr>';
}

echo '</table>';


echo '<br>';
echo '<hr>';
//----------------------------------------------
echo '<h2> Les tableaux de données : arrays  </h2>'; 
//----------------------------------------------
// un tableau ou array en anglais, est déclaré comme une variable améliorée dans laquelle on stocke une multitude de valeurs. Ces valeurs peuvent être de n'importe quel type et possèdent un indice par défaut dont la numérotation commence à 0.


// Bien souvent on récupérera les infirmations de la BDD sous forme d'array (ou éventuellement d'objet).

// Déclarer un array :
$liste = array ('Grégoire', 'Nathalie', 'Emilie', 'françois', 'Georges');  // on déclare un array avec le mot clé "array"

// echo $liste;   // erreur ('array to string convention') car on peut pas afficher directement un array en PHP

// Pour afficher rapidement le contenue de ce tableau :
echo '<pre>';
var_dump($liste);    // affiche le contenu du tableau avec certaines infos en plus comme le types des éléments
echo '</pre>';   //</pre> balise html qui permet de formater l'affichage du var_dump 

//-------------
echo '<br>';
//----------


echo '<pre>';
print_r($liste);    
echo '</pre>';
 
//-------------
echo '<br>';
//----------
// fonction utilisateur pour afficher un print_r :
function debug($param) {
    echo '<pre>';
        print_r($param);    
    echo '</pre>';
}

debug($liste);   // pour vérifier que notre fonction marche
//-------------
echo '<br>';
//----------

//----------
// autre moyen d'afficher des valeurs dans un tableau :
$tab = ['France', 'Italie', 'Espagne', 'Portugal'];  // on peut utiliser la notation entre [] crochets pour déclarer un array.

$tab[] = 'Suisse';   // les crochets vides permettent d'ajouter une valeur à la fin de notre array $tab

debug($tab);
//-------------
echo '<br>';
//----------

// afficher la valeur "Italie" de l'array $tab :
echo $tab[1];   // pour accéder à une valeur d'un array, on met son indice entre [] après le nom de cet array
//-------------
echo '<br>';
//----------


//------------------
// tableau associatif :
    // Dans un tableau associatif nous pouvons choisir le nom des indices :
        $couleur = array(
            'j' => 'jaune',
            'b' => 'bleu',
            'v' => 'vert'
        );


        // pour acceder à un élément du tableau associatif :
            echo 'La seconde couleur de notre tableau est le  ' . $couleur['b'] .'<br>';
            echo " la seconde couleur de notre tableau est le $couleur[b] <br>";  // affiche aussi "bleu". un array écrit dans des guillemets ou des quotes perd les quotes autour de son indice


            // compter le nombre d'éléments contenus dans un array :
            echo 'Taille du tableau : '. count($couleur) . '<br>';  // affiche 3 (éléments)
            echo 'Taille du tableau : ' . sizeof($couleur) . '<br>';  // sizeof() est pareil que count() dont il est un alias


echo '<br>';
echo '<hr>';
//----------------------------------------------
echo '<h2> La boucle foreach pour les arrays  </h2>'; 
//----------------------------------------------
// foreach est un moyen simple de passer en révue un tableau. Elle fonctionne uniquement sur les tableaux et les objets. 

foreach($tab as $valeur) {  // le mot clé as fait partie de structure du foreach et est obligatoire. La valeur $valeur (que l'on nomme comme on veut)viennt parcourir les valeurs du tableau $tab. Quand il y a une seule variable après "as", elle parcourt systématiquemant les VALEURS
     echo $valeur . '<br>';  // on affiche succéssivement à chaque tour de boucle les éléments du tableau
}
echo '<br>';

// Parcourir la colonne des indices ET la colonne des valeurs :
foreach($tab as $indice => $valeur) {  // quand il y a 2 variables après "as", la premiere parcourt toujours les INDICES, et la seconde parcourt toujours les VALEURS.
    echo $indice . 'correspond à '. $valeur . '<br>';
}

//----------------------------------------------- Exercice :----------------------------------------------------------------------------------------------

/* - écrivez un array avec les indices prenom, nom, email et telephone et mettez-y pour valeur des informations fictives. Remarque : cet array ne concerne qu'une seule personne.    - Puis avec une boucle foreach, affichez les valeurs de votre array dans des <p>, sauf le prenom qui doit être affiché dans un <h3>.

*/

$info = array(
    'prenom' => 'Setti',
    'nom' => 'Belkacem',
    'email' => 'setti.belkacem@lepoles.com',
    'telephone' => '0548263965'
);



foreach($info as $ind => $val) {
  if ($ind == 'prenom') {
      echo '<h3>'.$val.'</h3>';

  } else {
      echo '<p>'.$val.'</p>';
  }
}

foreach($info as $ind => $val) {
    if ($ind == 'prenom') {
        echo "<h3>$ind : $val</h3>";
  
    } else {
        echo "<p>$ind : $val</p>";
    }
  }

//---------------------------------------------------------------------------------------------------------------------------------------------------------


echo '<br>';
echo '<hr>';
//----------------------------------------------
echo '<h2> Les arrays multidimensionnels  </h2>'; 
//----------------------------------------------
// Nous parlons de tableau multidinensionnel , quand un tableau est contenu dans un autre tableau. Chaque tableau représente une dimension.

// Création d'un tableau multidimensionnel :
$tab_multi = array(
        0 => array(
                'prenom' => 'Julien',
                'nom'    => 'Dupon',
                'tel'    => '0123456789'
            ),
        1 => array(
                'prenom' => 'Nicoles',
                'nom'    => 'Duron',
                'tel'    => '0124879089'
            ),
        2 => array(
                'prenom' => 'Pierre',
                'nom'    => 'Dulac',
            )

);
// Il est bien sur possible de choisir le nom des indices de notre array.
debug($tab_multi);

// Afficher la valeur "Julien" :
echo $tab_multi[0]['prenom'] . '<hr>';  // affiche Julien. Nous entrons d'abord dans $tab_multi, puis nous allons à son indice [0], puis à l'intérieur nous allons à l'indice ['prenom].


//---------------
// Parcourir le tableau multidimensionnel avec la boucle for :
    for($i = 0; $i < count($tab_multi); $i++) {  // count($tab_multi) veut 3 , car il y a bien 3 éléments dans le premier niveau de ce tableau
        echo $tab_multi[$i]['prenom'] . '<br>';   // $i prend successivement les valeurs 0 puis 1 puis 2. On affiche donc à chaque tour de boucle "Julien" puis "Nicolas" puis "Pierre"  
    }

    echo '<hr>';

    //-------------------------------------------------------------- Exercice :------------------------------------------------------------
    // Afficher las 3 prenom avec une boucle foreach :
        foreach($tab_multi as $indice => $value) {
            echo $tab_multi[$indice]['prenom'] . '<br>';
        }

        echo '<hr>';

        foreach($tab_multi as $indice => $value) {
            echo $value['prenom'] . '<br>';
        }
        //-----------------------------------------------------------------------------------------------------------------------------------
        
        echo '<hr>';
        //Pour afficher tous les éléments d'un array multidimensionnel, on fait des boucles foreach() imbriquées (une par dimension) :
            foreach($tab_multi as $indice => $value) {
                foreach($value as $label =>$info) {  // $value étant luis même un array, je refais une foreach dessus pour le parcourir
                    echo $label . ' => ' . $info . '<br>';   // $label correspond aux indice de $value et $info aux valeurs
                }
            }
    //----------------------------------------------------------------------------------------------------------------------------------------


echo '<br>';
echo '<hr>';
//----------------------------------------------
echo '<h2> Les inclusions de fichiers  </h2>'; 
//----------------------------------------------
// on fait un fichier exemple.inc.php

echo 'Première inclusion : ';
include 'exemple.inc.php';  // le fichier est "inclus" : en cas d'erreur lors de l'inclusion, include génère une erreur de type "warning" et contenue l'exécution du script.

echo 'Deuxième inclusion : ';
include_once 'exemple.inc.php'; // le once vérifie si le fichier a déjà été inclus. Si c'est le cas, il ne le ré-inclut pas.

echo '<br>';
echo 'Troisième inclusion : ';
require 'exemple.inc.php';   // le fichier est requis  : en cas d'erreur sur le nom ou le chemin du fichier, require une erreur "fatal error" et arrête l'exécution du script.

echo '<br>';
echo 'Quatrième inclusion : ';
require_once 'exemple.inc.php';  //le once vérifie si le fichier a déjà été inclus. Si c'est le cas, il ne le ré-inclut pas.


echo '<hr>';
//--------------------------------------------------------------------------------------------------------------------------

//-------------------------------------------
echo '<h2> introduction aux objets  :</h2>';
//-------------------------------------------

// Un objet est un autre type de données. Il permet de regrouper des informations : on peut déclarer des variables appelées PROPRIETES ou ATRIBUTS, et des fonctions appelés des METHODES.

// Pour créer des objets, nous avons besoin d'un "plan d'instruction" : c'est le rôle de la classe (note : rien à voir avec le css...). Nous créons donc une classe pour créer nos meuble :

class Meuble {   // on met une majuscule au nom de la classe
       public $marque = 'ikea';  // on déclar une propriété "marque" (public pour dire qu'elle accéssible partous)

       public function origine() {
            return 'Origine Suédoise';
       }
    }  // une classe est un "plan" d'objet qui contient des propriétés et des méthodes. Ainsi en créant un objet à partir de cette classe, cet objet "héritera" de ces propriétés et méthodes.


//Enfin ,on crée un objet "table" :

$table = new Meuble();  // new est un mot clé qui permet d'instancier la classe Meuble et d'en faire un objet. On dit que $table est une "instance" de Meuble

debug($table);   // nous pouvons observer le type de $table (object), le nom de la classe dont il provient (Meuble), et sa seule propriété (marque)

echo 'La marque de notre table est : ' . $table->marque . '<br>';  // pour accéder à la propriété d'un objet, on écrit l'objet suivi d'une flèche "->" suivi du nom de la propriété. Affiche "ikea"

echo $table->origine();  // idem pour appeler une méthode d'un objet à laquelle on ajoute une paire de ().


