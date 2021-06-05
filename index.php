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
		console_log("GET len is set on URL, savin to session");

		if ($_GET['len'] == 'es') {
			$config2 = file_get_contents("./conf/configES.json");
			$_SESSION['len'] = 'es';
		}elseif ($_GET['len'] == 'en') {
			$config2 = file_get_contents("./conf/configEN.json");
			$_SESSION['len'] = 'en';
		}else{
			$config2 = file_get_contents("./conf/configPT.json");
			$_SESSION['len'] = 'pt';
		}

	}else{

		if (isset($_SESSION['len'])) {    // IS set on session?
			console_log("SESSION len is set on session");

			if ($_SESSION['len'] == 'es') {
				$config2 = file_get_contents("./conf/configES.json");
			}elseif ($_SESSION['len'] == 'en') {
				$config2 = file_get_contents("./conf/configEN.json");
			}else{
				$config2 = file_get_contents("./conf/configPT.json");
			}

		}else{
			$config2 = file_get_contents("./conf/configPT.json");
			$_SESSION['len'] = 'pt';
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
	if (isset($_SESSION['usuario'])){
		$usuario = $_SESSION['usuario'];
	}else{
		$_SESSION['usuario'] = 'Cesar Salazar';
		$usuario = $_SESSION['usuario'];
	}

	console_log("Cookie contador: ".$_COOKIE['contador']);
	console_log("Session len: ".$_SESSION['len']);

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

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">
		
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

		<script type="text/javascript" src="./index.js"></script>

		<title>ATI[UCV] 2020-U</title>

	</head>

	<body>

		<?php $current="index"?>
	    <?php include_once("pre.php") ?>

	    <section>
	       
	       	<div class="container">
			<ul class="row">
				<?php 
				foreach ($datos_estudiantes as $estudiante) {
					echo "
						<li class=\"square_display_profile\">
								<a href=\"./perfil.php?len=".$_SESSION['len']."&ci=".$estudiante['ci']."\">
								<img src=".$estudiante['imagen']."
									 alt=".$estudiante['nombre']."
									 width=\"100px\" 
									 height=\"120px\">
								<h3>".$estudiante['nombre']."</h3>
								</a>
						</li>
						 ";
				}
				?>
			</ul>
			</div>
			 
	    </section>

	    <?php include_once("post.php"); ?>
	</body>
</html>