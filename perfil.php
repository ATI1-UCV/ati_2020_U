<?php
	session_start();

	$cedula_perfil	= $_GET["ci"];

	$perfil_archivo = file_get_contents($cedula_perfil."/perfil.json");
	$perfil_json 	= json_decode($perfil_archivo, true);


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

	$src_imagen		= "";

	if(file_exists($cedula_perfil.'/'.$cedula_perfil.'.jpg')){
		$src_imagen	= $cedula_perfil.'/'.$cedula_perfil.'.jpg';
	}elseif(file_exists($cedula_perfil.'/'.$cedula_perfil.'.gif')){
		$src_imagen	= $cedula_perfil.'/'.$cedula_perfil.'.gif';
	}elseif(file_exists($cedula_perfil.'/'.$cedula_perfil.'.png')){
		$src_imagen	= $cedula_perfil.'/'.$cedula_perfil.'.png';
	}elseif(file_exists($cedula_perfil.'/'.$cedula_perfil.'.jpeg')){
		$src_imagen	= $cedula_perfil.'/'.$cedula_perfil.'.jpeg';
	}


	$config_json 	= json_decode($config_archivo, true);
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
	    <div class="container-fluid">
	    	<div class="row">
	    		<div class="col-lg-3 col-md-4 col-sm-5">
					<img id="imagen_perfil" src ="<?php echo $src_imagen;?>">
				</div>
				<div class="container-info col-lg-8 col-md-7 col-sm-6">
					<h1>
						<?php
							echo $perfil_json['nombre'];
						?>
					</h1>
					<p>
						<?php
							echo $perfil_json['descripcion'];
						?>
					</p>
					<table>
						<tbody>
							<tr>
								<td><?php echo $config_json['color'];?></td>
								<td><?php echo $perfil_json['color'];?></td>
							</tr>
							<tr>
								<td><?php echo $config_json['libro'];?></td>
								<td><?php echo $perfil_json['libro'];?></td>
							</tr>
							<tr>
								<td><?php echo $config_json['musica'];?></td>
								<td><?php echo $perfil_json['musica'];?></td>
							</tr>
							<tr>
								<td><?php echo $config_json['video_juego'];?></td>
								<td><?php echo implode(',',$perfil_json['video_juego']);?></td>
							</tr>
							<tr>
								<td><?php echo $config_json['lenguajes'];?></td>
								<td><?php echo implode(',',$perfil_json['lenguajes']);?></td>
							</tr>
						</tbody>
					</table>
					<p>
						<?php
							echo str_replace("[email]", $perfil_json['email'], '<a href="mailto:'.$perfil_json['email'].'">'.$config_json['email'].'</a>')
						?>
					</p>
				</div>
	    	</div>
	   	</div>
			 
	    </section>
	   	<?php
	    	include_once("post.php");
	    ?>
