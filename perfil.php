<?php 
	session_start();
    $ci = htmlspecialchars($_GET["ci"]);
    $var_cookie = "cookie_".$ci;
    if(isset($_COOKIE[$var_cookie])){
		setcookie($var_cookie, $_COOKIE[$var_cookie] + 1, time() + 10 * 60);
	} else {
		setcookie($var_cookie, 1, time() + 10 * 60);
	}
?>
<html>
	<head>
    <?php
        #$path_jsonPerfil="./25641651/perfil.json";
        $path_jsonPerfil="./{$ci}/perfil.json";
        $data1 = @file_get_contents($path_jsonPerfil);
        $itemP = json_decode($data1, true);
        #$foto = "/{$ci}/{$ci}.jpg";
        $path = "./{$ci}/{$ci}.jpg";
        if(file_exists($path)){
            $foto = "/{$ci}/{$ci}.jpg";
        }
        $path = "./{$ci}/{$ci}.jpeg";
        if(file_exists($path)){
            $foto = "/{$ci}/{$ci}.jpeg";
        }
        $path = "./{$ci}/{$ci}.gif";
        if(file_exists($path)){
            $foto = "/{$ci}/{$ci}.gif";
        }
        $path = "./{$ci}/{$ci}.png";
        if(file_exists($path)){
            $foto = "/{$ci}/{$ci}.png";
        }
        $path = "./{$ci}/{$ci}.JPG";
        if(file_exists($path)){
            $foto = "/{$ci}/{$ci}.JPG";
        }
        $path = "./{$ci}/{$ci}.JPEG";
        if(file_exists($path)){
            $foto = "/{$ci}/{$ci}.JPEG";
        }
        $path = "./{$ci}/{$ci}.GIF";
        if(file_exists($path)){
            $foto = "/{$ci}/{$ci}.GIF";
        }
        $path = "./{$ci}/{$ci}.PNG";
        if(file_exists($path)){
            $foto = "/{$ci}/{$ci}.PNG";
        }
    ?>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/style.css"  type="text/css">
		<link rel="stylesheet" href="/css/perfil.css"  type="text/css">
		<title><?php echo $itemP["nombre"]?></title>
	</head>
    <?php
        if(htmlspecialchars($_GET["len"])==NULL){
        }else{
            $_COOKIE["idioma"]=htmlspecialchars($_GET["len"]);
            $idioma = $_COOKIE["idioma"];
        }
        if($idioma == "en"){
            $data2 = @file_get_contents("./conf/configEN.json");
        }
        else if($idioma == "es"){
            $data2 = @file_get_contents("./conf/configES.json");
        }
        else if($idioma == "pt"){
            $data2 = @file_get_contents("./conf/configPT.json");
        }else{
            $data2 = @file_get_contents("./conf/configES.json");
        }
        $itemC = json_decode($data2, true);
    ?>
	<body>
    <form>
        <input type="hidden" id="sesion_idioma" value=<?php echo $_COOKIE['idioma']?>>
        <input type="hidden" id="sesion_nombre" value=<?php echo $_SESSION["nombre"]?>>
        <input type="hidden" id="sesion_cont" value=<?php echo $_COOKIE[$var_cookie]?>>
    </form>
	    <nav class="navbar navbar-expand-lg navbar-dark bg-primary"> 
            <div class="navbar-nav container-fluid cont-logo">
                <a class="navbar-brand logo" href="#">ATI[UCV]2020-U</a>
                <div class="container">
                    <div class="row">
                        <a class="col navbar-brand text-center" id="saludo" aria-current="page" href="#"><?php
                            echo $itemC["saludo"]." ".$_SESSION["usuario"]." (visitas ".$_COOKIE[$var_cookie].")";
                        ?></a>
                        <a class="col navbar-brand text-center" id="inicio" href="/index.php">
                        <?php
                            echo $itemC["home"];
                        ?>
                        </a>
                        <li class="boton">
						<div class="dropdown">
							<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" arial-haspopup="true" arial-expanded="true">
								Idioma
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" id="español" href="#">Español</a>
								<a class="dropdown-item" id="ingles" href="#">Ingles</a>
								<a class="dropdown-item" id="portugues" href="#">Portugues</a>
							</div>
						</div>
					</li>
                    </div>    
                </div>
            </div>
        </nav>


        <div class="container">
            <div class="row m-3 w-100 ">
                <div class="col-5">
                    <img src=<?php echo $foto;?> class="img-fluid imagen" alt="">
                </div>
                <div class="col-7 shadow p-3 mb-5 ps-5 bg-body rounded">
                    <h2 id="texto1"><?php echo $itemP["nombre"];?></h2>
                    <p id="texto2"><?php echo $itemP["descripcion"];?></p>
                    <div class="row">
                        <div class="col">
                            <p class="colorC"><?php 
                                echo $itemC["color"];
                            ?></p>
                        </div>
                        <div class="col">
                            <p class="colorP"><?php echo $itemP["color"];?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="libroC"><?php 
                                echo $itemC["libro"];
                            ?></p>
                        </div>
                        <div class="col">
                            <p class="libroP"><?php echo $itemP["libro"];?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="musicaC"><?php 
                                echo $itemC["musica"];
                            ?></p>
                        </div>
                        <div class="col">
                            <p class="musicaP"><?php 
                            $a = $itemP["musica"];
                                if(gettype($a)=="array"){
                                    for($i=0;$i<count($itemP["musica"]);$i++){
                                        echo $itemP["musica"][$i]." ";
                                    }
                                }else{
                                    echo $itemP["musica"];
                                }?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="videoJuegoC"><?php 
                                    echo $itemC["video_juego"];
                            ?></p>
                        </div>
                        <div class="col">
                            <p class="videoJuegoP"><?php
                            $a = $itemP["video_juego"];
                                if(gettype($a)=="array"){
                                    for($i=0;$i<count($itemP["video_juego"]);$i++){
                                        echo $itemP["video_juego"][$i]." ";
                                    }
                                }else{
                                    echo $itemP["video_juego"];
                                }
                            ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="lenguajeC fw-bold"><?php 
                                echo $itemC["lenguajes"];
                            ?></p>
                        </div>
                        <div class="col">
                            <p class="lenguajeP fw-bold">
                            <?php 
                            $a = $itemP["lenguajes"];
                                if(gettype($a)=="array"){
                                    for($i=0;$i<count($itemP["lenguajes"]);$i++){
                                        echo $itemP["lenguajes"][$i]." ";
                                    }
                                }else{
                                    echo $itemP["lenguajes"];
                                }?>
                            </p>
                        </div>
                    </div>
                    <div class="row w-100">
                        <?php
                            echo '<p>';
                                echo $itemC["email"];
                            echo '</p>';
                            echo '<a href="https://mail.google.com/mail/?view=cm&fs=1&to=eduardosuarez.ucv@gmail.com" id="texto4">';
                                echo $itemP["email"];
                            echo '</a>';
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center p-3  bg-primary text-white" style="background-color: rgba(0, 0, 0, 0.2);">
            <?php
                echo $itemC["copyRight"];
            ?>
        </footer>

		
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="/js/jquery-3.6.0.min.js"></script>
        <script src="/js/scrip.js"></script>
	</body>
</html>