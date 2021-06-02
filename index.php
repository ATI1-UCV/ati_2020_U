<?php
	session_start(); 

	//cookie de visitas
	if(isset($_COOKIE['contador'])){
		// Caduca en un año
		setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60);
	} else {
		setcookie('contador', 1, time() + 365 * 24 * 60 * 60);

	}

	//usuario
	if(isset($_SESSION["usuario"])){
		$nombreSaludo = ', ' . $_SESSION["usuario"] . ' (visita ' . $_COOKIE['contador'] . ')';
	}elseif(isset($_GET["usuario"])){
		$_SESSION["usuario"]= $_GET["usuario"];
		$nombreSaludo = ', '. $_SESSION["usuario"];
	}

	//lenguaje
	if ( (isset($_GET["len"]) ) && ( $_GET["len"] === 'es' || $_GET["len"] === 'en' || $_GET["len"] === 'pt' ) ){
		$len = $_GET["len"];
		$_SESSION['len'] = $len;
	} elseif(isset($_SESSION["len"])) {
		$len = $_SESSION['len'];
	}else{
		$len = 'es';
	}


?>

<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
	<!-- boostrap 4.6.0 -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<!-- CSS -->
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">
	<!-- Javascript -->
		<script src="js/index.js"></script>
		<title></title>
	</head>
	<body>
	<?php
		function reinicar(){
			//destruye la sesion y el cookie
			session_destroy();
			setcookie('contador', $_COOKIE['contador'] + 1, time() -1);
		}

		//leer archivo para el idioma
		if($len === 'es'){
			$data = file_get_contents("./conf/configES.json");
		} else if ($len === 'en'){
			$data = file_get_contents("./conf/configEN.json");
		} else if($len === 'pt'){
			$data = file_get_contents("./conf/configPT.json");
		}
		$configData = json_decode($data, true);

		//variables de cofig segun el lenguaje
		$sitio = $configData["sitio"];
		$saludo = $configData["saludo"];
		$home = $configData["home"];
		$confColor = $configData["color"];
		$confLibro = $configData["libro"];
		$confMusica = $configData["musica"];
		$confJuego = $configData["video_juego"];
		$confLenguaje = $configData["lenguajes"];
		$confEmail = $configData["email"];
		$copyRight = $configData["copyRight"];
		$buscar = $configData["buscar"];
		$nombre =$configData['nombre'];
		$type = 'index';

		//header
		include_once('./pre.php');
	?>
	   
	    <section></section>
	<?php
		//footer
		include_once('./post.php');

		//Destruir sesion y cookie
		// reinicar();
	?>

	<!-- jquery 3.5.1 -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!-- boostrap 4.6.0 -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
		
	</body>
</html>
