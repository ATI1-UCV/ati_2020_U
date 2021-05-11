$(".logo").html(config.sitio[0] + "<strong>" + config.sitio[1] + "</strong>" + config.sitio[2])
$(".busqueda").html(config["home"])
$(".saludo").html(config["nombre"])
$(".TABLA tr:nth-child(1) td:nth-child(1)").html(config["color"])
$(".TABLA tr:nth-child(2) td:nth-child(1)").html(config["libro"])
$(".TABLA tr:nth-child(3) td:nth-child(1)").html(config["musica"])
$(".TABLA tr:nth-child(4) td:nth-child(1)").html(config["video_juego"])
$(".TABLA tr:nth-child(5) td:nth-child(1)").html(config["lenguajes"])
$("footer").html( config["copyRight"])

$("#texto1").html(perfil["nombre"])
$("#texto2").html(perfil["descripcion"])
$(".TABLA tr:nth-child(1) td:nth-child(2)").html(perfil["color"])
$(".TABLA tr:nth-child(2) td:nth-child(2)").html(perfil["libro"])
$(".TABLA tr:nth-child(3) td:nth-child(2)").html(perfil["musica"])
$(".TABLA tr:nth-child(4) td:nth-child(2)").html(perfil["video_juego"])
$(".texto3:nth-child(2)").html(perfil["lenguajes"])

$(".comu").text(config["email"]).append(
    $("<a></a>",{ href:"https://mail.google.com/mail/?view=cm&fs=1&to=eduardosuarez.ucv@gmail.com"}).append(
        $("<span></span>",{id:"texto4", text: perfil["email"]})
    )
)