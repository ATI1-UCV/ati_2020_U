window.onload = app;

var perfil;
var config;


async function getInfo(url) {
    try {
        const resultado = await fetch(url);
        const data = await resultado.json();
        return data;
    } catch (error) {
        console.log(error);
        return;
    }
}

async function app(){
    perfil = await getInfo(`/${page_perfil}`);
    console.log(perfil);
    config = await getInfo(language);
    console.log(config);
    header();
    fillMain();
    footer();
    seleccionarIdioma();
    
}

function header(){
    $(document).attr("title", perfil.nombre);
    $('img').attr("src", image);
    const small = $('<small></small>').text(config.sitio[1]);
    $('.sitio').html(`${config.sitio[0]} ${small[0].outerHTML} ${config.sitio[02]}`);
    $('.saludo').text(`${config.saludo} , ${username}`);
    $('.busqueda a').text(config.home);
    $('h1').text(perfil.nombre);
    $('.description').text(perfil.descripcion);
}


function fillMain(){
    const preguntas = ["color", "libro", "musica", "video_juego", "lenguajes"];
    for (let i = 0; i < 5; i++) {
        let palabra = "";
        $(`.${preguntas[i]}-p`).text(config[preguntas[i]]);
        if ((typeof perfil[preguntas[i]]) === 'object') {
            for (x of perfil[preguntas[i]]) {
                palabra += x + ', ';
            }
            let text = palabra.substring(0, palabra.length - 2);
            if (preguntas[i] === 'lenguajes') {
                $(`.${preguntas[i]}-r`).append($('<span></span>').text(text));
            } else {
                $(`.${preguntas[i]}-r`).append(text);
            }
        } else {
            $(`.${preguntas[i]}-r`).text(perfil[preguntas[i]]);
        }
    }
    const anchor = $('<a></a>').attr('href', `mailto:${perfil.email}`).text(perfil.email);
    $('.comunicacion').html(config.email.replace("[email]", anchor[0].outerHTML));

}

function footer(){
    $('footer').text(config.copyRight);
}

function seleccionarIdioma(){
    const select = document.querySelector('#select');
    select.addEventListener('change', (e) => {
        str = window.location.toString();
        if(str.includes('len')){
            str = str.replace('&len=es', e.target.value);
            str = str.replace('&len=en', e.target.value);
            str = str.replace('&len=pt', e.target.value);
        }else{
            str = window.location + e.target.value;
        }
        window.location = str;
    });
}