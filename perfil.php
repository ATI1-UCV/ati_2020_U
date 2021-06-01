<?php
session_start();
if (isset($_COOKIE["contador"])) {
	setcookie("contador", $_COOKIE["contador"] + 1, time() + 60 * 60, "/");
	if($ok) {
		$_COOKIE["contador"]++;
	}
} else {
	setcookie("contador", 1, time() + 60 * 60, "/");
	$_COOKIE["contador"] = 1;
}
if (isset($_GET["nombre"])) {
	$_SESSION["nombre"] = $_GET["nombre"];
} else if (isset($_GET["usuario"])) {
	$_SESSION["nombre"] = $_GET["nombre"];
} else {
	$nombre = $_SESSION["nombre"] ?? "Daniel Vieira";
	$_SESSION["nombre"] = $nombre;
}
?>

<!DOCTYPE HTML>
<html>
<?php
$nombre .= " (visita " . $_COOKIE["contador"]. ")";

$ci = $_GET["ci"] ?? "26272390";
$perfil = file_get_contents($ci . "/perfil.json");
$imagen = "";
$files = glob($ci . "/*");
foreach ($files as $filename) {
	if ($filename != $ci . "/perfil.json") {
		$imagen = $filename;
	}
}
if (isset($_GET["len"])) {
	$len = $_GET["len"];
	$_SESSION["len"] = $_GET["len"];
} else {
	$len = $_SESSION["len"] ?? "es";
}
if (strtolower($len) == "en") {
	$_SESSION["len"] = "en";
	$config = file_get_contents("conf/configEN.json");
} else if (strtolower($len) == "pt") {
	$_SESSION["len"] = "pt";
	$config = file_get_contents("conf/configPT.json");
} else {
	$_SESSION["len"] = "es";
	$config = file_get_contents("conf/configES.json");
}
$perfilcontent = json_decode($perfil, TRUE);
$configcontent = json_decode($config, TRUE);

$inicio = "<li class=\"busqueda col fcenter\"><a id=\"inicio\" href=\"#\">" . $configcontent["home"] . "</a></li>";
include_once "pre.php";
include_once "post.php";
?>
<script type="text/javascript">
	var len_js = "<?php echo $len; ?>";
	var contador = <?php echo $_COOKIE["contador"]; ?>;
</script>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="UTF-8">
	<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/perfil.css" type="text/css">
	<title>Daniel Vieira</title>
</head>

<body>
	<header>
		<nav id="nav" class="container-fluid">
			<ul class="row">
				<?php
				echo $sitio;
				echo $saludo;
				echo $inicio;
				echo $dropdown;
				?>
			</ul>
		</nav>
		<script src="js/script.js"></script>
		<script type="text/javascript">
			var perfil = {
				nombre: "<?php echo $_SESSION["nombre"] ?>"
			};
		</script>
		<script src="js/lenguaje.js"></script>
	</header>
	<section>
		<div class="container-fluid">
			<div class="size">
				<div class="row size">
					<div class="col-md-4 botspace">
						<img src=<?php echo $imagen ?> id="imagen">
					</div>
					<div id="shadow" class="col-md botspace">
						<h1 id="nombre">
							<?php echo $perfilcontent["nombre"]; ?>
						</h1>
						<p id="descripcion" class="cursiva">
							<?php echo $perfilcontent["descripcion"]; ?>
						</p>
						<div class="row">
							<p class="col" id="column1">
								<?php echo $configcontent["color"];
								echo
								"<br/>";
								echo $configcontent["libro"];
								echo
								"<br/>";
								echo $configcontent["musica"];
								echo
								"<br/>";
								echo $configcontent["video?juego"];
								echo
								"<br/>";
								?>
							</p>
							<p class="col" id="column2">
								<?php echo $perfilcontent["color"];
								echo
								"<br/>";
								echo $perfilcontent["libro"];
								echo
								"<br/>";
								if (is_array($perfilcontent["musica"])) {
									$len = count($perfilcontent["musica"]);
									echo $perfilcontent["musica"][0];
									for ($i = 1; $i < $len; $i++) {
										echo ", ";
										echo $perfilcontent["musica"][$i];
									}
								} else {
									echo $perfilcontent["musica"];
								}
								echo
								"<br/>";
								echo $perfilcontent["video?juego"];
								echo
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
								$len = count($perfilcontent["lenguajes"]);
								for ($i = 1; $i < $len; $i++) {
									echo ", ";
									echo $perfilcontent["lenguajes"][$i];
								}
								?>
							</p>
						</div>
						<div class="row">
							<p id="contacto">
								<?php $str = str_replace("[email]", $perfilcontent["email"], $configcontent["email"]);
								echo "<a href=\"mailto:danielvieiucv@gmail.com\">";
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
	<footer id="footer" class="center">
		<?php echo $footer ?>
	</footer>
</body>
<script src="js/jquery-3.6.0.min.js"></script>

</html>