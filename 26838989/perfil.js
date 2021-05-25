// THIS FILE WILL NOT RUN ANYMORE, ITS DONE BY PHP ON THE SERVER SIDE

document.title = `${perfil.nombre}`;
// $(document).attr("title", "New Title"); // does not work on IE

$("img").attr("src", `${perfil.ci}.jpg`);

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

putText(".saludo", `${config.saludo}, ${perfil.nombre}`);
putText(".busqueda a", `${config.home}`);
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
