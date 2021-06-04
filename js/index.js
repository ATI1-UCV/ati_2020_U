window.onload = app;

var estudiantes;
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

function carousel(){
    $('#carouselExampleControls').carousel({
        interval: false,
        wrap: false
    });
    // Para el swipe.
    $('#carouselExampleControls').on('touchstart', function(event){
        const xClick = event.originalEvent.touches[0].pageX;
        $(this).one('touchmove', function(event){
            const xMove = event.originalEvent.touches[0].pageX;
            const sensitivityInPx = 5;
    
            if( Math.floor(xClick - xMove) > sensitivityInPx ){
                $(this).carousel('next');
            }
            else if( Math.floor(xClick - xMove) < -sensitivityInPx ){
                $(this).carousel('prev');
            }
        });
        $(this).on('touchend', function(){
            $(this).off('touchmove');
        });
    });
}

async function app(){
    estudiantes = await getInfo("/datos/index.json");
    // console.log(estudiantes)
    config = await getInfo(language);
    header();
    fillMain();
    footer();
    $('#carouselExampleControls').carousel('pause');
    carousel();
    aparecerPerfil();
}

function header(){

    document.title = config.sitio[0] + config.sitio[1] + ' ' + config.sitio[2];
    document.getElementsByClassName('logo')[0].innerHTML = config.sitio[0] + '<small>' + config.sitio[1] +
        '</small>' + config.sitio[2];
    document.getElementsByClassName('saludo')[0].innerHTML = config.saludo + ', ' + username + '<span>' + `(visita : ${visita})` + '</span>';
}

function fillMain(){

    document.querySelector('.carousel-control-prev').style.display = 'flex';
    document.querySelector('.carousel-control-next').style.display = 'flex';
    const main = document.getElementById('carouselExampleControls');
    $('.myUL').remove();
    var input, filter, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    const lista_estudiantes = document.createElement('DIV')
    lista_estudiantes.classList.add('myUL');
    lista_estudiantes.classList.add('carousel-inner');
    let cont = 0

    for(x of estudiantes){
        txtValue = x.nombre;
        if (txtValue.toUpperCase().indexOf(filter) > -1 || input == '') {
            const container_image = document.createElement('DIV');
            container_image.classList.add('carousel-item');
            if (cont++ == 0){container_image.classList.add('active');}
    
            const image = document.createElement('IMG');
            image.src = `/${x.imagen}`;
            image.alt = `foto de ${x.nombre}`;
    
            const parrafo = document.createElement('P');
            const anchor= document.createElement('A');
            parrafo.textContent = x.nombre;
            // if (x.ci == '26956071') {
            //     anchor.href = `$/{x.ci}/perfil.html`;
            // } 
            // else {anchor.href = '#';}
            anchor.setAttribute('data-ci', `/${x.ci}/perfil.json`)
            anchor.href = '#'
            const container2 = document.createElement('DIV')
            anchor.appendChild(image);
            anchor.appendChild(parrafo);
            anchor.classList.add('container-visible');
            container2.appendChild(anchor)
            container_image.appendChild(container2)
            lista_estudiantes.appendChild(container_image);
        }
    }
    main.appendChild(lista_estudiantes);
    group();
    if (!cont && input != '') { 
        alert(config.mensaje_error.replace("[query]", input.value));
        document.querySelector('.carousel-control-prev').style.display = 'none';
        document.querySelector('.carousel-control-next').style.display = 'none';
    }

}

function footer(){
    document.getElementsByTagName('footer')[0].innerHTML = config.copyRight;
}


function group(){
    $('.carousel-item').each(function () {
        var next = $(this).next();
        next.children(':first-child').clone().appendTo($(this));
    
        for (var i = 0; i < 2; i++) {
            next = next.next();
            next.children(':first-child').clone().appendTo($(this));
        }
    });
}


function aparecerPerfil(){
    const per = document.querySelectorAll('.container-visible');
    previus = '';
    per.forEach(element => {
        element.onclick = (e) => {
            const perfil = document.querySelector('.perfil')
            if(previus == e.currentTarget.dataset.ci && !perfil.classList.contains('hidden') ){
                perfil.classList.add('hidden');
            }else{
                perfil.classList.remove('hidden');
                activate(e.currentTarget.dataset.ci);
            }
            previus = e.currentTarget.dataset.ci
    }}
    );
}

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

function fillMain2(){

    if(perfil.imagen){
        $('.perfil img').attr("src", `/${perfil.ci}/${perfil.imagen}`);
    }else{
        $('.perfil img').attr("src", `/${perfil.ci}/${perfil.ci}.jpg`);
    }

    $('.perfil h1').text(perfil.nombre);
    $('.perfil .description').text(perfil.descripcion);
    const preguntas = ["color", "libro", "musica", "video_juego", "lenguajes"];
    for (let i = 0; i < 5; i++) {
        let palabra = "";
        $(`.${preguntas[i]}-p`).text(config[preguntas[i]]);
        if ((typeof perfil[preguntas[i]]) === 'object') {
            for (x of perfil[preguntas[i]]) {
                palabra += x + ', ';
            }
            let text = palabra.substring(0, palabra.length - 2);
            $(`.${preguntas[i]}-r`).empty()
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

async function activate(url){
    perfil = await getInfo(url);
    fillMain2();
}