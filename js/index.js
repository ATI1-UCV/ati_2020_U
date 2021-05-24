$( document ).ready(function() {
    $("#profile_photo").attr("src"   ,perfil.imagen)
	$("#profile_photo").attr("alt"   ,"Cesar Salazar Foto")
	$("#profile_photo").attr("width" ,"200")
	$("#profile_photo").attr("height","300")

	$("#logo").html(config.sitio[0]+"<small>"+config.sitio[1]+"</small>"+config.sitio[2]) 
	$("#saludo").html(config.saludo+", "+config.nombre)
	$("#busqueda").html("<a href=\"../index.html\">"+config.home+"</a>")

	$("#name_person").html(config.nombre)

	$("#description_person").html("<i>" + config.descripcion + "</i>")  

	$("#like_person").html(config.color +": "+ perfil.color + "<br>" + config.libro +": "+ perfil.libro + "<br>" + config.musica +": "+ perfil.musica + "<br>" + config.video_juego +": "+ perfil.video_juego + "<br>" + config.lenguajes+": "+ "<b>"+perfil.lenguajes+"</b>")  

	$("#contact_person").html(config.email + "<a href = \"mailto: bitemecesar@gmail.com\">"+perfil.email+"</a>")

	$("footer").hmtl(config.copyRight)

});