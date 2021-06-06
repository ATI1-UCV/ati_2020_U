<?php 	
function console_log($output, $with_script_tags = true) {
	    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
	');';
	    if ($with_script_tags) {
	        $js_code = '<script>' . $js_code . '</script>';
	    }
	    echo $js_code;
	} 

	// is Session set?
	if (session_status() == PHP_SESSION_NONE) {
		console_log("Session none");
		console_log($_SESSION);
		session_start();
		console_log($_SESSION);
		console_log("Session created");
	}


// Get Language
	if (isset($_GET['len'])) { 			// IS set on URL?
		console_log("GET len is set on URL, savin to cookie");

		if ($_GET['len'] == 'es') {
			$config2 = file_get_contents("./conf/configES.json");

			console_log("COOKIE len not set, creating it");
			setcookie('len','es', time()+(86400*300), '/');

			$_COOKIE['len'] = 'es';
		}elseif ($_GET['len'] == 'en') {
			$config2 = file_get_contents("./conf/configEN.json");

			console_log("COOKIE len not set, creating it");
			setcookie('len','en', time()+(86400*300), '/');

			$_COOKIE['len'] = 'en';
		}else{
			$config2 = file_get_contents("./conf/configPT.json");

			console_log("COOKIE len not set, creating it");
			setcookie('len','pt', time()+(86400*300), '/');

			$_COOKIE['len'] = 'pt';
		}

	}else{

		if (isset($_COOKIE['len'])) {    // IS set on cookie?
			console_log("COOKIE len is set on cookie");

			if ($_COOKIE['len'] == 'es') {
				$config2 = file_get_contents("./conf/configES.json");
			}elseif ($_COOKIE['len'] == 'en') {
				$config2 = file_get_contents("./conf/configEN.json");
			}else{
				$config2 = file_get_contents("./conf/configPT.json");
			}

		}else{
			console_log("COOKIE len not set");
			$config2 = file_get_contents("./conf/configPT.json");
			$_COOKIE['len'] = 'pt';
		}
	}


	// See if contador cookie is set
	if (!isset($_COOKIE['contador'])) {
		console_log("COOKIE contador not set, creating it");
		setcookie('contador',1, time()+(86400*300), '/');
		$_COOKIE['contador']=1;
	}else {
		console_log("COOKIE contador set, +1");
		setcookie('contador' , $_COOKIE['contador']+1 , time()+(86400*300),'/');
		$_COOKIE['contador']=1+$_COOKIE['contador'];
	}


	// Check for Usuario
	if (isset($_COOKIE['usuario'])){
		$usuario = $_COOKIE['usuario'];
	}else{
		$_COOKIE['usuario'] = 'Cesar Salazar';
		$usuario = $_COOKIE['usuario'];
	}

	console_log("Cookie contador: ".$_COOKIE['contador']);
	console_log("Cookie len: ".$_COOKIE['len']);
	console_log("Cookie usuario: ".$_COOKIE['usuario']);

		// Decode info
	$config = json_decode($config2,true);
	$datos_estudiantes = json_decode(file_get_contents("./datos/index.json"),true);
?>
<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">
		
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

		<script type="text/javascript" src="./js/index.js"></script>

		<title>ATI[UCV] 2020-U</title>

	</head>

	<body>

		<?php $current="index"?>
	    <?php include_once("pre.php") ?>

	    <section>
	       	<div class="container p-4">
				<div class="w-75 h-75 row">
					
					<div id="carouselID" class="carousel slide" data-ride="carousel">

					  <div id="carouselInnerID" class="carousel-inner">

					    <div class="carousel-item active">
					    	<img class="d-block w-100 h-100"
					      	   id="26272390"
					      	   >
					    </div>

					    <?php foreach ($datos_estudiantes as $estudiante): ?>
					    <div class="carousel-item">
					      <img class="d-block w-100 h-100" 
					      	   src="<?php echo $estudiante['imagen'] ;?>"
					      	   alt="<?php echo $estudiante['ci']  ;?>"
					      	   id="<?php echo $estudiante['ci']  ;?>"
					      	   >

					      <div class="carousel-caption d-none d-md-block">
						    <h5><?php echo $estudiante['nombre']; ?></h5>
						  </div>
					    </div>
						<?php endforeach; ?>

					  </div>



					  <a class="carousel-control-prev" href="#carouselID" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>

					  <a class="carousel-control-next" href="#carouselID" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>

				</div>

				<div id="perfil_info" class="row margin-top-30px">
					<h5>Informacion:</h5>
					<table id="perfil_info_table" class="row">
						<tr>
						<td id="nombre_perfil" class="display_inline_flex"></td>
						</tr>

						<tr>
						<td id="descripcion_perfil" class="display_inline_flex"></td>
						</tr>

						<tr>
						<td id="color_perfil" class="display_inline_flex"></td>
						</tr>

						<tr>
						<td id="libro_perfil" class="display_inline_flex"></td>
						</tr>

						<tr>
						<td id="musica_perfil" class="display_inline_flex"></td>
						</tr>

						<tr>
						<td id="video_perfil" class="display_inline_flex"></td>
						</tr>

						<tr>
						<td id="lenguajes_perfil" class="display_inline_flex"></td>
						</tr>

						<tr>
							<td id="email_perfil" class="display_inline_flex"></td>
						</tr>

					</table>
				</div>
			</div>
	    </section>

	    <?php include_once("post.php"); ?>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

	</body>
</html>