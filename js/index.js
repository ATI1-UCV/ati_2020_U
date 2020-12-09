window.onload = function() {

    config = JSON.parse(JSON.stringify(config));
    estudiantes = JSON.parse(JSON.stringify(listado));

    document.title = config.sitio[0] + config.sitio[1] + ' ' + config.sitio[2];
    document.getElementsByClassName('logo')[0].innerHTML = config.sitio[0] + '<small>' + config.sitio[1] +
        '</small>' + config.sitio[2];
    document.getElementsByClassName('saludo')[0].innerHTML = config.saludo + ', ' + estudiantes[0].nombre;
    let lista = '<ul id="myUL">'
    for (x of estudiantes) {
        if (x.ci == '26956071') {
            lista += '<li><img src=\"' + x.imagen + '\" ' + 'alt=\"foto de ' + x.nombre + '\" />' +
                '<a href=\"26956071/perfil.html\">' + x.nombre + '</a></li>'
        } else {
            lista += '<li><img src=\"' + x.imagen + '\" ' + 'alt=\"foto de ' + x.nombre + '\" />' +
                '<a href=\"#\">' + x.nombre + '</a></li>';
        }
    }
    lista += '</ul>';
    console.log(lista);
    document.getElementsByTagName('section')[0].innerHTML = lista;
    document.getElementsByTagName('footer')[0].innerHTML = config.copyRight;
}

function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
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