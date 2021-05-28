<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="UTF-8">
	<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="perfil.css" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-;echo0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7;echoAMvyTG2x" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds;echo3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<title>Daniel Vieira</title>
</head>
<body>
	<?php
		$perfil = file_get_contents("perfil.json");
		$len = $_GET["len"] ?? "es";
		if(strtolower($len) == "en") {
			$config = file_get_contents("conf/configEN.json");
		} else if (strtolower($len) == "pt") {
			$config = file_get_contents("conf/configPT.json");
		} else {
			$config = file_get_contents("conf/configES.json"); 
		}
		$perfilcontent = json_decode($perfil, TRUE);
		$configcontent = json_decode($config, TRUE);
	?>
	<header>
		<nav id="nav" class="container-fluid">
			<ul class="row ">
				<li id="sitio" class="logo center col">
					<?php echo $configcontent["sitio"][0]; echo "<small>"; echo $configcontent["sitio"][1]; echo "</small>"; echo $configcontent["sitio"][2];?>
				</li>
				<li id="saludo" class="saludo center col">
					<?php echo $configcontent["saludo"]; echo " "; echo $perfilcontent["nombre"]; ?>
				</li>
				<li class="busqueda col fcenter"><a id="inicio" href="../index.html"><?php echo $configcontent["home"];?></a></li>
			</ul>
		</nav>
	</header>
	<section>
		<div class="container-fluid">
			<div class="size">
				<div class="row size">
					<div class="col-md-4 botspace">
						<img src=<?php echo $perfilcontent["imagen"]; ?> id="imagen">
					</div>
					<div id="shadow" class="col-md botspace">
						<h1 id="nombre">
							<?php echo $perfilcontent["nombre"];?>
						</h1>
						<p id="descripcion" class="cursiva">
							<?php echo $perfilcontent["descripcion"];?>
						</p>
						<div class="row">
							<p class="col" id="column1">
								<?php echo $configcontent["color"]; echo
										   "<br/>"; echo $configcontent["libro"]; echo
										   "<br/>"; echo $configcontent["musica"]; echo
										   "<br/>"; echo $configcontent["video?juego"]; echo
										   "<br/>";
								?>
							</p>
							<p class="col" id="column2">
								<?php echo $perfilcontent["color"]; echo
										   "<br/>"; echo $perfilcontent["libro"]; echo
										   "<br/>"; echo $perfilcontent["musica"]; echo
										   "<br/>"; echo $perfilcontent["video?juego"]; echo
										   "<br/>";
								?>
							</p>
						</div>
						<div class="row bold">
							<p class="col" id="lenguajes">
								<?php echo $configcontent["lenguajes"]; ?>
							</p>
							<p class="col" id="mis_lenguajes">
								<?php echo $perfilcontent["lenguajes"][0]; 
									for($i=1; $i < 4; $i++) {
										echo ", "; echo $perfilcontent["lenguajes"][$i];
									}
								?>
							</p>
						</div>
						<div class="row">
							<p id="contacto">
								<?php $str = str_replace("[email]", $perfilcontent["email"], $configcontent["email"]); 
									echo "<a href=\"mailto:danielvieiucv@gmail.com\">" ;
									echo $str;
									echo "</a>";
								?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer id="footer" class="center" >
		<?php echo $configcontent["copyRight"]; ?>
	</footer>
</body>
<script src="jquery-3.6.0.min.js"></script>
<script src="script.js"></script>

</html>
