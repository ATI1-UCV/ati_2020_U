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

async function app(){
    estudiantes = await getInfo("/datos/index.json");
    config = await getInfo(language);
    header();
    fillMain();
    footer();
    seleccionarIdioma();
}

function header(){

    document.title = config.sitio[0] + config.sitio[1] + ' ' + config.sitio[2];
    document.getElementsByClassName('logo')[0].innerHTML = config.sitio[0] + '<small>' + config.sitio[1] +
        '</small>' + config.sitio[2];
    document.getElementsByClassName('saludo')[0].innerHTML = config.saludo + ', ' + username + '<span>' + `(visita : ${visita})` + '</span>';
    console.log(visita);
}

function fillMain(){


    const main = document.getElementById('main-container');
    $('.myUL').remove();
    var input, filter, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    const lista_estudiantes = document.createElement('DIV');
    lista_estudiantes.classList.add('myUL');
    let cont = 0;

    for(x of estudiantes){
        txtValue = x.nombre;
        if (txtValue.toUpperCase().indexOf(filter) > -1 || input == '') {
            const container_image = document.createElement('DIV');

            const image = document.createElement('IMG');
            image.src = `/${x.imagen}`;
            image.alt = `foto de ${x.nombre}`;
    
            const parrafo = document.createElement('P');
            const anchor= document.createElement('A');
            parrafo.textContent = x.nombre;
            anchor.href = `/perfil.php/?ci=${x.ci}`;
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