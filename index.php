<?php
    session_start();
	$len = htmlspecialchars($_GET["len"]); 
	if(isset($_COOKIE['idioma'])){
		if($len != NULL){
			setcookie('idioma', $len , time() + 5 * 60);
		}
	}else{
		setcookie('idioma', "es" , time() + 5 * 60);
	}
	$path_jsonPerfil = "conf/config".strtoupper($_COOKIE['idioma']).".json";
    $data = @file_get_contents($path_jsonPerfil);
	$data1 = json_decode($data, true);
?>
<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">
		<script src="datos/index.json"></script>
		<title><?php echo $data1["sitio"][0].$data1["sitio"][1].$data1["sitio"][2]?></title>
	</head>
	<body>
	    <header>
			<nav>
				<ul>
					<li class="logo"><?php echo $data1["sitio"][0]."<small>".$data1["sitio"][1]."</small>".$data1["sitio"][2]?></li>
					<li class="saludo"><!--Hola, Eduardo Suarez--><?php echo $data1["saludo"]?></li>
					<li class="busqueda">
						<form class="buscador">
							<input type="text" placeholder="<?php echo $data1["nombre"]?>">
							<input type="button" value="<?php echo $data1["buscar"]?>">
						</form>
					</li>
				</ul>	
			</nav> 
	    </header>
	    <section>
			<div class="ListaPerfiles">
            </div>
	    </section>
		<div class="cont_perfil">
				<div class="grid-container">
					<div class="grid-item">
						<img class="imagen" src="">
					</div>
					<div class="grid-item-marco">
						<div id="texto1"><!--Eduardo Suarez--></div>
						<p id="texto2"><!--Hola soy estudiante de Computacion en la Universidad Central De Venezuela, tengo 23 años. Actualmente 
						me encuentro estudiando mi 5to semestre estudiando ATI, Sistemas de Informacion y Aprendizaje Supervisado.
						En el futuro gustaria desarrollarme en desarrollo de aplicaciones e inteligencia artifical.--></p>

						<table class = "TABLA">
							<tr>
								<td class="Tcolor"><!--Mi color favorito es:--><?php echo $data1["color"]?></td>
								<td class="Tcolor"><!--Naranja--></td>
							</tr>
							<tr>
								<td class="Tlibro"><!--Mi libro favorito es:--><?php echo $data1["libro"]?></td>
								<td class="Tlibro"><!--Historias de hielo y fuego--></td>
							</tr>
							<tr>
								<td class="Tmusica"><!--Mi estilo de musica favorito es:--><?php echo $data1["musica"]?></td>
								<td class="Tmusica"><!--House--></td>
							</tr>
							<tr>
								<td class="Tvideo_juego"><!--Mi videojuego favorito es:--><?php echo $data1["video_juego"]?></td>
								<td class="Tvideo_juego"><!--League of Legends--></td>
							</tr>
							<tr>
								<td id="texto3" class="Tlenguajes"><!--Lenguajes aprendidos:--><?php echo $data1["lenguajes"]?></td>
								<td id="texto3" class="Tlenguajes"><!--C++, Python--></td>
							</tr>
						</table>
						<p class="Temail"> <!--Si necesitan comunicarse conmigo me pueden escribir a:--><?php echo $data1["email"]?>
							<a href="https://mail.google.com/mail/?view=cm&fs=1&to=eduardosuarez.ucv@gmail.com">
							<span id="texto4" class="Temail"><!--eduardosuarez.ucv@gmail.com--></span>
							</a>
						</p>

					</div>
				</div>
			</div>
	    <footer>
		<?php echo $data1["copyRight"]?>
	        <!--Copyright © 2020 Escuela de computación - ATI. Todos los derechos reservados-->
		</footer>
		<script src="js/index.js"></script>
	</body>
</html>
