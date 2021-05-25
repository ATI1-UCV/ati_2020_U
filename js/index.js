window.onload = app;

var config = JSON.parse(JSON.stringify(config));
var estudiantes = JSON.parse(JSON.stringify(listado));


function app(){
    header();
    fillMain();
    footer();
}

function header(){

    document.title = config.sitio[0] + config.sitio[1] + ' ' + config.sitio[2];
    document.getElementsByClassName('logo')[0].innerHTML = config.sitio[0] + '<small>' + config.sitio[1] +
        '</small>' + config.sitio[2];
    document.getElementsByClassName('saludo')[0].innerHTML = config.saludo + ', ' + estudiantes[0].nombre;

}

function fillMain(){


    const main = document.getElementById('main-container');
    $('.myUL').remove();
    var input, filter, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    const lista_estudiantes = document.createElement('DIV')
    lista_estudiantes.classList.add('myUL');
    // lista_estudiantes.classList.add('carousel-inner');
    let cont = 0

    for(x of estudiantes){
        txtValue = x.nombre;
        if (txtValue.toUpperCase().indexOf(filter) > -1 || input == '') {
            const container_image = document.createElement('DIV');
            // container_image.classList.add('carousel-item');
            // if (cont++ == 0){container_image.classList.add('active');}
    
            const image = document.createElement('IMG');
            image.src = x.imagen;
            image.alt = `foto de ${x.nombre}`;
    
            const parrafo = document.createElement('P');
            const anchor= document.createElement('A');
            parrafo.textContent = x.nombre;
            if (x.ci == '26956071') {
                anchor.href = `${x.ci}/perfil.php`;
            } 
            else {anchor.href = '#';}
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
    console.log(main);
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