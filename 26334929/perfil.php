<?php
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
    <!--JS -->
    <script src="perfil.json"></script>
    <script src="config.json"></script>

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

    <script defer src="traducir.js"></script>
	</head>
	<body>
	    <header>
        <nav>
          <ul>
            <li class="logo" id="especial-logo"></li>
            <li class="saludo">
              <span class="traducir-config" data-json-key="saludo"></span>
              <span class="traducir-perfil" data-json-key="nombre"></span>
            </li>
            <li class="busqueda"><a href="../index.html" class="traducir-config" data-json-key="home"></a></li>
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
            <h1 id="nombre" class="traducir-perfil" data-json-key="nombre"></h1>
            <p>
            <em class="traducir-perfil" data-json-key="descripcion"></em>
            </p>
            <table>
              <tbody>
                <tr>
                  <td class="traducir-config" data-json-key="color"></td>
                  <td class="traducir-perfil" data-json-key="color"></td>
                </tr>
                <tr>
                  <td class="traducir-config" data-json-key="libro"></td>
                  <td class="traducir-perfil" data-json-key="libro"></td>
                </tr>
                <tr>
                  <td class="traducir-config" data-json-key="musica"></td>
                  <td class="traducir-perfil" data-json-key="musica"></td>
                </tr>
                <tr>
                  <td class="traducir-config" data-json-key="video_juego"></td>
                  <td class="traducir-perfil" data-json-key="video_juego"></td>
                </tr>
                <tr>
                  <td><strong class="traducir-config" data-json-key="lenguajes"></strong></td>
                  <td><strong class="traducir-perfil" data-json-key="lenguajes"></strong></td>
                </tr>
              </tbody>
            </table>
            <p><span class="traducir-config" data-json-key="email"></span><a href="mailto:diegosandmg@gmail.com" class="traducir-perfil" data-json-key="email"></a></p>
          </div>
        </article>
	    </section>
	    <footer class="traducir-config" data-json-key="copyRight">
	    </footer>
	</body>
</html>
?>
