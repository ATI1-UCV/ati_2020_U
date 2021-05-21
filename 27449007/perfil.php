<?php 
			$profile_data = file_get_contents('perfil.json');
			$decoded_profile_data = json_decode($profile_data, true);

			if($_GET['len'] == 'pt'){
				$config_data = file_get_contents("configPT.json");				
			}else if($_GET['len'] == 'en'){
				$config_data = file_get_contents("configEN.json");				
			}else if($_GET['len'] == 'es'){
				$config_data = file_get_contents("configES.json");	
			}
			$decoded_config_data = json_decode($config_data, true);
		
?>
<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/css/style.css"  type="text/css">
		<link rel="stylesheet" href="perfil.css"  type="text/css">
		<script type="text/javascript" src="config.json"></script>
		<script type="text/javascript" src="perfil.json"></script>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<title>Aaron Morillo</title>
	</head>
	<body>
		
	    <header class="header">
			<nav class="container">
				<ul id="header-content" class="col-lg-12">
					<li id="logo" class="logo col-md-4"><?php echo ($decoded_config_data['sitio'])[0] . '<span>'. ($decoded_config_data['sitio'])[1] .'</span>'. ($decoded_config_data['sitio'])[2]; ?></li>

					<li id="saludo" class="saludo col-md-4"> <?php echo $decoded_config_data['saludo'] . ', ' . $decoded_profile_data['nombre']; ?></li>

					<li class="busqueda col-md-3 pull-right"><a id="home" href="../index.html"><?php echo $decoded_config_data['home'] ?></a></li>
				</ul>	
			</nav> 
	    </header>
	    <section id="general_content" class="general_content container">
			<picture>
				<source media="(max-width:767px)"
				srcset="27449007first.jpg"
				>
				<source media="(min-width:768px)"
				srcset="27449007second.jpg"
				>
				<img  align="left" id="photo" class="col-lg-5" src="<?php echo $decoded_profile_data['imagen']; ?> ">
			</picture>

			<table id="table" class="col-lg-5">
				<tr> <td colspan="2" class="aligned" id="name"> <?php echo $decoded_profile_data['nombre']; ?></td></tr>
				<tr><td colspan="2" class="aligned" id="description"> <?php echo $decoded_profile_data['descripcion']; ?> </td></tr>
				<tr><td class="aligned"><?php echo $decoded_config_data['color']; ?> </td>
					<td class="aligned"><?php echo $decoded_profile_data['color']; ?> </td></tr>	
				<tr><td class="aligned"><?php echo $decoded_config_data['libro']; ?> </td>
					<td class="aligned"><?php echo $decoded_profile_data['libro']; ?> </td></tr>
				<tr><td class="aligned lp"> <?php echo $decoded_config_data['lenguajes']; ?></td>
					<td class="aligned lp"><?php $lenguajes = ''; 
												foreach( $decoded_profile_data['lenguajes'] as $lenguaje) { $lenguajes .= $lenguaje.', ';
												}
												echo trim($lenguajes, ',');
											?></td></tr>
				<tr><td colspan="2" class="aligned"> <?php echo str_replace( '[email]', '', $decoded_config_data['email']); ?> <a href="<?php echo $decoded_profile_data['email_url']; ?>" id="email"><?php echo $decoded_profile_data['email']; ?></a> </td></tr>
			
			</table>
			
 
	    </section>
	    <footer id="footer" class="dk-footer">
			<?php echo $decoded_config_data['copyRight']; ?>
		</footer>
		
		
	</body>
</html>