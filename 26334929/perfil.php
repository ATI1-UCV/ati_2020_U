<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../css/style.css"  type="text/css">
		<link rel="stylesheet" href="perfil.css"  type="text/css">
    
    <!-- Responsive meta tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Diego Sánchez</title>

    <!-- SOYDEV danger zone -->

    <!-- Javascript useless bloatware -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
      integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
      crossorigin="anonymous"></script>
    <!-- SOYSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- End SOYDEV danger zone -->
	</head>

	<body>
      <?php
      // Abrir perfil
      $json_perfil_string = file_get_contents("./perfil.json");
      if (!$json_perfil_string) {
          echo "<p>Unable to open perfil.json<p>";
          exit;
      }
      // Convertir json string a array asociativo
      $perfil = json_decode($json_perfil_string, true);

      if (!$perfil) {
          echo "<p>Unable to decode perfil.json<p>";
          exit;
      }

      // Abrir config dependiendo del idioma
      //
      $language = $_GET["len"];
      if ($language){
        if($language === "es"){
          $config_json_string = file_get_contents("../conf/configES.json"); 
        }elseif ($language === "en"){
          $config_json_string = file_get_contents("../conf/configEN.json"); 
        }elseif ($language === "pt"){
          $config_json_string = file_get_contents("../conf/configPT.json");  
        }
      }
      
      $config = json_decode($config_json_string, true);
	    <header>
        <nav>
          <ul>
            <li class="logo" id="especial-logo"></li>
            <li class="saludo">
              <span class="traducir-config" data-json-key="saludo">$config["saludo"]</span>
              <span class="traducir-perfil" data-json-key="nombre">$perfil["nombre"]</span>
            </li>
            <li class="busqueda"><a href="../index.html" class="traducir-config" data-json-key="home">$config["home"]</a></li>
          </ul>	
        </nav> 
	    </header>
	    <section class="container">
        <section class="row" id="foto-perfil"> 
          <div class="col">
            <picture>
              <source srcset="./ProfilePic.jpg" media="(min-width: 800px)">
              <img src="26334929.jpeg" alt="foto de perfil"> 
            </picture>
          </div>
        </section>
        <article class="row" id="contenido">
          <div class="col">
            <h1 id="nombre" class="traducir-perfil" data-json-key="nombre">$perfil[""]</h1>
            <p>
            <em class="traducir-perfil" data-json-key="descripcion">$perfil[""]</em>
            </p>
            <table>
              <tbody>
                <tr>
                  <td class="traducir-config" data-json-key="color">echo($config["color"]);</td>
                  <td class="traducir-perfil" data-json-key="color">echo($perfil["color"]);</td>
                </tr>
                <tr>
                  <td class="traducir-config" data-json-key="libro">echo($config["libro"]);</td>
                  <td class="traducir-perfil" data-json-key="libro">echo($perfil["libro"]);</td>
                </tr>
                <tr>
                  <td class="traducir-config" data-json-key="musica">echo($config["musica"]);</td>
                  <td class="traducir-perfil" data-json-key="musica">echo($perfil["musica"]);</td>
                </tr>
                <tr>
                  <td class="traducir-config" data-json-key="video_juego">echo($config["video_juego"]);</td>
                  <td class="traducir-perfil" data-json-key="video_juego">
                    implode(", ", $perfil["video_juego"]);
                  </td>
                </tr>
                <tr>
                <td><strong class="traducir-config" data-json-key="lenguajes"></strong>
                echo($config["lenguajes"]);
                </td>
                  <td><strong class="traducir-perfil" data-json-key="lenguajes">implode(", ", $perfil["lenguajes"])</strong>
</td>
                </tr>
              </tbody>
            </table>
            <p>
              <span class="traducir-config" data-json-key="email">
                echo(str_replace("[email]", $config["email"], $config["email"]));
              </span>
            </p>
          </div>
        </article>
	    </section>
	    <footer class="traducir-config" data-json-key="copyRight">
        echo($config["copyRight"]);
	    </footer>

    ?>
	</body>
</html>
