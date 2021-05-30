<?php
    session_start();
    if (!headers_sent()) {
        // las cabeceras ya se han enviado, no intentar añadir una nueva
        if(isset($_COOKIE['contador'])){
            $_COOKIE['contador'] += 1;
        }else{
            $value = 1; 
            setcookie("contador", $value);
        }
        
        $len = $_GET['len'] ? $_GET['len'] : 'es';
        setcookie("len", $len);
    }


    $ci = $_GET['ci'];
    $estudiante_json = file_get_contents($ci."/perfil.json");
    $decoded_estudiante_json = json_decode($estudiante_json);
    echo "<pre>";
    var_dump($decoded_estudiante_json);
    echo "</pre>";

    
    

?>
<script>     
    var len = document.cookie;
    console.log(len);
</script> 