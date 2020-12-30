function llenar(){
	
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
}