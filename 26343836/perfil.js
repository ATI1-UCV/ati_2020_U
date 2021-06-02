$(function() {

    $("title").text(perfil.nombre);
    $("#footer").text(config.copyRight);

    $("#logo").html(config.sitio[0] + "<span>" + config.sitio[1] +  "</span> " + config.sitio[2]);

    $("#saludo").text(config.saludo + ", Diego");
    $("#busqueda").html("<a href='../index.html'>" + config.home + "</a>");

    $("#nombre").text(perfil.nombre);
    $("#descripcion").text(perfil.descripcion);

    $("#imagen").attr("src", perfil.imagen);
    
    $("#color_fav").text(config.color);
    $("#color").text(perfil.color);
    $("#libro_fav").text(config.libro);
    $("#libro").text(perfil.libro);
    $("#musica_fav").text(config.musica);
    $("#musica").text(perfil.musica);
    $("#video_juego_fav").text(config.video_juego);
    $("#video_juego").text(perfil.video_juego.toString());

    $("#lenguajes_fav").text(config.lenguajes);
    $("#lenguajes").text(perfil.lenguajes.toString());

    var correoEnlace = "<a href=\"mailto: [email]\">[email]</a>".replace("[email]", perfil.email).replace("[email]", perfil.email);

    $("#correo").html(config.email.replace("[email]", correoEnlace));
});