config = JSON.parse(JSON.stringify(config));
perfil = JSON.parse(JSON.stringify(perfil));
document.title = perfil.nombre;
const img = document.querySelector('img');
img.setAttribute('src', perfil.imagen);
const preguntas = ["color", "libro", "musica", "video_juego", "lenguajes"];
document.getElementsByClassName('sitio')[0].innerHTML = config.sitio[0] + '<small>' + config.sitio[1] +
    '</small>' + config.sitio[2];
document.getElementsByClassName('saludo')[0].innerHTML = config.saludo + ', ' + perfil.nombre;
document.getElementsByClassName('busqueda')[0].getElementsByTagName('a')[0].innerHTML = config.home;
document.getElementsByTagName('h1')[0].innerHTML = perfil.nombre;
document.getElementsByClassName('description')[0].innerHTML = perfil.descripcion;
for (let i = 0; i < 5; i++) {
    let palabra = "";
    document.getElementsByClassName((preguntas[i] + '-p'))[0].innerHTML = config[preguntas[i]];
    if ((typeof perfil[preguntas[i]]) == 'object') {
        for (x of perfil[preguntas[i]]) {
            palabra += x + ', ';
        }
        if (preguntas[i] == 'lenguajes') {
            document.getElementsByClassName((preguntas[i] + '-r'))[0].innerHTML = '<span>' +
                palabra.substring(0, palabra.length - 2) + '</span>';
        } else {
            document.getElementsByClassName((preguntas[i] + '-r'))[0].innerHTML = palabra.substring(0, palabra.length - 2);
        }
    } else {
        document.getElementsByClassName((preguntas[i] + '-r'))[0].innerHTML = perfil[preguntas[i]];
    }
}
document.getElementsByClassName('comunicacion')[0].innerHTML = config.email.replace("[email]",
    "<a href=\"mailto:gabrielaustariz@gmail.com\">" + perfil.email + "</a>");
document.getElementsByTagName('footer')[0].innerHTML = config.copyRight;