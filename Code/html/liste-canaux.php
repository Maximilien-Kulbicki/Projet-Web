<?php

    // remplis le tableau tab_can a partir du fichier csv ... 
    function fill_arr(){
        $tab = array();
        foreach( file("discussions/canaux.csv",FILE_IGNORE_NEW_LINES) as $lines){
            $tokens = explode(',',$lines);
            $tab["#{$tokens[0]}"] = $tokens[1];
        }
        return $tab;
    }

    // renvoie un json du tableau 
    function get(){
        $tab_can = fill_arr(); // met le tableau a jour 
        return json_encode($tab_can);
    }

    // ajoute un canal et créer un fichier de discussion
    function put($nom){
        $old_can = file_get_contents("discussions/canaux.csv"); // on recupere les canaux deja existants
        $content = "{$old_can}{$nom},discussions/{$nom}.csv \n";
        file_put_contents("discussions/canaux.csv",$content); // et on rajoute le nouveau à la fin 
    }

    if (isset($_POST["get"])){
        echo(get());
    }

    if(isset($_POST["put"]) && isset($_POST["nom"])){
        put($_POST["nom"]);
        echo(get());
    }

?>