<?php
	//Iniciamos la sesion 
	session_start(); 

	//Cooki de visitas
	if(isset($_COOKIE['contador'])){
		setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60);
	} else {
		setcookie('contador', 1, time() + 365 * 24 * 60 * 60);
	}

	//usuario
	if(isset($_SESSION["usuario"])){
		$nombreSaludo = ', ' . $_SESSION["usuario"];
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
<!-- links y scripts -->
	<!-- icon  -->
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
	<!-- boostrap 4.6.0 -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<!-- hojas css  -->
		<link rel="stylesheet" href="./css/perfil.css"  type="text/css">
		<link rel="stylesheet" href="./css/style.css"  type="text/css">

		<title></title>
	</head>

	<body>
		<?php  
		function process($arreglo){
			//procesa video_juego y lenguajes de perfil.json para devolver un string con el contenido
			if(gettype($arreglo) === 'string'){
				return $arreglo;
			}else{
				$salida = $arreglo[0];
				if(sizeof($arreglo) > 1){
					for($i = 1; $i < sizeof($arreglo);$i++){
						$salida = $salida . ", " . $arreglo[$i];
					}
				}
				return $salida;																
			}

		}

		function reinicar(){
			//destruye la sesion y el cookie
			session_destroy();
			setcookie('contador', $_COOKIE['contador'] + 1, time() -1);
		}
		
		//abrir config.json segun el idioma
		if($len === 'es'){
			$data = file_get_contents("./conf/configES.json");
		} else if ($len === 'en'){
			$data = file_get_contents("./conf/configEN.json");
		} else if($len === 'pt'){
			$data = file_get_contents("./conf/configPT.json");
		}
		$configData = json_decode($data, true);

		//Recibimos ci, si no tomo por defecto la mia
		if(isset($_GET['ci'])){
			$ci = $_GET['ci'];
		}else{
			$ci = '25872491';
		}
		
		//abrir perfil.json segun a cedula recibida
		$dataPerfil = file_get_contents("./$ci/perfil.json");
		$perfil = json_decode($dataPerfil, true);

		//Variables de config.json segun el idioma
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
		
		//variables de perfil.json
		$nombreUsuario = $perfil["nombre"];
		$descripcion = $perfil["descripcion"];		
		$color = $perfil["color"];
		$libro = $perfil["libro"];
		$musica = $perfil["musica"];
		$juego = $perfil["video_juego"];
		$lenguaje = $perfil["lenguajes"];	
		$email = $perfil["email"];


		//determinar el nombre de la imagen 
		$img_archivo = ["png","PNG","jpg","JPG","jpeg","JPEG","gif","GIF"];
		foreach($img_archivo as $imagen){
			if(file_exists("./{$ci}/{$ci}.{$imagen}")){
				$imagen_ruta = "./{$ci}/{$ci}.{$imagen}";
				break;
			}
		}
		
		//Texto para contactar email
		$tag = "<a href='mailto:$email'>$email</a>";
		$textoContacto =  str_replace("[email]", $tag, $confEmail );

		//header
		include_once('./pre.php');
		?>
	    
	    <section>
	       
			 <div class="container perfil">
				 <div class="row">
					 <div class="col-xs-12 col-sm-12 col-md-5 justify-content-center">
						 <?php 
						 	echo("<img id='img-perfil' class='mx-auto d-block' src=$imagen_ruta>");
						 ?>
						
					 </div>
					 <div class="col-xs-12 col-sm-12 col-md-6 descripcion">
						<h1 id="nombre-perfil">
							<?php 
								echo("$nombreUsuario");
							?>
						</h1>
								
						<p id="desc-perfil">
							<?php 
								echo("<em>$descripcion</em>");
							?>
						</p>
					
						<table id="tabla-perfil">
							<?php 
								$juegos = process($juego);
								$lenguajes = process($lenguaje);
								echo("
									<tr>
										<td>$confColor:</td>
								 		<td>$color</td>
									</tr>
									<tr>
										<td>$confLibro:</td>
								 		<td>$libro</td>
									</tr>
									<tr>
										<td>$confMusica:</td>
								 		<td>$musica</td>
									</tr>
									<tr>
										<td>$confJuego:</td>
								 		<td>$juegos</td>
									</tr>			
									<tr>
										<td><strong>$confLenguaje:</strong></td>
										<td><strong>$lenguajes</strong></td>
 									</tr>
									 ");
							?>
						</table>
						
						<p id="contacto-perfil">
							<?php 
								echo("$textoContacto");
							?>
						</p>
					</div>
				 </div>
			</div>
			
		</section>
		
		<!-- footer -->
		<?php
			include_once('./post.php');


			//Sesion destroy
			// reinicar();

		?>
	
<!-- scripts -->
	<!-- jquery 3.5.1 -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!-- boostrap 4.6.0 -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<!-- javascript - perfil.js | no se usa -->
		<script src="./js/perfil.js"></script>
	</body>
</html>
