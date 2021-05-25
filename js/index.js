document.title = `${config.sitio.join(" ")}`;

putText = (selec, text) => (document.querySelector(selec).innerText = text);
putHtml = (selec, text) => (document.querySelector(selec).innerHTML = text);

putHtml(
  ".logo",
  `${config.sitio[0]} <small>${config.sitio[1]}</small> ${config.sitio[2]}`
);

putText(".saludo", `${config.saludo}, ${perfil.nombre}`);

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
<a href="${
        elem.ci === "26838989" ? elem.ci + "/perfil.php" : "#"
      }" class="grid-item">
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
