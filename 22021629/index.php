<?php
$configs = [
  "en" => "configEN.json",
  "es" => "configES.json",
  "pt" => "configPT.json",
];

$file_name = $configs[$_GET["len"] ?? "es"];
$config = json_decode(file_get_contents("./$file_name"), true);
$perfil = json_decode(file_get_contents("./perfil.json"), true);
?>
<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="./css/style.css"  type="text/css">
		<link rel="stylesheet" href="./css/index.css"  type="text/css">
		<link rel="stylesheet" href="./perfil.css"  type="text/css">
		<title> Jose Daniel </title>
		<link
		rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
	  />
       
		<script type="text/javascript" src="jquery-3.6.0.min.js"></script>
        <script type="text/javascript" >
           /* function llenar(){
			   para funcionar http://192.168.99.100/
			   con firewall abajo
				document.title = perfil.nombre;
				$("#footer").html( config.copyRight)
				
				$("#logo").html( config.sitio[0] + "<span>" + config.sitio[1] +  "</span> " + config.sitio[2])
				
				$("#saludo").html(config.saludo + perfil.nombre)
				$("#busqueda").html( "<a href='../index.html'>" + config.home + "</a>")
				
				$("#nombre").html(perfil.nombre)
				$("#descripcion").html( perfil.descripcion)
				
				
				
				$("#color_fav").html( config.color)
				$("#color").html( perfil.color)
				$("#libro_fav").html( config.libro)
				$("#libro").html( perfil.libro)
				$("#musica_fav").html( config.musica)
				$("#musica").html( perfil.musica)
				$("#video_juego_fav").html( config.video_juego)
				$("#video_juego").html( perfil.video_juego.toString())

				$("#lenguajes_fav").html( config.lenguajes)
				$("#lenguajes").html( perfil.lenguajes.toString())

				correoEnlace = "<a href=\"[email]\">[email]</a>".replace("[email]", perfil.email).replace("[email]", perfil.email);

				$("#correo").html( config.email.replace("[email]", correoEnlace))

				 onload="llenar()"
			}*/
		</script>
	</head>
	<body >
	    <header>
			<nav>
				<ul>
					<li class="logo" id="logo"> <?php
						echo $config["sitio"][0];
					  ?>
					  <small>
						<?php
						  echo $config["sitio"][1];
						?>
					  </small>
					  <?php
						echo $config["sitio"][2];
					  ?></li>
					<li class="saludo" id="saludo"><?php
						echo $config["saludo"];
					  ?><?php
					  echo $perfil["nombre"];
					?>  </li>
					<li class="busqueda" id="busqueda"><a href="../index.html">
						<?php
						  echo $config["home"];
						?>
					  </a></li>
				</ul>	
			</nav> 
	    </header>
	    <section>
	       
			
 
	<div  class="container-fluid">
        <div class="row">
				<div class="col-xl-3 col-md-6 col-12 " > <img  id="imagen" src="22021629.jpg"> </div>
					
				 	
				    <div id="contenido" class="col-xl-9 col-md-6 col-12" >
					  
						<tr><td><p id="nombre"><?php
							echo $perfil["nombre"];
						  ?></p></td></tr>
						<tr><td><p id="descripcion"><?php
							echo $perfil["descripcion"];
						  ?></p></td></tr>
						<tr><td>
							  <table id="agenda">
								<tr><td id="color_fav"><?php
									echo $config["color"];
								  ?></td><td id="color"> <?php
									echo $perfil["color"];
								  ?></td></tr>
								<tr><td id="libro_fav"> <?php
									echo $config["libro"];
								  ?></td><td id="libro"><?php
									echo $perfil["libro"];
								  ?></td></tr>
								<tr><td id="musica_fav"> <?php
									echo $config["musica"];
								  ?></td><td id="musica"> <?php
									echo $perfil["musica"];
								  ?></td></tr>
								<tr><td id="video_juego_fav"> <?php
									echo $config["video_juego"];
								  ?></td><td id="video_juego"><?php
									echo join(", ", $perfil["video_juego"]);
								  ?></td></tr>
								<tr><td ><span class="negrita" id="lenguajes_fav"><?php
									echo $config["lenguajes"];
								  ?>
								</td></span></td><td><span class="negrita" id="lenguajes"><?php
									echo join(", ", $perfil["lenguajes"]);
								  ?></span></td></tr>
								<tr><td id="correo">   <?php
									$email = $perfil["email"];
									$mailto = $config["email"];
									echo str_replace(
									  "[email]",
									  "<a href='mailto: $email'> $email </a>",
									  $mailto,
									);
								  ?></td></tr>
							  </table>
							 
							</td>
						</tr>
						
					 
				    
				</div>	
			</div>
		</div>
	
	    </section>
	    <footer id="footer"  class="text-center p-3  bg-primary text-white" style="background-color: rgba(0, 0, 0, 0.2);">
	        <?php
        echo $config["copyRight"];
      ?>
	    </footer>
		 <!-- Bootstrap -->
		
   
	   <!-- JQuery -->
	   <script
		 src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
		 integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
		 crossorigin="anonymous"
	   ></script>
	</body>
</html>