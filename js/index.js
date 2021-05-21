window.onload = function() {

    config = JSON.parse(JSON.stringify(config));
    estudiantes = JSON.parse(JSON.stringify(listado));

    document.title = config.sitio[0] + config.sitio[1] + ' ' + config.sitio[2];
    document.getElementsByClassName('logo')[0].innerHTML = config.sitio[0] + '<small>' + config.sitio[1] +
        '</small>' + config.sitio[2];
    document.getElementsByClassName('saludo')[0].innerHTML = config.saludo + ', ' + estudiantes[0].nombre;

    const ul = document.createElement('DIV');
    ul.classList.add('myUL');
    ul.classList.add('carousel-inner');
    let cont = 0

    for (x of estudiantes) {
        
        const container_image = document.createElement('DIV');
        container_image.classList.add('carousel-item');
        if (cont++ == 0){container_image.classList.add('active');}
        // div.setAttribute('data-interval', '10000');

        const image = document.createElement('IMG');
        image.src = x.imagen;
        image.alt = `foto de ${x.nombre}`;

        const parrafo = document.createElement('P');
        const anchor= document.createElement('A');
        parrafo.textContent = x.nombre;
        if (x.ci == '26956071') {
            anchor.href = `${x.ci}/perfil.html`;
        } 
        else {anchor.href = '#';}
        const container2 = document.createElement('DIV')
        anchor.appendChild(image);
        anchor.appendChild(parrafo);
        anchor.classList.add('container-visible');
        console.log(container2)
        container2.appendChild(anchor)
        container_image.appendChild(container2)
        ul.appendChild(container_image);
    }

    const main = document.getElementsByTagName('section')[0];
    main.setAttribute('id', 'carouselExampleControls');
    main.setAttribute('data-ride', 'carousel');
    main.classList.add('carousel');
    main.classList.add('slide');
    main.appendChild(ul);

    document.getElementsByTagName('footer')[0].innerHTML = config.copyRight;

    $('#carouselExampleControls').carousel({
        interval: false
    });
    
    $('.carousel-item').each(function () {
        var next = $(this).next();
        // if (!next.length) {
        //     next = $(this).siblings(':first');
        // }
        next.children(':first-child').clone().appendTo($(this));
    
        for (var i = 0; i < 2; i++) {
            next = next.next();
            // if (!next.length) {
            //     next = $(this).siblings(':first');
            // }
            next.children(':first-child').clone().appendTo($(this));
        }
    });



// 
}

function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementsByClassName("myUL")[0];
    li = ul.getElementsByTagName("DIV");
    var sum = 0;
    var ind = 0;
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            sum++;
            li[i].style.display = "";
            ind = i;
        } else {
            li[i].style.display = "none";
        }
    }
    li[ind].style.marginBlockEnd = '85px';
    if (!sum) { alert(config.mensaje_error.replace("[query]", input.value)); }

}