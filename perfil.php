<?php
    session_start();
    $default = (isset($_GET["len"]));
    $ci = (isset($_GET["ci"]));
    $default = (isset($_GET["len"]));
    if(!$default ){
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
    $usuario = isset($_SESSION["usuario"]);
    if(!$usuario){
        $_SESSION["usuario"] = 'Gabriela Ustariz';
    }
    $usuario = $_SESSION["usuario"];

    if(!$ci){
        header('Location: /index.php');
        exit();
    }else{
        $ci = $_GET["ci"];
        $result = file_get_contents("${ci}/perfil.json");
        $perfil = json_decode($result, true);
        if(!$result){
            header('Location: /index.php');
            exit();
        }
        $perf ="${ci}/perfil.json";
    }

    $image = (isset($perfil['imagen']));
    if($image){
        $real  = "/" . $perfil['ci'] . "/" . $perfil['imagen'];
    }elseif(file_exists($perfil['ci'] . "/" . $perfil['ci'] . '.jpg')){
        $real = "/" . $perfil['ci'] . "/" . $perfil['ci'] . '.jpg';
    }elseif(file_exists($perfil['ci'] . "/" . $perfil['ci'] . '.jpeg')){
        $real =  "/" . $perfil['ci'] . "/" . $perfil['ci'] . '.jpeg';
    }elseif(file_exists($perfil['ci'] . "/" . $perfil['ci'] . '.png')){
        $real = "/" . $perfil['ci'] . "/" . $perfil['ci'] . '.png';
    }elseif(file_exists($perfil['ci'] . "/" . $perfil['ci'] . '.gif')){
        $real = "/" . $perfil['ci'] . "/" . $perfil['ci'] . '.gif';
    }

    //setcookie("visitas", 0, time() - 10000);
    if(isset($_COOKIE["visitas"])){
        setcookie("visitas", ($_COOKIE["visitas"] ?? 0) + 1, time() + 3600, "/");
    }else{
        setcookie("visitas", 1, time() + 3600, "/");
    }

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/perfil.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <title></title>
</head>

<body>
    <?php $index=false; 
        include_once "pre.php"; 
    ?>
    <section class="main">
        <div>
            <div class="row">
                <div class="foto-perfil col-xl-3 col-md-6 col-12 ">
                    <img src="" alt="foto de perfil" />
                    <script>
                    </script>
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
                            <td class="musica-r">
                            </td>                        
                        </tr>
                        <tr>
                            <td class="video_juego-p"></td>
                            <td class="video_juego-r">
                            </td>
                        </tr>
                        <tr>
                            <td class="lenguajes-p"></td>
                            <td class="lenguajes-r"><span>
                            </span></td>
                        </tr>
                    </table>
                    <p class="comunicacion">
                        <a></a>
                    </p>
                </section>
            </div>
        </div>

    </section>
    <?php include_once "post.php"; ?>
    <script>
        var username = "<?php echo $usuario; ?>";
        var language = "<?php echo $result2; ?>";
        var page_perfil = "<?php echo $perf; ?>";
        var image = "<?php echo $real; ?>";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/perfil.js"></script>
</body>

</html>