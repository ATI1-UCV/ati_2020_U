<?php 
	
	$perfil = trim(file_get_contents('perfil.json'), "\xEF\xBB\xBF");
	$Dperfil = json_decode($perfil, true);
	

	if($_GET['len'] == 'pt'){
		$config = file_get_contents("conf/configPT.json");				
	}else if($_GET['len'] == 'en'){
		$config = file_get_contents("conf/configEN.json");				
	}else if($_GET['len'] == 'es'){
		$config = file_get_contents("conf/configES.json");	
	}else{
		$config = trim(file_get_contents('config.json'), "\xEF\xBB\xBF");
	}
	$Dconfig = json_decode($config, true);

?>

<!DOCTYPE html>
<html>
	<head>
	   	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../css/style.css"  type="text/css">
		<link rel="stylesheet" href="perfil.css"  type="text/css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

		<title>Daniel Berbesi</title>
		

	</head>
	<body>

	    <div class="container-fluid">
	    <div class="row" id="r1">
	    	<div class="col" id="r11"></div>
	    	<div class="col" id="r12"></div>
	    	<button class="col" id="r13" type="button">a</button>
	    </div>
	    <div class="row" id="r2">
	    	<img class="img-fluid" id="r21"></img>
	    	<div class="col" id="r22"></div>
	    </div>
	    <div class="row" id="r3">
	    	<div class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" id="r31">Copyright © 2020 Escuela de computación - ATI. Todos los derechos reservados</div>
	    </div>
		</div>
	    <section id = "mySection">
	       
	    </section>
		
		<script>
		
			const r11 = document.getElementById("r11");
			$(r11).text("<?php echo ($Dconfig["sitio"])[0] . ' ' . ($Dconfig["sitio"])[1] . ' ' . ($Dconfig["sitio"])[2]; ?>");

			const r12 = document.getElementById("r12");
			$(r12).text("<?php echo $Dconfig["saludo"] . ' ' . $Dperfil["nombre"] ?>");

			const r13 = document.getElementById("r13");
			$(r13).attr("href", "perfil.html");
			$(r13).text("<?php echo $Dconfig["inicio"] ?>");


			const r21 = document.getElementById("r21");
			$(r21).attr("src", "28015794.jpg");


			const myP = document.createElement('p');
			myP.id = "primero";

			$(myP).text("<?php echo $Dperfil["nombre"] ?>");

			const r22 = document.getElementById("r22");
			$(r22).append(myP);

			$(r22).append(document.createElement('br'));


			const myI = document.createElement('i');
			myI.id = "segundo";
			$(myI).text("<?php echo $Dperfil["descripcion"] ?>");

			$(r22).append(myI);


			const myP2 = document.createElement('p');

			$(myP2).addClass('tercero');

			$(myP2).text("<?php echo $Dconfig["color"] . ' ' . $Dperfil["color"] ?>");
			$(r22).append(myP2);
			$(r22).append(document.createElement('br'));


			const myP3 = document.createElement('p');
			$(myP3).addClass('tercero');

			$(myP3).text("<?php echo $Dconfig["libro"] . ' ' . $Dperfil["libro"] ?>");
			$(r22).append(myP3);
			$(r22).append(document.createElement('br'));


			const myP4 = document.createElement('p');
			$(myP4).addClass('tercero');

			$(myP4).text("<?php echo $Dconfig["video_juego"] . ': ';
			$count = count($Dperfil["video_juego"]);
			for ($i = 0; $i < $count - 1; $i++) {
				echo ($Dperfil["video_juego"])[$i] . ', ';
			}
			echo ($Dperfil["video_juego"])[$count - 1];
			?>");
			$(r22).append(myP4);
			$(r22).append(document.createElement('br'));


			const myP5 = document.createElement('p');
			$(myP5).addClass('tercero', 'extra');

			$(myP5).text("<?php echo $Dconfig["lenguajes"] . ': ';
			$count = count($Dperfil["lenguajes"]);
			for ($i = 0; $i < $count - 1; $i++) {
				echo ($Dperfil["lenguajes"])[$i] . ', ';
			}
			echo ($Dperfil["lenguajes"])[$count - 1];
			?>");
			$(r22).append(myP5);
			$(r22).append(document.createElement('br'));

			$(r22).append(document.createElement('br'));
			$(r22).append(document.createElement('br'));

			const myP6 = document.createElement('p');
			$(myP6).addClass('tercero');
			$(myP6).text("<?php echo $Dconfig["email"] . ' '?>");

			const myA2 = document.createElement('a');
			$(myA2).attr("href", "https://mail.google.com/mail/?view=cm&fs=1&to=berbesidaniel@gmail.com");
			$(myA2).text("<?php echo $Dperfil["email"] ?>");
			
			$(myP6).append(myA2);

			$(r22).append(myP6);

			
		</script src = "http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js">

	</body>
</html>