async function cambiarLenguaje(len) {
    var src = "";
    if (len == "es" || len == "en" || len == "pt") {
        if (len == "en") {
            src = "conf/configEN.json";
        } else if (len == "pt") {
            src = "conf/configPT.json";
        } else if (len == "es") {
            src = "conf/configES.json";
        }
    }
    config = await fetch(src).then(function (response) {
        if (response.ok) {
            var r = response.json();
            return r;
        } else {
            return null;
        }
    });
    if (config != null) {
        $("#saludo").html(config.saludo + ", " + perfil.nombre + " (visita " + contador + ")");
        $("#sitio").html(config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2]);
        $("#name").attr("placeholder", config.nombre + "...");
        $("#buscar").attr("value", config.buscar);
        $("#footer").html(config.copyRight);
        $("#dropdown").html(len);
        if($("#no_hay").length) {
            $("#no_hay").html(config.no_hay.replace("[query]", name));
        }
        len_js = len;
    }
}

invoke = (event) => {
    var arg = event.target.getAttribute("value");
    cambiarLenguaje(arg);
}

document.getElementById("es").addEventListener('click', invoke, false);
document.getElementById("en").addEventListener('click', invoke, false);
document.getElementById("pt").addEventListener('click', invoke, false);