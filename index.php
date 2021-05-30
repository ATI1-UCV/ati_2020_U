<!DOCTYPE HTML>
<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">
		<title>ATI[UCV] 2020-U</title>

    <!--JS -->
    <script defer src="js/index.js"></script>
	</head> 
	<body>
      <!-- TODO: funcion php que me consiga estudiantes -->
      <?php 
        $estudiantes_json_string = file_get_contents("./datos/index.json");

        $language = $_GET["len"];
        include_once("./get_config.php");
        $config = get_config($language);
        if(!$estudiantes_json_string){
          echo "<p>No se econtro datos/index.json<p>";
          exit;
        }
      
        $estudiantes = json_decode($estudiantes_json_string, true);
        
        if (!$estudiantes) {
            echo "<p>Unable to decode index/datos.json<p>";
            exit;
        }
      
      ?>
	    <header>
			<nav>
				<ul>
          <li class="logo" id="especial-logo">
            <?php
              echo($config["sitio"][0]), "<small>", ($config["sitio"][1]), "</small>" ?>
          </li>
          <li class="saludo">
            <span class="traducir-config" data-json-key="saludo"><?php echo($config["saludo"]) ?></span>
            <span class="traducir-perfil" data-json-key="nombre"><?php echo($perfil["nombre"]) ?></span>
          </li>
					<li class="busqueda">
            <form>
            <input class="traducir-config" id="search-students" placeholder="<?php echo($config["nombre"]) ?>" type="search" data-json-key="nombre">
              <input class="traducir-config" type="button" value="<?php echo($config["buscar"]) ?>" data-json-key="buscar">
            </form>
          </li>
				</ul>	
			</nav> 
	    </header>
	    <section>
        <ul id="students-list">
        <?php 
          foreach($estudiantes as $student){
            $imagen_url = $student["imagen"];
            $cedula_student = $student["ci"];
            $student_nombre = $student["nombre"];
            $json_student = json_encode($student, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE);
            $li = <<<"EOT"
            <li data-student='{"ci":"$cedula_student","imagen":"$imagen_url","nombre": "$student_nombre"}'>
              <img src="$imagen_url" alt="profile-pic">
              <p><a href="/perfil.php?ci=$cedula_student&len=$language">$student_nombre</a></p>

            </li>
            EOT;
            echo $li;
          }
        ?>
        </ul>
	    </section>
	    <footer class="traducir-config" data-json-key="copyRight">
	    </footer>
	</body>
</html>
