<!DOCTYPE HTML>
<html>

<?php
    $default = (isset($_GET["len"]));
    if(!$default ){
        $result2 = file_get_contents("conf/configES.json");
    }else{
        $language = $_GET["len"];
        switch($language){
            case 'en':
                $result2 = file_get_contents("conf/configEN.json");
                break;
            case 'pt':
                $result2 = file_get_contents("conf/configPT.json");
                break;
            case 'es':
            default:
                $result2 = file_get_contents("conf/configES.json");
                break;
        }
    }
    $result = file_get_contents("perfil.json");
    $perfil = json_decode($result, true);
    $config = json_decode($result2, true);

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8">
    <link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../perfil.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="perfil.css" type="text/css">
    <script src="perfil.json"></script>
    <script src="config.json"></script>
    <title><?php echo $perfil['nombre']?></title>
</head>

<body>
    <header>
        <nav>
            <ul class="row">
                <li class="sitio col-12 col-md-3"><?php echo $config['sitio'][0]?> <small><?php echo $config['sitio'][1]?> </small><?php echo $config['sitio'][2]?></li>
                <li class="saludo col-12 col-md-3"><?php echo $config['saludo'] . ', ' . $perfil['nombre']?></li>
                <li class="busqueda col-12 col-md-6">
                    <a href="../../index.html"><?php echo $config['home']?> </a>
                </li>
            </ul>
        </nav>
    </header>
    
    <section class="main">
        <div>
            <div class="row">
                <div class="foto-perfil col-xl-3 col-md-6 col-12 ">
                    <img src="<?php echo "/" . $perfil['ci'] . "/" . $perfil['imagen']?>" alt="foto de perfil" />
                </div>
                <section class=" perfil-info col-12 col-xl-9 col-md-6 col-12">
                    <h1><?php echo $perfil['nombre']?></h1>
                    <p class="description"><?php echo $perfil['descripcion']?></p>
                    <table>
                        <tr>
                            <td class="color-p"><?php echo $config['color']?></td>
                            <td class="color-r"><?php echo $perfil['color']?></td>
                        </tr>
                        <tr>
                            <td class="libro-p"><?php echo $config['libro']?></td>
                            <td class="libro-r"><?php echo $perfil['libro']?></td>
                        </tr>
                        <tr>
                            <td class="musica-p"><?php echo $config['musica']?></td>
                            <td class="musica-r">
                                <?php 
                                    $i=0;
                                    while( $i<count($perfil['musica']) - 1){
                                        echo $perfil['musica'][$i] . ", ";
                                        $i++;
                                    }
                                    echo  $perfil['musica'][$i]
                                ?>
                            </td>                        
                        </tr>
                        <tr>
                            <td class="video_juego-p"><?php echo $config['video_juego']?></td>
                            <td class="video_juego-r">
                                <?php 
                                    $i=0;
                                    while( $i<count($perfil['video_juego']) - 1){
                                        echo $perfil['video_juego'][$i] . ", ";
                                        $i++;
                                    }
                                    echo  $perfil['video_juego'][$i]
                                ?>

                            </td>
                        </tr>
                        <tr>
                            <td class="lenguajes-p"><?php echo $config['lenguajes']?></td>
                            <td class="lenguajes-r"><span>
                                <?php 
                                    $i=0;
                                    while( $i<count($perfil['lenguajes']) - 1){
                                        echo $perfil['lenguajes'][$i] . ", ";
                                        $i++;
                                    }
                                    echo  $perfil['lenguajes'][$i]
                                ?>
                            </span></td>
                        </tr>
                    </table>
                    <p class="comunicacion">
                        <?php echo str_replace("[email]","",$config['email']);?>
                        <a href="mailto:gabrielaustariz@gmail.com"><?php echo $perfil['email']?></a>
                    </p>
                </section>
            </div>
        </div>

    </section>
    <footer>
        <?php echo $config['copyRight']?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <!-- <script src="perfil.js"></script> -->
</body>

</html>