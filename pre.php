<header>
			<nav class="container-fluid">
				<ul class="row">
					<li id="logo" class="logo col">
						<?php
							echo ($config['sitio'])[0]."<small>".($config['sitio'])[1]."</small>".($config['sitio'])[2]
						?>
					</li>

					<li class="saludo col" style="display: inline-flex;">
						<div id="saludo">
						<?php
							echo $config['saludo'].", ".$usuario;
						?>
						</div>

							<?php
							echo " (visita ".$_COOKIE['contador'].")";
							?>
					</li>

					<?php if($current == "index"): ?>
						<li id="busqueda" class="busqueda col">
							<form>
								<input type="search" 
									   name="searchNav"
									   style="line-height: normal;"
									   />
								<button id="buscar" 
										type="submit" 
									    name="searchNavB"
									    style="line-height: normal;"
									    > <?php echo $config['buscar'] ; ?> </button>
							</form>
						</li>
					<?php else : ?>
						<li id="busqueda" class="busqueda col ">
							<?php
							echo "<a href=./index.php>".$config['home']."</a>";
							?>
						</li>
					<?php endif; ?>

					<li class="col">
						<select name="lenDrop" id="lenDrop" class="form-select">
							<option value="ES">Español</option>
							<option value="EN">English</option>
							<option value="PT">Portuguese</option>
						</select>
					</li>
				</ul>	
			</nav> 
	    </header>