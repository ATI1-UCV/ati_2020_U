putText = (selec, text) => document.querySelector(selec).innerText = text;

document.querySelector(".logo").innerHTML = `${config.sitio[0]} <small>${config.sitio[1]}</small> ${config.sitio[2]}`;
document.querySelector(".email").innerHTML = config.email.replace('[email]',`<a href = "mailto: ${perfil.email}">${perfil.email}</a>`);
document.querySelector("img").src = `${perfil.ci}.jpg`;
document.title = `${perfil.nombre}`

putText(".saludo",`${config.saludo}, ${perfil.nombre}`);
putText(".busqueda",`${config.home}`);
putText("footer",`${config.copyRight}`);

putText(".name",`${perfil.nombre}`);
putText(".desc",`${perfil.descripcion}`);

putTable = elem => {
	putText(".q-"+elem, config[elem]);
	putText(".a-"+elem, Array.isArray(perfil[elem])? perfil[elem].join(", ") : perfil[elem]);
};

["color","libro","musica","video_juego","lenguajes"].forEach(i => putTable(i));


