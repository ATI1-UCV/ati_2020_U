<?php
$ci = $_GET["ci"] ?? false;
if (!$ci or !file_exists($ci)) {
  http_response_code(404);
  include('404.html');
  die();
}

$user = $_SESSION["usuario"] ?? "Jose Perez";
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

$mime = array("jpg","gif","png","jpeg");
foreach ($mime as &$value) {
  $file = "$ci/$ci.$value";
  if (file_exists($file))
    $img = $file;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="UTF-8" />
    <link
      rel="icon"
      href="http://www.ciens.ucv.ve/portalasig2/favicon.ico"
      type="image/x-icon"
    />

    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
      crossorigin="anonymous"
    />

    <!-- My own styles -->
    <link rel="stylesheet" href="/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/css/perfil.css" type="text/css" />

    <title></title>
    <!-- Fonts Google -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
    />

    <!-- Json Files -->
    <script defer src="/js/perfil.js" defer></script>
    <script>
      var lang = "<?php echo $lang; ?>";
      var user = "<?php echo $user; ?>";
      var views = "<?php echo $visitas; ?>";
      var ci = "<?php echo $ci; ?>";
      var img = "<?php echo $img; ?>";
    </script>
  </head>
  <body>
    <?php
      include_once("pre.php");
    ?>
    <main>
      <div id="grid" class="row">
        <div id="myimage" class="col-xl-3 col-md-6 col-12">
          <img src="/<?php echo $img; ?>" class="image-fluid" alt="Profile Image" />
        </div>
        <div id="mycontent" class="col-xl-9 col-md-6 col-12">
          <h1 class="name">
          </h1>
          <p class="desc">
          </p>
          <table>
            <tr>
              <td class="q-color">
              </td>
              <td class="a-color">
              </td>
            </tr>
            <tr>
              <td class="q-libro">
              </td>
              <td class="a-libro">
              </td>
            </tr>
            <tr>
              <td class="q-musica">
              </td>
              <td class="a-musica">
              </td>
            </tr>
            <tr>
              <td class="q-video_juego">
              </td>
              <td class="a-video_juego">
              </td>
            </tr>
            <tr>
              <td class="bold q-lenguajes">
              </td>
              <td class="bold a-lenguajes">
              </td>
            </tr>
          </table>
          <p class="email">
          </p>
        </div>
      </div>
    </main>
    <?php
      include_once("post.php");
    ?>

    <!-- JQuery -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
      integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
      crossorigin="anonymous"
    ></script>

    <!-- Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
      integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
      crossorigin="anonymous"
    ></script>
  </body>
</html>