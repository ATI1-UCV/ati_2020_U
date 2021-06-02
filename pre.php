<header class="header">
    <nav>
        <ul id="header-content" class="container">
            <li id="logo" class="logo col-lg-4"><?php echo ($decoded_config_data['sitio'])[0] . '<span>'. ($decoded_config_data['sitio'])[1] .'</span>'. ($decoded_config_data['sitio'])[2]; ?></li>

            <li id="saludo" class="saludo col-lg-3"> <?php 
    
            if($currentFile == '/index.php'){
                echo '<span id="saludoSinNombre">' . $decoded_config_data['saludo'] . "</span>" . ', ' . $_SESSION['usuario'] . " Visitas: " . $_COOKIE['contador'];
            }else{
                echo '<span id="saludoSinNombre">' . $decoded_config_data['saludo'] . "</span>" . ', ' . $_SESSION['usuario'];
            }

             ?></li>

            
            <li class="col-lg-2">
                    <select id="lenguaje" class="form-select" aria-label=".form-select-lg example">
                        <option selected>Lenguage</option>
                        <option value="es">ES</option>
                        <option value="en">EN</option>
                        <option value="pt">PT</option>
                    </select>
                </li>
            <?php if($currentFile == '/perfil.php'){ ?>
                <li class="col-lg-3"><a id="home" href="index.php"><?php echo $decoded_config_data['home']; ?></a></li>
            <?php }else if($currentFile == '/index.php'){ ?>
                <li id="busqueda" class="busqueda col-lg-3">
                    <form>
                        <input id="textoABuscar" type="text" placeholder="Buscar..." >
                        <button id="submitBusqueda">Aceptar</button>
                    </form>
                </li>

            <?php } ?>
        </ul>	
    </nav> 
</header>