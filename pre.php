<header>
  <nav>
    <ul>
      <li class="logo" id="especial-logo">
  <?php
  echo($config["sitio"][0]), "<small>", ($config["sitio"][1]), "</small>" ?>
      </li>
      <li class="saludo">
        <span class="traducir-config" data-json-key="saludo"><?php echo($config["saludo"]) ?></span>
        <span class="traducir-perfil" data-json-key="nombre"><?php echo($perfil_nombre) ?></span>
      </li>
      <li class="busqueda">
        <?php echo $extend_header; ?>
      </li>
    </ul>	
  </nav> 
</header>
