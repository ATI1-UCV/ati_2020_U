function change_data(config) {


	$("#logo").html(config.sitio[0]+"<small>"+config.sitio[1]+"</small>"+config.sitio[2]) 
	$("#saludo").html(config.saludo+", "+config.nombre)
	$("#busqueda").html("<a href=\"./index.php\">"+config.home+"</a>")

	$("#color_config").html(config.color)
	$("#libro_config").html(config.libro)
	$("#musica_config").html(config.musica)
	$("#video_config").html(config.video_juego)
	$("#lenguajes_config").html(config.lenguajes)

	$("#email_config").html(config.email)

	$("footer").html(config.copyRight)
}

async function fetch_data(url) {
	const response = await fetch(url);
	const data = await response.json();
	
	await change_data(data);
}

$( document ).ready(function() {
	console.log("DONE LOADING perfil");

	$("#profile_photo").attr("alt"   ,"Foto")
	$("#profile_photo").attr("sizes"   , "(max-width: 320px) 280px, (max-width: 480px) 440px, 800px")

	$("#lenDrop").change(function () {
		let len = this.value;
		let url = "conf/config"+len+".json";

		fetch_data(url);
	})
});


/*
console.log("JAVA FIRST");
$.ajax({
  async: false,
  type: 'POST', //http method
  url: 'perfil.php', //url to php file
  data: {'config': 'test1'}, //array or json object
  success: function(response) {
  	console.log("success");
    console.log("Ajax response",response);

    }
});

*/

/*
$( document ).ready(function() {
    $("#profile_photo").attr("src"   ,perfil.imagen)
	$("#profile_photo").attr("alt"   ,"Cesar Salazar Foto")
	$("#profile_photo").attr("srcset"   , perfil.imagen + " 320w,"+
										  perfil.imagen + " 480w,"+
										  perfil.imagen + " 800w")

	$("#profile_photo").attr("sizes"   , "(max-width: 320px) 280px, (max-width: 480px) 440px, 800px")



	$("#logo").html(config.sitio[0]+"<small>"+config.sitio[1]+"</small>"+config.sitio[2]) 
	$("#saludo").html(config.saludo+", "+config.nombre)
	$("#busqueda").html("<a href=\"../index.html\">"+config.home+"</a>")

	$("#name_person").html(config.nombre)

	$("#description_person").html("<i>" + config.descripcion + "</i>")  

	$("#like_person").html(config.color +": "+ perfil.color + "<br>" + config.libro +": "+ perfil.libro + "<br>" + config.musica +": "+ perfil.musica + "<br>" + config.video_juego +": "+ perfil.video_juego + "<br>" + config.lenguajes+": "+ "<b>"+perfil.lenguajes+"</b>")  

	$("#contact_person").html(config.email + "<a href = \"mailto: bitemecesar@gmail.com\">"+perfil.email+"</a>")

	$("footer").hmtl(config.copyRight)

});
*/



/*
document.addEventListener("DOMContentLoaded", function(){
	
	document.getElementById("profile_photo").src = perfil.imagen;
	document.getElementById("profile_photo").alt    = "Cesar Salazar Foto";
	document.getElementById("profile_photo").width  = "200";
	document.getElementById("profile_photo").height = "300";

	document.getElementById("logo").innerHTML = config.sitio[0]+"<small>"+config.sitio[1]+"</small>"+config.sitio[2];
	document.getElementById("saludo").innerHTML   = config.saludo+", "+config.nombre;
	document.getElementById("busqueda").innerHTML = "<a href=\"../index.html\">"+config.home+"</a>";

	document.getElementById("name_person").innerHTML = config.nombre;

	document.getElementById("description_person").innerHTML = "<i>" + config.descripcion + "</i>";

	document.getElementById("like_person").innerHTML = config.color +": "+ perfil.color + "<br>" + config.libro +": "+ perfil.libro + "<br>" + config.musica +": "+ perfil.musica + "<br>" + config.video_juego +": "+ perfil.video_juego + "<br>" + config.lenguajes+": "+ "<b>"+perfil.lenguajes+"</b>";

	document.getElementById("contact_person").innerHTML = config.email + "<a href = \"mailto: bitemecesar@gmail.com\">"+perfil.email+"</a>";

	document.getElementsByTagName("footer")[0].innerHTML = config.copyRight;
});*/