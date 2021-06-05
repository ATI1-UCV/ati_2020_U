<?php
	function console_log($output, $with_script_tags = true) {
	    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
	');';
	    if ($with_script_tags) {
	        $js_code = '<script>' . $js_code . '</script>';
	    }
	    echo $js_code;
	}

	if (session_status() == PHP_SESSION_NONE) {
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


	// See if ci is set on URL
	if (isset($_GET['ci'])){
		console_log("GET ci is set on URL");
		$cedula = $_GET['ci'];
	}else{
		console_log("GET ci is NOT set on URL, default 27223325");
		$cedula = '27223325';
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

	console_log("Cookie contador: ".$_COOKIE['contador']);
	console_log("Session len: ".$_SESSION['len']);
	
	// Decode info
	$config = json_decode($config2,true);
	$perfil = json_decode(file_get_contents("./".$cedula."/perfil.json"),true);


	// Check for Usuario
	if (isset($_SESSION['usuario'])){
		$usuario = $_SESSION['usuario'];
	}else{
		$_SESSION['usuario'] = $perfil['nombre'];
		$usuario = $_SESSION['usuario'];
	}
?>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

		<script src="./js/perfil.js" type="text/javascript"></script>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


		<link rel="stylesheet" href="./css/style.css"  type="text/css">
		<link rel="stylesheet" href="./css/perfil.css"  type="text/css">
		
		<title>Cesar Salazar</title>
	</head>

	<body>

	    <?php $current="perfil"?>
	    <?php include_once("pre.php") ?>

	    <section class="container-fluid">
	       <div class="row">

	       		<div class="image_text_next col-xs-4 col-md-4 col-lg-4">
					<img id="profile_photo" 
						 class="top_left_border"
						 src=<?php echo "./".$cedula."/".$perfil['imagen']; ?>>
				</div>

				<div class="col-xs-8 col-md-8 col-lg-8">
					<div class="info_card container-fluid">

						<h1 id="name_person" class="row">
							<?php echo $perfil['nombre']; ?>
						</h1>

						<p id="description_person" class="row">
							<?php 
							echo "<i>" . $perfil['descripcion'] . "</i>";
							?>
						</p>

						<table id="like_person" class="row">
							<tr>
							<td id="color_config"><?php echo $config['color'] .": "; ?></td>
							<td id="color_perfil"><?php echo $perfil['color']; ?> </td>
							</tr>

							<tr>
							<td id="libro_config"><?php echo $config['libro'] .": "; ?></td>
							<td id="libro_perfil"><?php echo $perfil['libro']; ?></td>
							</tr>

							<tr>
							<td id="musica_config"><?php echo $config['musica'] .": "; ?></td>
							<td id="musica_perfil"><?php echo $perfil['musica']; ?></td>
							</tr>

							<tr>
							<td id="video_config"><?php echo $config['video_juego'] .":"?></td>
							<td id="video_perfil"><?php foreach ($perfil['video_juego'] as $value) {
									echo " ".$value;
								  }
							?></td>
							</tr>

							<tr>
							<td id="lenguajes_config"><?php echo $config['lenguajes'] .":"; ?></td>
							<td id="lenguajes_perfil"><?php foreach ($perfil['lenguajes'] as $value) {
									echo " ".$value;
								  }
							?></td>
							</tr>

						</table>
						
						<p id="contact_person" class="row">
							<div style="float: left;" id="email_config">
								<?php
									echo $config['email'];
								?>
							</div>
							<div style="float: left;">
								<?php echo " <a href = \"mailto: bitemecesar@gmail.com\">".$perfil['email']."</a>";?>
							</div>
						</p>
					</div>
				</div>
	       </div>
			
			 
	    </section>

	    <?php include_once("post.php"); ?>
	</body>
</html>