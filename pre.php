<header>
    <nav class="container">
        <ul class="row">

            <li class="col-sm-6 col-md-4 col-lg-4 logo">
                <?php 
                    echo ("$sitio[0]<small>$sitio[1]</small> $sitio[2]");
                ?>
            </li>

            <li class="col-sm-5 col-md-3 col-lg-3 saludo">
                <?php 
                    echo ("<span id='saludo'>$saludo</span>$nombreSaludo");
                ?>
            </li>

            <li class="col-sm-6 col-md-4 col-lg-2 lenguaje">
                <div id='lenguaje'>
                    <select name ='lenguaje' class="custom-select lenguaje">
                        <option selected>Lenguaje</option>
                        <option value="ES">Español</option>
                        <option value="EN">English</option>
                        <option value="PT">Portuguese</option>
                    </select>	
                <div/>
                
                
            </li>

            <li class="col-sm-5 col-md-12 col-lg-2 busqueda">
            
                    <?php 
                    if($type === 'index'){
                        echo ("
                        <form class='form-group form-inline d-flex justify-content-center'>
                            <input class='form-control form-control-sm' id='nombreBusqueda' type='text' placeholder='$nombre'>
                            <input class='form-control form-control-sm' id='botonBusqueda' type='button' value='$buscar' >
                            </form>");
                    }else{
                        
                        echo ("
                            <a href='./index.php'>
                                $home 
                            </a>");
                    }
                        
                        
                    ?>
                
            </li>
                        
        </ul>	
    </nav> 

</header>
