<?php 
	
	
	if(!headers_sent()){
		session_start();
		if(isset($_COOKIE['contador'])){
			$_COOKIE['contador'] += 1;
		}else{
			$value = 1; 
			setcookie("contador", $value);
		}
		
	}

	$profile = $_GET['ci'] ? $_GET['ci']."/perfil.json" : 'datos/perfil.json';
	$profile_data = file_get_contents($profile);
	$decoded_profile_data = json_decode($profile_data, true);

	if($_GET['len'] == 'pt'){
		$config_data = file_get_contents("conf/configPT.json");		
		$_SESSION['len']=$_GET['len'];	
	}else if($_GET['len'] == 'en'){
		$config_data = file_get_contents("conf/configEN.json");	
		$_SESSION['len']=$_GET['len'];				
	}else if($_GET['len'] == 'es'){
		$config_data = file_get_contents("conf/configES.json");	
		$_SESSION['len']=$_GET['len'];	
	}else if(!isset($_GET['len']) && isset($_SESSION['len'])){
		$config_data = file_get_contents("conf/config".strtoupper($_SESSION['len']).".json");
	}
	$decoded_config_data = json_decode($config_data, true);
	$_SESSION['nombre'] = $_SESSION['nombre'] ?  $_SESSION['nombre'] : $decoded_profile_data['nombre'];
	$_SESSION['len']= $_GET['len'] ? $_GET['len'] : "es";

	$currentFile = $_SERVER['PHP_SELF'];

?>
<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">	
		<!-- Bootstrap -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">		
		<!-- Splide --> 
		<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

		<title>ATI[UCV] 2020-U</title>
	</head>
	<body>
	    <?php require 'pre.php'; ?>
	    <div id="carrusel" class="splide">
			<div class="splide__track">
				<ul id="listado" class="splide__list">

				</ul>
			</div>
		</div>
		<div>
			<ul id="informacion" class="list-group">

			</ul>
		</div>
		<?php require 'pos.php'; ?>

	</body>
	<script type="text/javascript" src="js/datos.js" > </script>
	<script type="text/javascript" src="js/index.js"></script>
</html>