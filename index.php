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
<!-- TODO: hacer un funcion de php que obtengo config.php e importarla con un include --> 
	</head> 
	<body>
      <!-- TODO: funcion php que me consiga estudiantes -->
      <?php 
        $estudiantes_json_string = file_get_contents("./datos/index.json");

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
              <input class="traducir-config" id="search-students" type="search" data-json-key="nombre">
              <input class="traducir-config" type="button" data-json-key="buscar">
            </form>
          </li>
				</ul>	
			</nav> 
	    </header>
	    <section>
        <ul id="students-list">
        <?php 
              foreach($students as $student){
                $li = <<<"EOT"
                <li>
                  <img src="$student->{"imagen"})" alt="profile-pic">
                  <p><a href="index.php?estudiante=$student->{"ci"}"></a>$student->{"nombre"}</p>

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
