var datos = [];
var config = [];
var perfil = {};
var img = "";
var show = false;


const setCookie = (cname, cvalue, exdays) => {
  var d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
};

const getCookie = (cname) => {
  var name = cname + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") c = c.substring(1);
    if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
  }
  return null;
};
const putText = (selec, text) => $(selec).text(text);
const putTable = (elem, config, perfil) => {
  putText(".q-" + elem, config[elem]);
  putText(
    ".a-" + elem,
    Array.isArray(perfil[elem]) ? perfil[elem].join(", ") : perfil[elem]
  );
};

const renderData = () => {
  // $(document).attr("title", "New Title"); // does not work on IE
  document.title = `${perfil.nombre || "ATI"}`;

  $(".logo")
    .empty()
    .append([
      `${config.sitio[0]}`,
      $("<small></small>", { text: `${config.sitio[1]}` }),
      `${config.sitio[2]}`,
    ]);

  putText(".saludo", `${config.saludo}, ${user} (visita ${views})`);
  putText("footer", `${config.copyRight}`);

  $(".busqueda input[type=text]").attr("placeholder", `${config.nombre}`);
  $(".busqueda input[type=button]").val(`${config.buscar}`);

  $("#myimage img").attr("src", `${img}`);

  $(".email").html(
    config.email.replace(
      "[email]",
      `<a href = "mailto: ${perfil.email}">${perfil.email}</a>`
    )
  );

  putText(".name", `${perfil.nombre}`);
  putText(".desc", `${perfil.descripcion}`);

  ["color", "libro", "musica", "video_juego", "lenguajes"].forEach((i) =>
    putTable(i, config, perfil)
  );
};

const fetchData = async (el) => {
  const resp = await fetch(`/getDatos.php?ci=${el.dataset.ci}`);
  img = el.querySelector("img").src;
  perfil = await resp.json();
  show = true;
  $("main").show();
  renderData();
};

const renderGrid = () => {
  const query = $(".busqueda input[type=text]").val();
  const pattern = query.toLowerCase();

  const res = datos.filter((elem) =>
    elem.nombre.toLowerCase().startsWith(pattern)
  );

  const content = res
    .sort((a, b) => b.nombre < a.nombre)
    .map(
      (elem, idx) => `
<div class="carousel-item grid-container ${!idx ? "active" : ""}">
  <div class="carousel-item-container">
    <button class="grid-item" data-ci=${elem.ci}>
      <img src="${elem.imagen}" alt="no foto">
      <span>${elem.nombre}</span>
    </button>
  </div>
</div>`
    );

  content.length && $("#carousel > .carousel-inner").html(content.join("\n"));

  putText(
    ".error-notfound",
    content.length ? "" : `${config.error.replace("[query]", query)}`
  );

  if (show) $("main").show();
  else $("main").hide();

  if (content.empty) return;

  $("#carousel").carousel({
    keyword: true,
    interval: false,
    wrap: false,
  });

  $(".carousel-item").each(function () {
    var next = $(this).next();
    next.children(":first-child").clone().appendTo($(this));

    for (var i = 0; i < 2; i++) {
      next = next.next();
      next.children(":first-child").clone().appendTo($(this));
    }
  });

  Array.from(document.querySelectorAll(".grid-item")).forEach((elem) => {
    elem.addEventListener("click", () => fetchData(elem));
  });
};

const fetchConfig = async () => {
  const resp = await fetch(`/getConfig.php?len=${lang}`);
  config = await resp.json();
};

const render = async () => {
  await fetchConfig();
  renderGrid();
  renderData();
};

const changeLang = async (event, el) => {
  event.preventDefault();
  lang = el.dataset.len;
  setCookie("lang", lang, 1);
  await render();
};

$("main").hide();

(async () => {
  const resp = await fetch("/datos/index.json");
  datos = await resp.json();
  lang = getCookie("len") || "es";
  user = getCookie("usuario");
  views = getCookie("visitas");

  Array.from(document.querySelectorAll(".language")).forEach((elem) => {
    elem.addEventListener("click", (event) => changeLang(event, elem));
  });

  $("#carousel").swipe({
    swipe: function (direction) {
      if (direction == "left") $(this).carousel("next");
      if (direction == "right") $(this).carousel("prev");
    },
    allowPageScroll: "vertical",
  });

  $("#carousel").bind("mousewheel", function (e) {
    if (e.originalEvent.wheelDelta / 120 > 0) {
      $(this).carousel("next");
    } else {
      $(this).carousel("prev");
    }
  });
  await render();

  $(".busqueda input[type=button]").click(renderGrid);
  $(".busqueda input[type=text]").keydown((event) => {
    if (event.keyCode === 13) {
      event.preventDefault();
      event.target.click();
    }
  });
})();
