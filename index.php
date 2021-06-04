<?php
	session_start();

	$lenguaje 		= $_GET["len"];
	$usuario		= "";
	$config_archivo	= "";

	if(isset($_SESSION['usuario'])){
		$usuario = $_SESSION['usuario'];
	}else{
		$_SESSION['usuario'] = $_GET['usuario'];
		$usuario			 = $_GET['usuario'];
	}

	if($lenguaje != 'en' && $lenguaje != 'pt' && $lenguaje != 'es'){
		$lenguaje	= $_SESSION['len'];
	}

	if($lenguaje == 'en'){
		$config_archivo 	= file_get_contents("conf/configEN.json");
		$_SESSION['len'] 	= $lenguaje;
	}elseif($lenguaje == 'pt'){
		$config_archivo 	= file_get_contents("conf/configPT.json");
		$_SESSION['len'] 	= $lenguaje;
	}else{
		$config_archivo 	= file_get_contents("conf/configES.json");
		$_SESSION['len'] 	= $lenguaje;
	}

	$config_json 	= json_decode($config_archivo, true);

	if(isset($_COOKIE['contador'])){ 
	// Caduca en un año 
		setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60); 
	}else{ 
		setcookie('contador', 1, time() + 365 * 24 * 60 * 60); 
	}

?>

<!DOCTYPE HTML>
<html> 
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">
		<link rel="stylesheet" href="css/perfil.css"  type="text/css">
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css
		">	
		<script type="text/javascript" src="datos/index.json"></script>
		<title></title>
	</head>
	<body>
	   	<?php
	    	include_once("pre.php");
	    ?>
	    <section>
			<ul id="listado">
			</ul>
	    </section>
	    <?php
	    	include_once("post.php");
	    ?>
		<script
		  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"
		  ></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
	   	<script type="text/javascript" src="js/index.js"></script>
    	<script type="text/javascript" src="js/perfil.js"></script>
	</body>
</html>
<!DOCTYPE HTML>