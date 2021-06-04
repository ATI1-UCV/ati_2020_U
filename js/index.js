var contador = getCookie("contador");
contador = contador ? contador : 1;
$("#saludo").html(config.saludo + ", " + nombre + " (visita " + contador + ")");
$("#sitio").html(config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2]);
$("#name").attr("placeholder", config.nombre + "...");
$("#buscar").attr("value", config.buscar);
$("#footer").html(config.copyRight);

invoke = (event) => {
    var ci = event.getAttribute("data-ci");
    requestPage(ci);
}

function requestPage(ci) {
    $.ajax({
        type: "GET",
        url: "/getDatos.php?ci=" + ci,
        dataType: 'json',
        success: function (perfil) {
            $("#nombre").html(perfil.nombre);
            $("#descripcion").html(perfil.descripcion);
            $("#config_color").html(config.color + "<br/>");
            if (Array.isArray(perfil.color)) {
                var l = perfil.color.length;
                $("#perfil_color").html(perfil.color[0]);
                for (i = 1; i < l; ++i) {
                    $("#perfil_color").html($("#perfil_color").html() + ", " + perfil.color[i]);
                }
            } else {
                $("#perfil_color").html(perfil.color);
            }
            $("#config_libro").html(config.libro + "<br/>");
            if (Array.isArray(perfil.libro)) {
                var l = perfil.libro.length;
                $("#perfil_libro").html(perfil.libro[0]);
                for (i = 1; i < l; ++i) {
                    $("#perfil_libro").html($("#perfil_libro").html() + ", " + perfil.libro[i]);
                }
            } else {
                $("#perfil_libro").html(perfil.libro);
            }
            $("#config_musica").html(config.musica + "<br/>");
            if (Array.isArray(perfil.musica)) {
                var l = perfil.musica.length;
                $("#perfil_musica").html(perfil.musica[0]);
                for (i = 1; i < l; ++i) {
                    $("#perfil_musica").html($("#perfil_musica").html() + ", " + perfil.musica[i]);
                }
            } else {
                $("#perfil_musica").html(perfil.musica);
            }
            $("#config_juego").html(config.video_juego + "<br/>");
            if (Array.isArray(perfil.video_juego)) {
                var l = perfil.video_juego.length;
                $("#perfil_juego").html(perfil.video_juego[0]);
                for (i = 1; i < l; ++i) {
                    $("#perfil_juego").html($("#perfil_juego").html() + ", " + perfil.video_juego[i]);
                }
            } else {
                $("#perfil_juego").html(perfil.video_juego);
            }
            $("#lenguajes").html(config.lenguajes);
            if (Array.isArray(perfil.lenguajes)) {
                var l = perfil.lenguajes.length;
                $("#mis_lenguajes").html(perfil.lenguajes[0]);
                for (i = 1; i < l; ++i) {
                    $("#mis_lenguajes").html($("#mis_lenguajes").html() + ", " + perfil.lenguajes[i]);
                }
            } else {
                $("#mis_lenguajes").html(perfil.lenguajes);
            }
            $("#contacto").html(config.email.replace("[email]", "<a href=\"mailto:" + perfil.email + "\"> " + perfil.email + "</a>"));
            $("#imagen").attr("src", perfil.imagen);
            $("#perfil").attr("class", "d-block h-50");
            contador = getCookie("contador");
            $("#saludo").html(config.saludo + ", " + nombre + " (visita " + contador + ")");
        }
    });
}

function crearElemento(i) {
    var div = $("<div></div>")[0];
    $(div).addClass("carousel-item");
    if (!i) {
        $(div).addClass("active");
    }
    var img = $("<img></img>")[0];
    $(img).attr("src", listado[i].imagen);
    $(img).attr("class", "d-block w-100");
    var content = $("<div></div>")[0];
    var a = $("<a></a>")[0];
    $(a).attr({
        "href": "#",
        "data-ci": listado[i].ci,
        "onclick": "invoke(this);"
    });
    $(a).html(listado[i].nombre);
    var Acontent = $("<div></div>")[0];
    $(Acontent).addClass("center");
    $(content).append(img);
    $(Acontent).append(a);
    $(content).append(Acontent);
    $(content).addClass("conten");
    $(content).addClass("col-3");
    $(div).append(content);
    $(lista).append(div);
}

var lista = $("#lista")[0];
var l = listado.length;
for (i = 0; i < l; i++) {
    crearElemento(i);
}

$(".carousel").swipe({
    swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
        if (direction == 'left') $(this).carousel('next');
        if (direction == 'right') $(this).carousel('prev');
    },
    allowPageScroll: "vertical"
});

$('#carrusel').carousel({
    interval: 10000
})

function vecinos(e) {
    $('.carousel-item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < e - 2; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
        }
    });
}
vecinos(4);

$('#carrusel').bind('mousewheel', function (e) {
    if (e.originalEvent.wheelDelta / 120 > 0) {
        $(this).carousel('next');
    }
    else {
        $(this).carousel('prev');
    }
});

function getCookie(nombre) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${nombre}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
    else return null;
}
getCookie("contador");

var divMsg = $("<div></div>");
var h = $("<h1></h1>");
$(divMsg).append(h);

function busqueda() {
    var name = document.getElementById("name").value;
    re = new RegExp("^" + name, "i");
    remove = 0;
    $("#lista").children().remove();
    for (i = 0; i < l; i++) {
        var names = listado[i].nombre.split(" ");
        var n = names.length;
        var found = false;
        for (j = 0; j < n; j++) {
            if (re.test(names[j])) {
                found = true;
                break;
            }
        }
        if (found || re.test(listado[i].nombre)) {
            $("#lista").append(crearElemento(i));
        } else {
            remove++;
        }
        if (remove == l) {
            $(lista).append(divMsg);
            $(h).html(config.no_hay.replace("[query]", name));
            $(divMsg).show();
        } else {
            $(divMsg).hide();
        }
    }

    if (!$(".active").length) {
        $("#lista").children(":first-child").addClass("active");
    }
    var r = l - remove;
    if (r >= 4) {
        vecinos(4);
        if (r == 4) {
            $(".carousel-control-next").hide();
            $(".carousel-control-prev").hide();
            var uni = $("#lista").children(":first-child")[0];
            $("#lista").children().remove();
            $("#lista").append(uni);
        } else {
            $(".carousel-control-next").show();
            $(".carousel-control-prev").show();
        }
    } else if (r == 3) {
        $(".carousel-control-next").hide();
        $(".carousel-control-prev").hide();
        vecinos(3);
        var uni = $("#lista").children(":first-child")[0];
        $("#lista").children().remove();
        $("#lista").append(uni);
        $("#lista").children().children().attr("class", "d-block w-100 col-4");
    } else if (r == 2) {
        $(".carousel-control-next").hide();
        $(".carousel-control-prev").hide();
        vecinos(2);
        var uni = $("#lista").children(":first-child")[0];
        $("#lista").children().remove();
        $("#lista").append(uni);
        $("#lista").children().children().attr("class", "d-block w-100 col-4");
        $("#lista").children().children(":first-child").attr("class", "d-block w-100 col-6");
    } else if (r == 1) {
        $(".carousel-control-next").hide();
        $(".carousel-control-prev").hide();
        vecinos(3);
        var uni = $("#lista").children(":first-child")[0];
        $("#lista").children().remove();
        $("#lista").append(uni);
        $("#lista").children().children().attr("class", "d-block w-100 col-4");
        $("#lista").children().children(":first-child").attr("class", "d-block w-100 col-12");
    } else {
        $(".carousel-control-next").hide();
        $(".carousel-control-prev").hide();
    }
}
