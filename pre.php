<header>
  <nav>
    <ul>
      <li class="logo"></li>
      <li class="saludo"></li>
      <li class="busqueda">
        <div id="dropdown-lang" class="dropdown">
          <button class="dropbtn">Lang:</button>
          <div class="dropdown-content">
            <a href="?len=pt<?php if (isset($ci)) { echo "&ci=$ci"; } ?>"><img src="/icon/portugal.png"></img></a>
            <a href="?len=es<?php if (isset($ci)) { echo "&ci=$ci"; } ?>"><img src="/icon/spain.png"></img></a>
            <a href="?len=en<?php if (isset($ci)) { echo "&ci=$ci"; } ?>"><img src="/icon/usa.png"></img></a>
          </div>
        </div>
        <?php if (isset($index)) : ?>
        <form>
          <input type="text" />
          <input type="button" />
        </form>
        <?php else : ?>
        <a href="/index.php"></a>
        <?php endif ?>
      </li>
    </ul>
  </nav>
</header>

