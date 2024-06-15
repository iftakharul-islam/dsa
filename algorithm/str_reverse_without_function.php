<?php 

$string = "ifat is a good programmer";

$strlen = strlen($string);
$crnt_wrd_idx = 0;
$array_word = [];

for($i = 0; $i< $strlen; $i++  ){
    if($string[$i] == ' '){
        $crnt_wrd_idx++;
        $array_word[$crnt_wrd_idx] = $string[$i];
    }
    if(!empty($array_word[$crnt_wrd_idx])){

        $array_word[$crnt_wrd_idx] .= $string[$i];
    }else{

        $array_word[$crnt_wrd_idx] = $string[$i];
    }

}

for($i = count($array_word)-1; $i >= 0; $i--){
    for($k = strlen($array_word[$i])-1; $k >= 0; $k--){
        echo $array_word[$i][$k];
    } 
}
