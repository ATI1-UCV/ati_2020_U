<header>
  <nav>
    <ul>
      <li class="logo" id="especial-logo">
  <?php
  echo($config["sitio"][0]), " <small>", ($config["sitio"][1]), "</small> ", ($config["sitio"][2]) ?>
      </li>
      <li class="saludo">
        <span class="traducir-config" data-json-key="saludo"><?php echo($config["saludo"]) ?></span>
        <span><?php echo($perfil_nombre) ?></span>
      </li>
      <li>
        <select name="language" id="select-lang">
          <option value="es">
            Español
          </option>
          <option value="en">
            English
          </option>
          <option value="pt">
            Português
          </option>
        </select>
      </li>
      <li class="busqueda">
        <?php echo $extend_header; ?>
      </li>
    </ul>	
  </nav> 
</header>
