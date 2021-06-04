<?php
session_start();

$user = $_COOKIE["usuario"] ?? $_SESSION["usuario"] ?? "Vittorio";
$_SESSION["usuario"] = $user;
setcookie("usuario", $user, time() + 3600, "/");

$len = $_COOKIE["len"] ?? $_SESSION["len"] ?? "es";
$_SESSION["len"] = $len;
setcookie("len", $len, time() + 3600, "/");

$visitas = $_COOKIE["visitas"] ?? $_SESSION["visitas"] ?? 0;
$visitas = $visitas + 1;
$_SESSION["visitas"] = $visitas;
setcookie("visitas", $visitas, time() + 3600, "/");

/* setcookie("visitas", "", time()-3600); // delete cookie */
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

    <!--  Bootstrap Styles -->
    <link
      rel="stylesheet"
      href="https://cdn.usebootstrap.com/bootstrap/4.4.1/css/bootstrap.min.css"
      type="text/css"
    />

    <!--  My Styles -->
    <link rel="stylesheet" href="/css/index.css" type="text/css" />
    <link rel="stylesheet" href="/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/css/perfil.css" type="text/css" />

    <!-- JQuery Scripts -->
    <script
      defer
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

    <!-- Bootstrap Scripts -->
    <script defer src="https://cdn.usebootstrap.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>

    <!-- My Scripts -->
    <script defer src="/js/index.js" defer></script>
  </head>
  <body>
    <?php
      include_once("pre.php");
    ?>
    <section>
      <p class="error-notfound"></p>
      <div id="carousel" class="carousel slide" data-ride="carousel">
        <a
          class="carousel-control-prev"
          href="#carousel"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#carousel"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        <div class="carousel-inner"></div>
      </div>
    </section>

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
  </body>
</html>
