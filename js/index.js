var datos = [];
var config = [];

const main = () => {
  document.title = `${config.sitio.join(" ")}`;

  putText = (selec, text) => (document.querySelector(selec).innerText = text);
  putHtml = (selec, text) => (document.querySelector(selec).innerHTML = text);

  putHtml(
    ".logo",
    `${config.sitio[0]} <small>${config.sitio[1]}</small> ${config.sitio[2]}`
  );

  putText(".saludo", `${config.saludo}, ${user} (visita ${views})`);

  input = document.querySelector(".busqueda input[type=text]");
  input.placeholder = `${config.nombre}`;
  button = document.querySelector(".busqueda input[type=button]");
  button.value = `${config.buscar}`;

  putText("footer", `${config.copyRight}`);

  renderGrid = () => {
    query = document.querySelector(".busqueda input[type=text]").value;
    pattern = query.toLowerCase();

    res = datos.filter((elem) => elem.nombre.toLowerCase().startsWith(pattern));

    content = res
      .sort((a, b) => b.nombre < a.nombre)
      .map(
        (elem) => `
<a href="/perfil.php/?ci=${elem.ci}" class="grid-item">
  <img src="${elem.imagen}" alt="no foto">
  <span>${elem.nombre}</span>
</a>`
      );

    content.length && putHtml(".grid-container", content.join("\n"));
    putText(
      ".error-notfound",
      content.length ? "" : `${config.error.replace("[query]", query)}`
    );
  };

  renderGrid();

  button.addEventListener("click", renderGrid);
  input.addEventListener("keydown", (event) => {
    if (event.keyCode === 13) {
      event.preventDefault();
      button.click();
    }
  });
};

const get_config = async () => {
  const configs = {
    en: "configEN.json",
    es: "configES.json",
    pt: "configPT.json",
  };

  const resp = await fetch(`/confi/${configs[lang]}`);
  return await resp.json();
};

(async () => {
  const resp = await fetch("/datos/index.json");
  datos = await resp.json();
  datos = datos.sort((a, b) => b.nombre - a.nombre);

  config = await get_config();
  main();
})();