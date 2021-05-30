<?php
session_start();

$user = $_SESSION["usuario"] ?? "Vittorio";
$_SESSION["usuario"] = $user;

$lang = $_GET["len"] ?? $_SESSION["len"] ?? "es";
$_SESSION["len"] = $lang;

if(!isset($_COOKIE["visitas"])) {
  setcookie("visitas", 1, time() + 3600, "/");
  $visitas = 1;
} else {
  $visitas = $_COOKIE["visitas"] + 1;
  setcookie("visitas", $visitas, time() + 3600, "/");
}
/* setcookie("visitas", "", time()-3600); // delete cookie */

$index = true; // for post.php
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8" />
    <link
      rel="icon"
      href="http://www.ciens.ucv.ve/portalasig2/favicon.ico"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/index.css" type="text/css" />
    <title></title>
    <!-- Fonts Google -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
    />

    <!-- Json Files -->
    <script defer src="js/index.js" defer></script>
    <script>
      var lang = "<?php echo $lang; ?>";
      var user = "<?php echo $user; ?>";
      var views = "<?php echo $visitas; ?>";
    </script>
  </head>
  <body>
    <?php
      include_once("pre.php");
    ?>
    <section>
      <p class="error-notfound"></p>
      <div class="grid-container"></div>
    </section>
    <?php
      include_once("post.php");
    ?>
  </body>
</html>
