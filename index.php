<?php
    session_start();
    if(!isset($_GET["len"])){
        $lan = isset($_SESSION["len"]);
        if(!$lan){
            $_SESSION["len"] = 'ES';
        }
        $lan = $_SESSION["len"];
        $result2 = "/conf/config${lan}.json";
    }else{
        $language = $_GET["len"];
        switch($language){
            case 'en':
                $result2 = "/conf/configEN.json";
                $_SESSION["len"] = 'EN';
                break;
            case 'pt':
                $result2 = "/conf/configPT.json";
                $_SESSION["len"] = 'PT';
                break;
            case 'es':
                $result2 = "/conf/configES.json";
                $_SESSION["len"] = 'ES';
                break;
            default:
                $lan = isset($_SESSION["len"]);
                if(!$lan){
                    $_SESSION["len"] = 'ES';
                }
                $lan = $_SESSION["len"];
                $result2 = "/conf/config${lan}.json";
                break;
        }
    }

    if(!isset($_SESSION["usuario"])){
        $_SESSION["usuario"] = 'Gabriela Ustariz';
    }
    $usuario = $_SESSION["usuario"];

    //setcookie("visitas", 0, time() - 10000);
    if(isset($_COOKIE["visitas"])){
        setcookie("visitas", ($_COOKIE["visitas"] ?? 0) + 1, time() + 3600, "/");
        $mensaje = $_COOKIE["visitas"];
    }else{
        setcookie("visitas", 1, time() + 3600, "/");
        $mensaje = 1;
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="stylesheet" href="/css/perfil.css" type="text/css">
    <link rel="stylesheet" href="/css/index.css" type="text/css">
    <script src="/js/index.js"></script>
    <title></title>
</head>

<body>
    <header>
        <nav>
            <ul class="row">
                <li class="logo sitio col-12 col-md-3"><small></small></li>
                <li class="saludo col-12 col-md-3"></li>
                <li class="busqueda col-12 col-md-5">
                    <form onsubmit="fillMain()">
                        <input type="text" id="myInput" placeholder="Nombre...">
                        <input type="button" onclick="fillMain()" onsubmit="fillMain()" value="Buscar">
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main class="main">
        <section class="index">
            <section id="carouselExampleControls" data-ride="carousel" class="carousel slide container-main">
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </section>
        </section>
    
        <section class="perfil hidden">
            <div class="perfil-container">
                <div class="row">
                    <div class="foto-perfil col-xl-3 col-md-6 col-12 ">
                        <img src="" alt="foto de perfil" />
                    </div>
                    <section class=" perfil-info col-12 col-xl-9 col-md-6 col-12">
                        <h1></h1>
                        <p class="description"></p>
                        <table>
                            <tr>
                                <td class="color-p"></td>
                                <td class="color-r"></td>
                            </tr>
                            <tr>
                                <td class="libro-p"></td>
                                <td class="libro-r"></td>
                            </tr>
                            <tr>
                                <td class="musica-p"></td>
                                <td class="musica-r"></td>
                            </tr>
                            <tr>
                                <td class="video_juego-p"></td>
                                <td class="video_juego-r"></td>
                            </tr>
                            <tr>
                                <td class="lenguajes-p"></td>
                                <td class="lenguajes-r"><span></span></td>
                            </tr>
                        </table>
                        <p class="comunicacion">
                            <a href="mailto:gabrielaustariz@gmail.com"></a>
                        </p>
                    </section>
                </div>
            </div>

        </section>
    </main>

    <footer>
    </footer>
    <script>
        var username = "<?php echo $usuario; ?>";
        var language = "<?php echo $result2; ?>";
        var visita = "<?php echo $mensaje; ?>";
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    
</body>

</html>