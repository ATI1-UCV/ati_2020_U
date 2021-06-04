		<header>
			<nav class="container-fluid">
				<ul class="row">
					<li class="logo col-lg-3 col-md-4">
						<?php
							echo $config_json['sitio'][0] . '<small>' . $config_json['sitio'][1] . '</small>' . $config_json['sitio'][2];
						?>
					</li>
					<li class="saludo col-lg-4 col-md-3">
						<span>
							<?php 
								echo $config_json['saludo']
							?>
						</span>
						<?php 
							echo ',',$usuario.'(visita '.$_COOKIE['contador'].')'; 
						?>
					</li>
					<li class="col-lg-1 col-md-1">
						<select name="lenguaje" id="lenguaje">
						  <option value="es">Español</option>
						  <option value="en">Ingles</option>
						  <option value="pt">Portugues</option>
						</select>
					</li>
					<li class="busqueda col-lg-3 col-md-3">
						<?php 
							if(!$cedula_perfil){
						?>
							<form id="formulario">
								<input 
									type="text" 
									name="search" 
									id="input_buscar" 
									placeholder="<?php echo $config_json["buscar"];?>">
								<input 
									type="button" 
									name="buscar" 
									style="width:60px !important;" 
									id="buscar" 
									value="<?php echo $config_json['buscar'];?>">
							</form>
						<?php 
							}else{
						?>
							<a href="/">
								<?php
									echo $config_json['home']
	 							?>
							</a>
						<?php
							}
						?>
					</li>
				</ul>	
			</nav> 
	    </header>