<?php 
	session_start();
	if(isset($_COOKIE['contador'])){
		setcookie('contador', $_COOKIE['contador'] + 1, time() + 10 * 60);
	} else {
		setcookie('contador', 1 , time() + 10 * 60);
	}
	if(isset($_COOKIE['idioma'])){
	} else {
		setcookie('idioma', "es", time() + 10 * 60);
	}
?>
<?php
    if(htmlspecialchars($_GET["len"])==NULL){
    }else{
        $_COOKIE["idioma"]=htmlspecialchars($_GET["len"]);
        $idioma = $_COOKIE["idioma"];
    }
    if($idioma == "en"){
        $data2 = @file_get_contents("./conf/configEN.json");
    }
    else if($idioma == "es"){
        $data2 = @file_get_contents("./conf/configES.json");
    }
    else if($idioma == "pt"){
        $data2 = @file_get_contents("./conf/configPT.json");
    }else{
        $data2 = @file_get_contents("./conf/configES.json");
    }
    $itemC = json_decode($data2, true);
    ?>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">
		<title></title>
	</head>
	<?php
	if($_SESSION["usuario"]==NULL){
		$_SESSION["usuario"]="Eduardo";
	}
	?>
	<body>
	<form>
		<input type="hidden" id="sesion_nombre" value=<?php echo $_SESSION['usuario']?>>
		<input type="hidden" id="sesion_cont" value=<?php echo $_COOKIE['contador']?>>
		<input type="hidden" id="sesion_idioma" value=<?php echo $_COOKIE['idioma']?>>
	</form>	
	    <header>
			<nav>
				<ul id="nav">
					<li class="logo"><?php echo $itemC["sitio"][0]."<small>".$itemC["sitio"][1]."</small>".$itemC["sitio"][2]?></li>
					<li class="saludo"><!--Hola, Eduardo Suarez--><?php echo $itemC["saludo"]?></li>
					<li class="boton">
						<div class="dropdown">
							<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" arial-haspopup="true" arial-expanded="true">
								Idioma
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" id="español"href="#">Español</a>
								<a class="dropdown-item" id="ingles"href="#">Ingles</a>
								<a class="dropdown-item" id="portugues"href="#">Portugues</a>
							</div>
						</div>
					</li>
					<li class="busqueda">
						<form class="buscador">
							<input type="text" placeholder=<?php echo $itemC["Nombre"].". . ."?>>
							<input type="button" value=<?php echo $itemC["buscar"]?>>
						</form>
					</li>
				</ul>	
			</nav> 
	    </header>
	    <section>
			 <ul class="Lista de perfiles">
			</ul>
	    </section>
	    <footer>
			<?php
				echo $itemC["copyRight"]
			?>
	        <!--Copyright © 2020 Escuela de computación - ATI. Todos los derechos reservados-->
		</footer>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="js/index.js"></script>
	</body>
</html>
<!DOCTYPE HTML>
