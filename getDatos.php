<?php
    header('Content-type:application/json;charset=utf-8');

    if(!isset($_GET["len"])){
        setcookie("len", 'ES', time() + 3600, "/");
    }else{
        setcookie("len", $_GET["len"], time() + 3600, "/");
    }

    if(!isset($_GET["ci"])){
        http_response_code(404);
        exit();
    }else{
        $ci = $_GET["ci"];
        $result = @file_get_contents($ci . "/perfil.json");
        $perfil = json_decode($result, true);
        if(!$result){
            http_response_code(404);
            exit();
        }
        echo json_encode($perfil);
    }

    //setcookie("visitas", 0, time() - 10000);
    if(isset($_COOKIE["visitas"])){
        setcookie("visitas", ($_COOKIE["visitas"] ?? 0) + 1, time() + 3600, "/");
    }else{
        setcookie("visitas", 1, time() + 3600, "/");
    }

?>