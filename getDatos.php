<?php
    session_start(); 
    if(isset($_COOKIE['contador'])){
            // Caduca en un año
            setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60);
        } else {
            setcookie('contador', 1, time() + 365 * 24 * 60 * 60);

        }
   
    // Si se solicita una cedula devolvemos el json 
    if(isset($_GET["ci"])){
        $cedula = $_GET["ci"];
        $url = './'. $cedula . '/perfil.json';

        $response = file_get_contents($url);
        echo $response;
    }else{
        //si no, devolvemos el json de configuracion de idioma, la cookie fue creada en index.php
        $len = $_COOKIE['lenguaje'];

        if($len === 'es'){
            $response = file_get_contents('./conf/configES.json');
        }elseif($len === 'en'){
            $response = file_get_contents('./conf/configEN.json');
        }elseif($len === 'pt'){
            $response = file_get_contents('./conf/configPT.json');
        }
        echo $response;
        
    }
    
?>