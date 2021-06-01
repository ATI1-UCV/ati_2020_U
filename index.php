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
} else if(isset($_GET["usuario"])) {
	$_SESSION["nombre"] = $_GET["nombre"];
} else {
	$nombre = $_SESSION["nombre"] ?? "Daniel Vieira";
	$_SESSION["nombre"] = $nombre;
}

$nombre .= " (visita " . $_COOKIE["contador"] . ")";
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
?>
<script type="text/javascript">
	var len_js = "<?php echo $len; ?>";
	var contador = <?php echo $_COOKIE["contador"]; ?>;
</script>
<?php
$configcontent = json_decode($config, TRUE);
$busqueda = "<li id=\"busqueda\" class=\"col busqueda\">
		<form>
			<input id=\"name\" placeholder= \"" . $configcontent["nombre"] . "..." . "\"type=\"text\" oninput=\"busqueda(); return false;\">
			<input id=\"buscar\" class=\"btn btn-light\" type=\"submit\" value=\"" . $configcontent["buscar"] . "\"onclick=\"busqueda(); return false;\">
		</form>
	</li>";
include_once "pre.php";
include_once "post.php";
?>

<!DOCTYPE HTML>
<html>

<head>
	<?php
	$file = file_get_contents("datos/index.json");
	?>
	<script type="text/javascript">
		config = <?php echo $config; ?>;
		datos = <?php echo $file; ?>;
	</script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="UTF-8">
	<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/index.css" type="text/css">
	<title>ATI[UCV] 2020-U</title>
</head>

<body>
	<header>
		<nav id="nav" class="container-fluid">
			<ul class="row">
				<?php echo $sitio;
				echo $saludo;
				echo $busqueda;
				echo $dropdown;
				?>
			</ul>
		</nav>
		<script type="text/javascript">
			var perfil = {
				nombre: "<?php echo $_SESSION["nombre"] ?>"
			};
		</script>
		<script src="js/lenguaje.js"></script>
	</header>
	<section id="sec">
	</section>
	<footer id="footer" class="center">
		<?php echo $footer; ?>
	</footer>
	<script src="js/index.js"></script>
</body>

</html>