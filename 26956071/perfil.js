config = JSON.parse(JSON.stringify(config));
perfil = JSON.parse(JSON.stringify(perfil));


//Pass to jquery form
$(document).attr("title", perfil.nombre);
$('img').attr("src", perfil.imagen);

const small = $('<small></small>').text(config.sitio[1]);

$('.sitio').html(`${config.sitio[0]} ${small[0].outerHTML} ${config.sitio[02]}`);

// document.getElementsByClassName('sitio')[0].innerHTML = config.sitio[0] + '<small>' + config.sitio[1] +
//     '</small>' + config.sitio[2];
$('.saludo').text(`${config.saludo} , ${perfil.nombre}`);
$('.busqueda a').text(config.home);
$('h1').text(perfil.nombre);
$('.description').text(perfil.descripcion);
// document.getElementsByClassName('saludo')[0].innerHTML = config.saludo + ', ' + perfil.nombre;
// document.getElementsByClassName('busqueda')[0].getElementsByTagName('a')[0].innerHTML = config.home;
// document.getElementsByTagName('h1')[0].innerHTML = perfil.nombre;
// document.getElementsByClassName('description')[0].innerHTML = perfil.descripcion;

const preguntas = ["color", "libro", "musica", "video_juego", "lenguajes"];
for (let i = 0; i < 5; i++) {
    let palabra = "";
    $(`.${preguntas[i]}-p`).text(config[preguntas[i]]);
    // document.getElementsByClassName((preguntas[i] + '-p'))[0].innerHTML = config[preguntas[i]];
    if ((typeof perfil[preguntas[i]]) === 'object') {
        for (x of perfil[preguntas[i]]) {
            palabra += x + ', ';
        }
        let text = palabra.substring(0, palabra.length - 2);
        if (preguntas[i] === 'lenguajes') {
            $(`.${preguntas[i]}-r`).append($('<span></span>').text(text));
            // document.getElementsByClassName((preguntas[i] + '-r'))[0].innerHTML = '<span>' +
            //     palabra.substring(0, palabra.length - 2) + '</span>';
        } else {
            $(`.${preguntas[i]}-r`).append(text);
            // document.getElementsByClassName((preguntas[i] + '-r'))[0].innerHTML = palabra.substring(0, palabra.length - 2);
        }
    } else {
        $(`.${preguntas[i]}-r`).text(perfil[preguntas[i]]);
        // document.getElementsByClassName((preguntas[i] + '-r'))[0].innerHTML = perfil[preguntas[i]];
    }
}



const anchor = $('<a></a>').attr('href', `mailto:${perfil.email}`).text(perfil.email);
$('.comunicacion').html(config.email.replace("[email]", anchor[0].outerHTML));
// document.getElementsByClassName('comunicacion')[0].innerHTML = config.email.replace("[email]",
//     "<a href=\"mailto:gabrielaustariz@gmail.com\">" + perfil.email + "</a>");
$('footer').text(config.copyRight);
// document.getElementsByTagName('footer')[0].innerHTML = config.copyRight;