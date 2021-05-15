$(".logo").html(config.sitio[0] + "<strong>" + config.sitio[1] + "</strong>" + config.sitio[2])
$(".busqueda").html(config["home"])
$(".saludo").html(config["nombre"])
$(".colorC").html(config["color"])
$(".libroC").html(config["libro"])
$(".musicaC").html(config["musica"])
$(".videoJuegoC").html(config["video_juego"])
$(".lenguajeC").html(config["lenguajes"])
$("footer").html( config["copyRight"])

$("#texto1").html(perfil["nombre"])
$("#texto2").html(perfil["descripcion"])
$(".colorP").html(perfil["color"])
$(".libroP").html(perfil["libro"])
$(".musicaP").html(perfil["musica"])
$(".videoJuegoP").html(perfil["video_juego"])
$(".lenguajeP").html(perfil["lenguajes"])

$(".comu").text(config["email"]).append(
    $("<a></a>",{ href:"https://mail.google.com/mail/?view=cm&fs=1&to=eduardosuarez.ucv@gmail.com"}).append(
        $("<span></span>",{id:"texto4", text: perfil["email"]})
    )
)