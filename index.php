<?php
	session_start(); 

	if ( (isset($_GET["len"]) ) && ( $_GET["len"] === 'es' || $_GET["len"] === 'en' || $_GET["len"] === 'pt' ) ){
		$len = $_GET["len"];
		$_SESSION['len'] = $len;
	} elseif(isset($_SESSION["len"])) {
		$len = $_SESSION['len'];
	}else{
		$len = 'es';
	}

	if(isset($_COOKIE['contador'])){
		// Caduca en un año
		setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60);
	} else {
		setcookie('contador', 1, time() + 365 * 24 * 60 * 60);

	}

	$contador = $_COOKIE['contador'];

	
	setcookie('lenguaje', $len, time() + 365 * 24 * 60 * 60);

?>

<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
	<!-- Swiper -->
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css"  type="text/css">
	<link rel="stylesheet" href="css/bootstrap-grid.css"  type="text/css">

	<!-- estilos -->
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">
		<link rel="stylesheet" href="css/perfil.css"  type="text/css">
		<!-- <script src="conf/configES.json"></script> -->
		<script src="datos/index.json"></script>
		<script src="js/index.js"></script>
		<title></title>
	</head>
	<body> 
	    <header>
			<nav class="container-fluid">
				<ul class="row">
					<li class="col-xs-12 col-sm-12 col-md-5 logo"></li>
					<li class="col-xs-12 col-sm-5 col-md-3 saludo">
						<span id='saludo'></span>
						<span id='nombre'></span>
						<span id='visitas'> (visitas <?php echo $contador ?>)</span>
					</li>
					<li class="col-xs-12 col-sm-6 col-md-3 busqueda">
						<form>
							<div class="form-group form-inline d-flex justify-content-end">
								<input class="form-control" id="nombreBusqueda" type="text">
								<input class="form-control" type="button" >
							</div>
							
						</form>
					</li>
				</ul>	
			</nav> 
	    </header>
	    <section>
	    	<span id='msj'></span>
			<div class="swiper-container">
				<div class="swiper-wrapper"></div>
			</div>
		</section>
		<section id='perfilEstudiante'>

		</section>
		<footer></footer>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="./js/bootstrap.js"></script>
		<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
		<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	</body>
</html>
