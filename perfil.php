<?php 
	if (!headers_sent()) {
        session_start();

        if(isset($_COOKIE['contador'])){
            setcookie("contador", $_COOKIE['contador'] + 1);
        }else{
            $value = 1; 
            setcookie("contador", $value);
        }
        
    }

	$profile = $_GET['ci'] ? $_GET['ci']."/perfil.json" : 'datos/perfil.json';
	$profile_data = file_get_contents($profile);
	$decoded_profile_data = json_decode($profile_data, true);

	if($_GET['len'] == 'pt'){
		$config_data = file_get_contents("conf/configPT.json");				
	}else if($_GET['len'] == 'en'){
		$config_data = file_get_contents("conf/configEN.json");				
	}else{
		$config_data = file_get_contents("conf/configES.json");	
	}
	$decoded_config_data = json_decode($config_data, true);
	$_SESSION['usuario'] = $decoded_profile_data['nombre'];
	$_SESSION['len']= $_GET['len'] ? $_GET['len'] : "es";

	
	$currentFile = $_SERVER['PHP_SELF'];	
	

?>
<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/css/style.css"  type="text/css">
		<link rel="stylesheet" href="/css/perfil.css"  type="text/css">

		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<!-- Bootstrap -->	
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		

		<title><?php echo $_SESSION['usuario']; ?></title>
	</head>
	<body>
		
	    <?php require 'pre.php'; ?>

	    <section id="general_content" class="general_content container">
			<picture>
				<source media="(max-width:767px)"
				srcset="<?php $mobile_image = $decoded_profile_data['imagen'] ? $_GET['ci']."/".$decoded_profile_data['imagen'] : "27449007/27449007.jpg"; echo $mobile_image;?>"
				>
				<source media="(min-width:768px)"
				srcset="<?php $desktop_image = $decoded_profile_data['imagen'] ? $_GET['ci']."/".$decoded_profile_data['imagen'] : "27449007/27449007second.jpg"; echo $desktop_image;?>"
				>
				<img  align="left" id="photo" class="col-lg-5" src="<?php $mobile_image = $decoded_profile_data['imagen'] ? $_GET['ci']."/".$decoded_profile_data['imagen'] : "27449007/27449007first.jpg"; echo $mobile_image;?> ">
			</picture>

			<table id="table" class="col-lg-5">
				<tr> <td colspan="2" class="aligned" id="name"> <?php echo $decoded_profile_data['nombre']; ?></td></tr>
				<tr><td colspan="2" class="aligned" id="description"> <?php echo $decoded_profile_data['descripcion']; ?> </td></tr>
				<tr><td id="color" class="aligned"><?php echo $decoded_config_data['color']; ?> </td>
					<td class="aligned"><?php echo $decoded_profile_data['color']; ?> </td></tr>	
				<tr><td id="libro" class="aligned"><?php echo $decoded_config_data['libro']; ?> </td>
					<td class="aligned"><?php echo $decoded_profile_data['libro']; ?> </td></tr>
				<tr><td id="juego" class="aligned"><?php echo $decoded_config_data['video_juego']; ?> </td>
					<td class="aligned"><?php $juegos = ''; 
												foreach( $decoded_profile_data['video_juego'] as $juego) { $juegos .= $juego.', ';
												}
												echo trim($juego, ',');
												?></td></tr>
				<tr><td id="lenguajes" class="aligned lp"> <?php echo $decoded_config_data['lenguajes']; ?></td>
					<td class="aligned lp"><?php $lenguajes = ''; 
												foreach( $decoded_profile_data['lenguajes'] as $lenguaje) { $lenguajes .= $lenguaje.', ';
												}
												echo trim($lenguajes, ',');
											?></td></tr>
				<tr><td id="email" colspan="2" class="aligned"> <?php echo str_replace( '[email]', '', $decoded_config_data['email']); ?> <a href="<?php echo $decoded_profile_data['email_url']; ?>" id="email"><?php echo $decoded_profile_data['email']; ?></a> </td></tr>
			
			</table>
			
 
	    </section>
	    <?php require 'pos.php'; ?>
		
		
	</body>
	<script src="js/datos.js"></script>
</html>