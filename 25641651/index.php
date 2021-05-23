<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link rel="stylesheet" href="./css/style.css"  type="text/css">
		<link rel="stylesheet" href="./css/perfil.css"  type="text/css">
		<script src="./config/config.json"></script>
		<script src="./config/perfil.json"></script>
		<title>Eduardo Suarez</title>
	</head>

    <?php
        $idioma = htmlspecialchars($_GET["len"]);
        if($idioma == "en"){
            $data2 = @file_get_contents("config/configEN.json");
        }
        else if($idioma == "es"){
            $data2 = @file_get_contents("config/configES.json");
        }
        else if($idioma == "pt"){
            $data2 = @file_get_contents("config/configPT.json");
        }else{
            $data2 = @file_get_contents("config/configES.json");
        }

        $data1 = @file_get_contents("config/perfil.json");
        $itemP = json_decode($data1, true);
        $itemC = json_decode($data2, true);
    ?>

	<body>
	    <nav class="navbar navbar-expand-lg navbar-dark bg-primary"> 
            <div class="navbar-nav container-fluid cont-logo">
                <a class="navbar-brand logo" href="#">ATI[UCV]2020-U</a>
                <div class="container">
                    <div class="row">
                        <a class="col navbar-brand text-center saludo" aria-current="page" href="#"><?php
                            echo $itemC["nombre"];
                        ?></a>
                        <a class="col navbar-brand text-center busqueda" href="../index.html">
                        <?php
                            echo $itemC["home"];
                        ?>
                        </a>
                    </div>    
                </div>
            </div>
        </nav>


        <div class="container">
            <div class="row m-3 w-100 ">
                <div class="col-5">
                    <img src="25641651.jpg" class="img-fluid imagen" alt="">
                </div>
                <div class="col-7 shadow p-3 mb-5 ps-5 bg-body rounded">
                    <h2 id="texto1"><?php echo $itemP["nombre"];?></h2>
                    <p id="texto2"><?php echo $itemP["descripcion"];?></p>
                    <div class="row">
                        <div class="col">
                            <p class="colorC"><?php echo $itemC["color"];?></p>
                        </div>
                        <div class="col">
                            <p class="colorP"><?php echo $itemP["color"];?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="libroC"><?php echo $itemC["libro"];?></p>
                        </div>
                        <div class="col">
                            <p class="libroP"><?php echo $itemP["libro"];?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="musicaC"><?php echo $itemC["musica"];?></p>
                        </div>
                        <div class="col">
                            <p class="musicaP"><?php echo $itemP["musica"];?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="videoJuegoC"><?php echo $itemC["video_juego"];?></p>
                        </div>
                        <div class="col">
                            <p class="videoJuegoP"><?php echo $itemP["video_juego"];?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="lenguajeC fw-bold"><?php echo $itemC["lenguajes"];?></p>
                        </div>
                        <div class="col">
                            <p class="lenguajeP fw-bold">
                                <?php 
                                    echo $itemP["lenguajes"][0];
                                    echo $itemP["lenguajes"][1];
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="row w-100">
                        <?php
                            echo '<p>';
                            echo $itemC["email"];
                            echo '</p>';
                            echo '<a href="https://mail.google.com/mail/?view=cm&fs=1&to=eduardosuarez.ucv@gmail.com" id="texto4">';
                                echo $itemP["email"];
                            echo '</a>';
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center p-3  bg-primary text-white" style="background-color: rgba(0, 0, 0, 0.2);">
        </footer>

		<!-- <script src="jquery-3.6.0.min.js"></script>  -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
		<!-- <script src="scrip.js"></script> -->
	</body>
</html>