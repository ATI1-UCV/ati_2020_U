<header>
    <nav>
        <ul class="row">
            <li class="logo sitio col-12 col-md-3"><small></small></li>
            <li class="saludo col-12 col-md-3">
            </li>
            <li class="busqueda col-12 col-md-6">
                <?php echo $index ? '<form onsubmit="fillMain()">
                    <input type="text" id="myInput" placeholder="Nombre...">
                    <input type="button" onclick="fillMain()" onsubmit="fillMain()" value="Buscar">
                    </form>' : '<a href="/index.php"></a>'; ?>
                <select id="select">
                    <option <?php echo ($_SESSION["len"] == 'EN') ? "selected" : "" ?> value=<?php echo $index ? '/?len=en' : '&len=en'?>>EN</option>
                    <option <?php echo ($_SESSION["len"] == 'ES') ? "selected" : "" ?> value=<?php echo $index ? '/?len=es' : '&len=es'?>>ES</option>
                    <option <?php echo ($_SESSION["len"] == 'PT') ? "selected" : "" ?> value=<?php echo $index ? '/?len=pt' : '&len=pt'?>>PT</option>
                </select>
            </li>
        </ul>
    </nav>
</header>