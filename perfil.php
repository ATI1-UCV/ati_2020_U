<?php
session_start();
?>
<!DOCTYPE HTML>

<?php
  // Abrir perfil
  include_once("./get_config.php");

  $language = $_GET["len"];

  $config = get_config($language);

  $student = $_GET["ci"];
  if(!$student){
    echo "<p>No se especifico estudiante <p>";
    exit;
  }

  $json_perfil_string = file_get_contents("./" . $student .  "/perfil.json");

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

  $perfil_nombre = $perfil["nombre"];

  // Set nombre
  if(!isset($_SESSION["usuario"])){
    $_SESSION["usuario"] = $perfil["nombre"];
  }
?>
<html>
	<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/css/style.css"  type="text/css">
		<link rel="stylesheet" href="/css/perfil.css"  type="text/css">

    <!-- Responsive meta tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo($perfil["nombre"]); ?></title>

    <script defer src="js/traducir.js"></script>
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

      <?php ob_start(); ?>
      <a href="index.php" class="traducir-config" data-json-key="home"><?php echo($config["home"]) ?></a>

      <?php $extend_header = ob_get_clean(); ?>

      <?php
        include_once("pre.php");
      ?>
      <section class="container">
        <section class="row" id="foto-perfil">
          <div class="col">
            <img src="<?php echo("/" . $student . "/" . $student . ".jpg"); ?>" alt="foto de perfil">
          </div>
        </section>
        <article class="row" id="contenido">
          <div class="col">
          <h1 id="nombre"  data-json-key="nombre"><?php echo($perfil["nombre"]) ?></h1>
            <p>
            <em  data-json-key="descripcion"><?php echo($perfil["descripcion"]) ?></em>
            </p>
            <table>
              <tbody>
                <tr>
                <td class="traducir-config" data-json-key="color"><?php echo($config["color"]); ?></td>
                <td  data-json-key="color"><?php echo($perfil["color"]); ?></td>
                </tr>
                <tr>
                <td class="traducir-config" data-json-key="libro"><?php echo($config["libro"]); ?></td>
                <td  data-json-key="libro"><?php echo($perfil["libro"]); ?></td>
                </tr>
                <tr>
                <td class="traducir-config" data-json-key="musica"><?php echo($config["musica"]); ?></td>
                <td  data-json-key="musica"><?php echo($perfil["musica"]); ?></td>
                </tr>
                <tr>
                <td class="traducir-config" data-json-key="video_juego"><?php echo($config["video_juego"]); ?></td>
                  <td  data-json-key="video_juego">
                    <?php echo(implode(", ", $perfil["video_juego"])); ?>
                  </td>
                </tr>
                <tr>
                <td class="traducir-config" data-json-key="lenguajes">
                  <?php echo($config["lenguajes"]); ?>
                </td>
                <td>
                  <strong  data-json-key="lenguajes"><?php echo(implode(", ", $perfil["lenguajes"])); ?></strong>
                </td>
                </tr>
              </tbody>
            </table>
            <p>
            <span class="traducir-perfil" data-json-key="email" data-replace="<?php echo($perfil["email"]); ?>">
                <?php echo(str_replace("[email]", $perfil["email"], $config["email"])); ?>
              </span>
            </p>
          </div>
        </article>
	    </section>
      <?php include_once("post.php"); ?>
	</body>
</html>
