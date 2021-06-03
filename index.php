<?php
  session_start();
  if(isset($_COOKIE["contador"])){
    setcookie("contador", $_COOKIE["contador"] + 1);
  }else{
    setcookie("contador", 1);
  }

  $conf_dir = "./conf/conf/";

  $session_lang = isset($_SESSION["language"]);
  $language = $_GET["len"];

  // if no parameter and language defined
  if(!$language && $session_lang){
    $language = $_SESSION["language"];
  }

  // If no language from parameter, and no session_lang
  // define default language
  if(!$language && !$session_lang){
    $_SESSION["language"] = "es"; 
    $language = "es";
  }

  if($language === "es"){
    $config_json_string = file_get_contents($conf_dir . "configES.json");
  }elseif ($language === "en"){
    $config_json_string = file_get_contents($conf_dir . "configEN.json");
  }elseif ($language === "pt"){
    $config_json_string = file_get_contents($conf_dir . "configPT.json");
  }

  if (!$config_json_string){
    echo "<p>Unable to open language.json<p>";
  }

  $config = json_decode($config_json_string, true);
?>
<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<title>ATI[UCV] 2020-U</title>

    <!--JS -->
    <script src="conf/configES.json"></script>
    <script defer src="datos/index.json"></script>
    <script defer src="js/index.js"></script>
	</head>
	<body>
	    <header>
			<nav>
				<ul>
					<li class="logo" id="especial-logo"></li>
          <li class="saludo">
            <span><?php echo($config["saludo"]) ?></span>
            <span>
            <?php 
              if(!isset($_COOKIE["contador"])){
                echo("(visita " . 1 . " )");
              }else{
                echo("(visita " . ($_COOKIE["contador"]) . " )");
              }
            ?>
            </span>
            <span class="traducir-perfil" data-json-key="nombre"></span>
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
        <div class="splide">
          <div class="splide__track">
            <ul class="splide__list" id="students-list">
            </ul>
          </div>
        </div>
	    </section>
      <section id="student-info-container"></section>
      <footer>
        <?php echo($config["copyRight"]); ?>
      </footer>
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>
