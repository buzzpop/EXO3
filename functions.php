<?php


// FONCTION QUI PERMET D'INVERSER LA CASSE D'UNE LETTRE
function invers_car_case ($letter){
    $min="a";
    $maj='A';
    if (long_chaine($letter)==1){
        for ($i=0;$i<26;$i++){
            if ($letter==$maj){
                return $min;
            }
            elseif ($min==$letter){
                return $maj;
            }
            $maj++;
            $min++;
        }
    }
    return $letter;
}

function is_car_numeric ($c){
    if ($c >= '0' &&  $c <= '9'){
        return true;
    }
    return false;
}

//VERIFIER SI UNE CHAINE EST NUMERIK
function is_chaine_numeric($chaine){
    for ($i=0;$i<long_chaine($chaine);$i++){
        if (!is_car_numeric($chaine[$i])){
            return false;
        }
    }
    return true;
}


// VERIFIER SI UN CARACTERE EST ALPHABETIK
function is_car_alpha ( $letter) {
    if(long_chaine($letter)==1){


        return (($letter >= "a" && $letter <= "z" ) ||($letter >= "A" && $letter <= "Z"));
    }
    return false;
}


// VERIFIER SI UNE CHAINE EST ALPHABETIK
function is_chaine_alpha ( $letter) {
    for ($i=0;$i < long_chaine($letter);$i++) {
        if (!is_car_alpha($letter[$i])) {
            return false;
        }
    }
    return true;

}



//VERIFIER SI UN CARACTERE EST PRESENT DANS UNE CHAINE

function is_car_present_in_chaine($car, $chaine){
    for ($i=0;$i<long_chaine($chaine);$i++){
        if ($chaine[$i]== $car){
            return true;
        }
    }

    return false;
}









// FONCTION QUI PERMET DE TESTER SI UNE CHAINE EST VIDE OU PAS
function is_empty($chaine){
    return(long_chaine($chaine)==0);
}

// FONCTION QUI PERMET DE SUPPRIMER LES ESPACES DE DEVANT OU DE DERRIERE D'UNE CHAINE ET
// RETOURNE LA CHAINE APRES AVOIR SUPPRIMER LES ESPACES







// RETOURNER LE NOMBRE DE CARACTERES D'UNE CHAINE
function long_chaine ($chaine){
    $c=0;
    while(isset($chaine[$c]) &&$chaine[$c]!= ''){
        $c= $c+1;
    }
    return $c;
}





