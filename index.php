<?php
session_start();
if(isset($_GET["usuario"])) {
	$_SESSION["usuario"] = $_GET["usuario"];
} else {
	$_SESSION["usuario"] = "Daniel Vieira";
}
if (isset($_COOKIE["contador"])) {
	setcookie("contador", $_COOKIE["contador"] + 1, time() + 60 * 60);
} else {
	setcookie("contador", 1, time() + 60 * 60);
}
$len = strtoupper($_GET["len"] ?? "es");
if(!($len == "ES" || $len == "EN" || $len == "PT")){
	$len = "ES";
}
setcookie("len", $len, time() + 60 * 60);
?>

<!DOCTYPE HTML>
<html>
<?php
$file = "conf/config" . $len . ".json";
$config = file_get_contents($file);
$datos = file_get_contents("datos/index.json");
?>
<script type="text/javascript">
	var config = <?php echo $config; ?>;
	var listado = <?php echo $datos; ?>;
	var nombre = "<?php echo $_SESSION["usuario"]; ?>";
</script>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="UTF-8">
	<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/index.css" type="text/css">
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
	<link rel="stylesheet" href="css/perfil.css" type="text/css">
	<title>ATI[UCV] 2020-U</title>
</head>

<body>
	<header>
		<nav>
			<ul class="row">
				<li id="sitio" class="logo col"></li>
				<li id="saludo" class="saludo col"></li>
				<li class="busqueda col">
					<div id="busqueda" class="row">
						<input id="name" class="col-8" type="text" oninput="busqueda(); return false;">
						<input id="buscar" class="btn btn-light col-3" type="submit" onclick="busqueda(); return false;">
					</div>
				</li>
			</ul>
		</nav>
	</header>
	<section id="sec">
		<div class="container text-center my-3 h-50">
			<div class="row mx-auto my-auto">
				<div id="carrusel" class="carousel slide w-100" data-ride="carousel" data-touch="true">
					<a class="carousel-control-prev col-1" href="#carrusel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<div id="lista" class="carousel-inner w-100 col-10" role="listbox" data-interval="10000">
					</div>
					<a class="carousel-control-next col-1" href="#carrusel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		<div id="perfil" class="d-none">
			<div class="container-fluid">
				<div class="row h-auto">
					<div class="row size botspace">
						<div class="col-md-4 h-auto">
							<img id="imagen">
						</div>
						<div id="shadow" class="col-md h-auto">
							<h1 id="nombre" class="bold"></h1>
							<p id="descripcion" class="cursiva"></p>
							<div class="row h-auto">
								<p class="col" id="config_color"></p>
								<p class="col" id="perfil_color"></p>
							</div>
							<div class="row h-auto">
								<p class="col" id="config_libro"></p>
								<p class="col" id="perfil_libro"></p>
							</div>
							<div class="row h-auto">
								<p class="col" id="config_musica"></p>
								<p class="col" id="perfil_musica"></p>
							</div>
							<div class="row h-auto">
								<p class="col" id="config_juego"></p>
								<p class="col" id="perfil_juego"></p>
							</div>
							<div class="row bold h-auto">
								<p class="col" id="lenguajes"></p>
								<p class="col" id="mis_lenguajes"></p>
							</div>
							<div class="row h-auto">
								<p id="contacto" class="col"></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer id="footer">
	</footer>
	<script src="js/index.js"></script>
</body>

</html>