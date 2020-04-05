<?php
require_once "functions.php";
$tabMots = []; // sauvegarde tous les mots qu'on va saisir
$errors = []; // pour sauvegarder les erreurs de chaque champs
$motsAvecM = []; // sauvegarder les mots contenant la lettre m
$message=''; //pour afficher les messages d'erreurs
$nbrChamps=0; // pour savoir le nombre de champs à générer
$result=''; // pour afficher le resultat
$cpt=0;

if (isset($_POST['valider']))
    {

        $nbrChamps= $_POST['nbre'];

        if (!is_chaine_numeric($nbrChamps))
            {
                 $message='Veuillez saisir un entier!';
                 $nbrChamps=0;
            }
        elseif (is_empty($nbrChamps))
            {
                 $message= 'Champs Obligatoire';
            }

    }
if (isset($_POST['resultat']))
    {

        $nbrChamps =$_POST['nbre'];
    for ($i=0;$i<$nbrChamps;$i++){
        $mot = $_POST['mot_'.$i];
       // var_dump($mot);
        if (long_chaine($mot)> 20){
            $errors[$i]= '( Le mot ne doit pas dépasser 20 caractères - )';
        }elseif (!is_chaine_alpha($mot)){
            $errors[$i]= '( Des lettres uniquement - )';
        }elseif (is_empty($mot)){
            $errors[$i]= '( Le champs ne doit pas etre vide - )';
        }
        else{
            $tabMots[$i]= $mot;
            //var_dump($tabMots[$i]);

        if (is_car_present_in_chaine('m',$tabMots[$i]) || is_car_present_in_chaine('M',$tabMots[$i])){
            $motsAvecM[$i]= $tabMots[$i];
            $cpt++;
        }
        }
        }

        if ($errors== []){
            $result=' Vous avez saisi '.$nbrChamps.
                ' Mot(s) dont <span class="mot">'.$cpt.' avec la lettre M</span>';
        }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="exercice3.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form method="post" >
    <label for="nb">Entrer le nombre de champs</label> <br>

    <input type="text" name="nbre" autocomplete="off" value="<?= $nbrChamps?>"  id="nb"> <br>
    <p style="color: red"> <?= $message?></p>

    <div>
        <input class="btn1" type="submit" value="Valider" name="valider">
        <input class="btn2" type="reset" value="Annuler" name="btn2"> <br>
        <hr>
        </div>
    <?php for ($i=0;$i<$nbrChamps;$i++){ ?>
    <label ">Mot N° <?= $i+1?></label><br>
        <?php
        if (isset($errors[$i])){ ?>
            <span style="color: red; margin-right: 37%;"> <?= $errors[$i]?></span><br>
         <?php }?>


    <input type="text" autocomplete="off" name="mot_<?=$i?>" value="<?php if (isset($_POST['mot_'.$i])){echo $_POST['mot_'.$i];}?>" >
        <br> <br>
    <?php
    }
    ?>
    <?php
    if ($nbrChamps>0){?>
        <button class="resultat" type="submit" name="resultat">Resultat</button>
    <?php
    }
    ?>
    <?php
   if (!is_empty($result)){?>
       <p class="view"><?= $result?></p>
    <?php
    }
    ?>




   </form>

</body>
</html>