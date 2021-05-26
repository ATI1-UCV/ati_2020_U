
function llenar(){

	document.title = perfil.nombre;
	document.getElementById("logo").innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2];
	document.getElementById("saludo").innerHTML = config.Bienvenida;
	document.getElementById("busqueda").innerHTML =  "<a href= '../index.html'>"+ config.Busqueda + "</a>";  
	document.getElementById("imagen").src = perfil.imagen; 
	document.getElementById("h_1").innerHTML = perfil.nombre;
	document.getElementById("descripcion").innerHTML = perfil.descripcion;
	document.getElementById("color_fav").innerHTML = config.color;  
	document.getElementById("color").innerHTML = perfil.color; 
	document.getElementById("libro_fav").innerHTML = config.libro; 
	document.getElementById("libro").innerHTML = perfil.libro; 
	document.getElementById("videojuego_fav").innerHTML = config.video_juego; 
	document.getElementById("videojuego").innerHTML = perfil.video_juego; 
	document.getElementById("musica_fav").innerHTML = config.musica; 
	document.getElementById("musica").innerHTML = perfil.musica;
	document.getElementById("lenguajes_fav").innerHTML = config.lenguajes;
	document.getElementById("lenguajes").innerHTML = perfil.lenguajes.toString(); 
	var enlaceC = "<a href=\"[email]\">[email]</a>".replace("[email]",perfil.email).replace("[email]", perfil.email);

	document.getElementById("correo").innerHTML = config.email.replace("[email]",enlaceC);
	document.getElementById("Footer").innerHTML = config.copyRight;
}