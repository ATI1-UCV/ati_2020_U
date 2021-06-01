<?php
	$lenguaje 		= $_GET["len"];
	$perfil_archivo = file_get_contents("perfil.json");
	$perfil_json 	= json_decode($perfil_archivo, true);
	$config_archivo	= "";
	if($lenguaje == 'en'){
		$config_archivo = file_get_contents("conf/configEN.json");
	}elseif($lenguaje == 'pt'){
		$config_archivo = file_get_contents("conf/configPT.json");
	}else{
		$config_archivo = file_get_contents("conf/configES.json");
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
		<link rel="stylesheet" href="perfil.css"  type="text/css">
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css
		">	
		<script type="text/javascript" src="config.json"></script>
		<title>José Hernández</title>
	</head>
	<body>
<?php
	
?>

	    <header>
			<nav class="container-fluid">
				<ul class="row">
					<li class="logo col-lg-3 col-md-4">
						<?php
							echo $config_json['sitio'][0] . '<small>' . $config_json['sitio'][1] . '</small>' . $config_json['sitio'][2];
						?>
					</li>
					<li class="saludo col-lg-8 col-md-7">
						<?php 
							echo $config_json['saludo'].',',$perfil_json['nombre'];
						?>
					</li>
					<li class="busqueda"><a href="#">
						<?php
							echo $config_json['home']
 						?>
					</a></li>
				</ul>	
			</nav> 
	    </header>
	    <section>
	    <div class="container-fluid">
	    	<div class="row">
	    		<div class="col-lg-3 col-md-4 col-sm-5">
					<img  src ="<?php echo $perfil_json['imagen'];?>">
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
	    <footer>
			<?php
				echo $config_json['copyRight'];
			?>
	    </footer>
		<script
		  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"
		  ></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="perfil.js"></script>
	</body>
</html>