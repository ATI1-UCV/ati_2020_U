<?php
    session_start();
    if(isset($_COOKIE['idioma'])){
        $len = htmlspecialchars($_GET["len"]); 
        setcookie('idioma', $len , time() + 5 * 60);
	}
?>
<?php
    $ci = htmlspecialchars($_GET["ci"]); 
    $path_jsonPerfil="./{$ci}/perfil.json";
    $data1 = @file_get_contents($path_jsonPerfil);
    echo $data1;
?>