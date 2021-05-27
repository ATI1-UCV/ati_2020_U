/*function llenar(){
	
	document.title = config.sitio[0] + config.sitio[1] + " " + config.sitio[2];
	document.getElementById("footer").innerHTML = config.copyRight;
	
	document.getElementById("logo").innerHTML = config.sitio[0] + "<span>" + config.sitio[1] +  "</span> " + config.sitio[2];
	
	document.getElementById("saludo").innerHTML = config.saludo + ", Jose Perez";
	document.getElementById("busqueda").innerHTML = "<form><input type='text' placeholder='" + config.nombre + "...' name='buscarPerfil' value='' id='query' onkeyup='btnQuery.click()'><input type='button' id='btnQuery' onClick='buscar();' value='" + config.buscar + "'></form>";

	dibujarListado(listado, "");
}

function dibujarListado(listado, query){
	var ulListado = document.getElementById("listado")
	var listadoTam = listado.length;
	if (listadoTam < 1){
		ulListado.innerHTML = "<p id='resultadoBusqueda'>" + config.noResultadoBusqueda.replace("[query]", query) + "</p>";
	} else {
		ulListado.innerHTML = "";
		//console.log(listadoTam);
		for (var i = 0; i < listadoTam; i++) {
		    //console.log(listado[i]);
		    var li = document.createElement("li");
			 li.innerHTML = "<a href='" + listado[i]["ci"] + "/perfil.html'><img src='" + listado[i]["imagen"] + "' alt='FALTA FOTO'><br><span>" + listado[i]["nombre"] + "</span></a>";
			 ulListado.appendChild(li);
		}
	
	}
}

function buscar(){
	var query = document.getElementById("query").value;
	console.log('query: ' + query.toLowerCase());
	//let resultado = listado.filter(estudiante => estudiante.nombre.toLowerCase().indexOf(query.toLowerCase()) > -1);
	let resultado = listado.filter(estudiante => estudiante.nombre.toLowerCase().indexOf(query.toLowerCase()) > -1);
	//console.log(resultado);
	dibujarListado(resultado,query);
}*/
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

  res = listado.filter((elem) => elem.nombre.toLowerCase().startsWith(pattern));

  content = res
    .sort((a, b) => b.nombre < a.nombre)
    .map(
      (elem, idx) => `
<div class="carousel-item grid-container ${!idx ? "active" : ""}">
  <div class="carousel-item-container">
    <a href="${
      elem.ci === "22021629" ? elem.ci + "/perfil.html" : "#"
    }" class="grid-item">
      <img src="${elem.imagen}" alt="no foto">
      <span>${elem.nombre}</span>
    </a>
  </div>
</div>`
    );

  content.length && putHtml(".carousel-inner", content.join("\n"));
  putText(
    ".error-notfound",
    content.length ? "" : `${config.error.replace("[query]", query)}`
  );
  if (!content.length) return;

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
};

renderGrid();

button.addEventListener("click", renderGrid);

input.addEventListener("keydown", (event) => {
  if (event.keyCode === 13) {
    event.preventDefault();
    button.click();
  }
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