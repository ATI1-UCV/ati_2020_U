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
		<link rel="stylesheet" href="perfil.css"  type="text/css">
		<link rel="stylesheet" href="../css/style.css"  type="text/css">

		<title></title>
	</head>

	<body>
		<?php  
		/*function console_log( $data ){
			  echo '<script>';
			  echo 'console.log('. json_encode( $data ) .')';
			  echo '</script>';
			}
			*/
		
		
		//se recibe con ?len=en|es|pt
		if (isset($_GET["len"])){
			$len = $_GET["len"];
		// si esta vacio se toma es por defecto
		} else {
			$len = 'es';
		}
		//var_dump($len);

		
		//abrir config.json segun el idioma
		if($len === 'es'){
			$data = file_get_contents("../conf/configES.json");
		} else if ($len === 'en'){
			$data = file_get_contents("../conf/configEN.json");
		} else if($len === 'pt'){
			$data = file_get_contents("../conf/configPT.json");
		}
		$configData = json_decode($data, true);


		//abrir perfil.json de la carpeta actual
		$dataPerfil = file_get_contents("./perfil.json");
		$perfil = json_decode($dataPerfil, true);
	
		//Variables de config.json
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
		$nombre = $perfil["nombre"];
		$descripcion = $perfil["descripcion"];		
		$color = $perfil["color"];
		$libro = $perfil["libro"];
		$musica = $perfil["musica"];
		$juego = $perfil["video_juego"];
		$lenguaje = $perfil["lenguajes"];	
		$email = $perfil["email"];
		$imagen = $perfil["imagen"];
		
		//Texto para contactar email
		$tag = "<a href='mailto:$email'>$email</a>";
		$textoContacto =  str_replace("[email]", $tag, $confEmail ) ;

		?>
	    <header>
			<nav class="container-fluid">
				<ul class="row">
					<li class="col-xs-12 col-sm-12 col-md-5 logo">
						<?php 
							echo ("$sitio[0]<small>$sitio[1]</small> $sitio[2]");
						?>
					</li>
					<li class="col-xs-12 col-sm-6 col-md-3 saludo">
						<?php 
							echo ("$saludo, $nombre");
						?>
					</li>
					<li class="col-xs-11 col-sm-5 col-md-3 busqueda"><a href="../index.html">
						<?php 
							echo ("$home");
						?>
					</a></li>
				</ul>	
			</nav> 
	    </header>
	    <section>
	       
			 <div class="container perfil">
				 <div class="row">
					 <div class="col-xs-12 col-sm-12 col-md-6 justify-content-center">
						 <?php 
						 	echo("<img id='img-perfil' class='mx-auto d-block' src=./$imagen>");
						 ?>
						
					 </div>
					 <div class="col-xs-12 col-sm-12 col-md-6 descripcion">
						<h1 id="nombre-perfil">
							<?php 
								echo("$nombre");
							?>
						</h1>
								
						<p id="desc-perfil">
							<?php 
								echo("<em>$descripcion</em>");
							?>
						</p>
					
						<table id="tabla-perfil">
							<?php 
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
								 		<td>$juego[0], $juego[1]</td>
									</tr>
									<tr>
										<td><strong>$confLenguaje:</strong></td>
										<td><strong>$lenguaje[0], $lenguaje[1]</strong></td>
 									</tr>
									");
							?>
						</table>
						
						<p id="contacto-perfil">
							<?php 
								echo("$textoContacto")
							?>
						</p>
					</div>
				 </div>
			</div>
			
		</section>
		
		<footer><div class="footer">
			<?php 
				echo ("$copyRight");
				
			?>
		</div></footer>
	
<!-- scripts -->
	<!-- jquery 3.5.1 -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!-- boostrap 4.6.0 -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<!-- javascript - perfil.js | no se usa -->
		<script src="perfil.js"></script>
	</body>
</html>
