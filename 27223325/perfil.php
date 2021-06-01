<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

		<script src="$perfil.js" type="text/javascript"></script>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


		<link rel="stylesheet" href="style.css"  type="text/css">
		<link rel="stylesheet" href="perfil.css"  type="text/css">
		
		<title>Cesar Salazar</title>
	</head>

	<body>
		<?php
			function console_log($output, $with_script_tags = true) {
			    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
			');';
			    if ($with_script_tags) {
			        $js_code = '<script>' . $js_code . '</script>';
			    }
			    echo $js_code;
			}


			// Get Language
			if (isset($_GET['len'])) {
				if ($_GET['len'] == 'es') {
					$config2 = file_get_contents("./configES.json");
				}elseif ($_GET['len'] == 'en') {
					$config2 = file_get_contents("./configEN.json");
				}else{
					$config2 = file_get_contents("./configPT.json");
				}
			}

			$config = json_decode($config2,true);
			

			$perfil = json_decode(file_get_contents("./perfil.json"),true);
		?>

	    <header>
			<nav class="container-fluid">
				<ul class="row">
						<li id="logo" class="logo col">
							<?php
							echo ($config['sitio'])[0]."<small>".($config['sitio'])[1]."</small>".($config['sitio'])[2]
							?>
						</li>
						<li id="saludo" class="saludo col">
							<?php
							echo $config['saludo'].", ".$config['nombre'] ;
							?>
						</li>
						<li id="busqueda" class="busqueda col ">
							<?php
							echo "<a href=#>".$config['home']."</a>";
							?>
						</li>
					
				</ul>	
			</nav> 
	    </header>
	    
	    <section class="container-fluid">
	       <div class="row">

	       		<div class="image_text_next col-xs-4 col-md-4 col-lg-4">
					<img id="profile_photo" 
						 class="top_left_border"
						 src=<?php echo $perfil['imagen']; ?>>
				</div>

				<div class="col-xs-8 col-md-8 col-lg-8">
					<div class="info_card container-fluid">

						<h1 id="name_person" class="row">
							<?php echo $perfil['nombre']; ?>
						</h1>

						<p id="description_person" class="row">
							<?php 
							echo "<i>" . $perfil['descripcion'] . "</i>";
							?>
						</p>

						<p id="like_person" class="row">
							<?php 
							echo $config['color'] .": ". $perfil['color'] . "<br>" . $config['libro'] .": ". $perfil['libro'] . "<br>" . $config['musica'] .": ". $perfil['musica'] . "<br>" . $config['video_juego'] .": ". ($perfil['video_juego'])[0] . "<br>" . $config['lenguajes'].": ". "<b>".($perfil['lenguajes'])[0].', '.($perfil['lenguajes'])[1].', '.($perfil['lenguajes'])[2]."</b>";
							?>
						</p>
						
						<p id="contact_person" class="row">
							<?php
							echo $config['email'] . "<a href = \"mailto: bitemecesar@gmail.com\">".$perfil['email']."</a>";
							?>
						</p>
					</div>
				</div>
	       </div>
			
			 
	    </section>

	    <footer class="container-fluid">
	        <?php echo $config['copyRight'] ?>
	    </footer>
	</body>
</html>