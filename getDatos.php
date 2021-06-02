<?php
    
    if (!headers_sent()) {
        session_start();

        if(isset($_COOKIE['contador'])){
            $_COOKIE['contador'] += 1;
        }else{
            $value = 1; 
            setcookie("contador", $value);
        }
        
    }

    $ci = $_GET['ci'];
    $estudiante_json = file_get_contents($ci."/perfil.json");
    //$decoded_estudiante_json = json_decode($estudiante_json);
    echo $estudiante_json; 

?>