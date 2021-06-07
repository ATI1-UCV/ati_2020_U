var perfil = [];
var config = [];

const main = () => {
  document.title = `${perfil.nombre}`;
  // $(document).attr("title", "New Title"); // does not work on IE

  $("#myimage img").attr("src", `/${img}`);

  $(".logo").append([
    `${config.sitio[0]}`,
    $("<small></small>", { text: `${config.sitio[1]}` }),
    `${config.sitio[2]}`,
  ]);

  $(".email").html(
    config.email.replace(
      "[email]",
      `<a href = "mailto: ${perfil.email}">${perfil.email}</a>`
    )
  );

  putText = (selec, text) => $(selec).text(text);

  putText(".saludo", `${config.saludo}, ${user} (visita ${views})`);
  putText(".busqueda > a", `${config.home}`);
  putText("footer", `${config.copyRight}`);

  putText(".name", `${perfil.nombre}`);
  putText(".desc", `${perfil.descripcion}`);

  putTable = (elem) => {
    putText(".q-" + elem, config[elem]);
    putText(
      ".a-" + elem,
      Array.isArray(perfil[elem]) ? perfil[elem].join(", ") : perfil[elem]
    );
  };

  ["color", "libro", "musica", "video_juego", "lenguajes"].forEach((i) =>
    putTable(i)
  );
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
  const resp = await fetch(`/${ci}/perfil.json`);
  perfil = await resp.json();

  config = await get_config();
  main();
})();