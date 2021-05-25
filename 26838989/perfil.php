<?php
$configs = [
  "en" => "configEN.json",
  "es" => "configES.json",
  "pt" => "configPT.json",
];

$file_name = $configs[$_GET["len"] ?? "es"];
$config = json_decode(file_get_contents("../conf/$file_name"), true);
$perfil = json_decode(file_get_contents("./perfil.json"), true);
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
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <link rel="stylesheet" href="./perfil.css" type="text/css" />

    <title></title>
    <!-- Fonts Google -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
    />

    <?php
    /* <!-- Json Files --> */
    /* <script src="perfil.json"></script> */
    /* <script src="config.json"></script> */
    ?>
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li class="logo">
            <?php
              echo $config["sitio"][0];
            ?>
            <small>
              <?php
                echo $config["sitio"][1];
              ?>
            </small>
            <?php
              echo $config["sitio"][2];
            ?>
          </li>
          <li class="saludo">
            <?php
              echo $config["saludo"];
            ?>
          </li>
          <li class="busqueda">
            <a href="../index.html">
              <?php
                echo $config["home"];
              ?>
            </a>
          </li>
        </ul>
      </nav>
    </header>
    <main>
      <div id="grid" class="row">
        <div id="myimage" class="col-xl-3 col-md-6 col-12">
          <img src="<?php echo $perfil["ci"]; ?>.jpg" class="image-fluid" alt="Profile Image" />
        </div>
        <div id="mycontent" class="col-xl-9 col-md-6 col-12">
          <h1 class="name">
            <?php
              echo $perfil["nombre"];
            ?>
          </h1>
          <p class="desc">
            <?php
              echo $perfil["descripcion"];
            ?>
          </p>
          <table>
            <tr>
              <td class="q-color">
                <?php
                  echo $config["color"];
                ?>
              </td>
              <td class="a-color">
                <?php
                  echo $perfil["color"];
                ?>
              </td>
            </tr>
            <tr>
              <td class="q-libro">
                <?php
                  echo $config["libro"];
                ?>
              </td>
              <td class="a-libro">
                <?php
                  echo $perfil["libro"];
                ?>
              </td>
            </tr>
            <tr>
              <td class="q-musica">
                <?php
                  echo $config["musica"];
                ?>
              </td>
              <td class="a-musica">
                <?php
                  echo $perfil["musica"];
                ?>
              </td>
            </tr>
            <tr>
              <td class="q-video_juego">
                <?php
                  echo $config["video_juego"];
                ?>
              </td>
              <td class="a-video_juego">
                <?php
                  echo join(", ", $perfil["video_juego"]);
                ?>
              </td>
            </tr>
            <tr>
              <td class="bold q-lenguajes">
                <?php
                  echo $config["lenguajes"];
                ?>
              </td>
              <td class="bold a-lenguajes">
                <?php
                  echo join(", ", $perfil["lenguajes"]);
                ?>
              </td>
            </tr>
          </table>
          <p class="email">
            <?php
              $email = $perfil["email"];
              $mailto = $config["email"];
              echo str_replace(
                "[email]",
                "<a href='mailto: $email'> $email </a>",
                $mailto,
              );
            ?>
          </p>
        </div>
      </div>
    </main>
    <footer>
      <?php
        echo $config["copyRight"];
      ?>
    </footer>

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

    <?php
    /* <!-- My own scripts --> */
    /* <script src="perfil.js"></script> */
    ?>
  </body>
</html>
