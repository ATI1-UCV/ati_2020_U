document.getElementById("saludo").innerHTML = config.saludo+ " " + perfil.nombre;
document.getElementById("sitio").innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2]
document.getElementById("name").setAttribute("value", config.nombre + "...");
document.getElementById("buscar").setAttribute("value", config.buscar);
document.getElementById("footer").innerHTML = config.copyRight;
document.getElementById("sec").innerHTML = "<ul id=\"lista\"></ul>"

ul = document.getElementById("lista");
l = listado.length;
for(i = 0; i < l; i++) {
    img = document.createElement("img");
    img.setAttribute("src", listado[i].imagen);
    img.setAttribute("width", 80);
    img.setAttribute("height", 80);
    img.setAttribute("class", "center");
    li = document.createElement("li");
    font = document.createElement("font");
    font.setAttribute("size", 4);
    a = document.createElement("a");
    a.setAttribute("href", "#");
    a.innerHTML = listado[i].nombre;
    font.appendChild(img);
    font.appendChild(a);
    li.appendChild(font);
    ul.appendChild(li);
}
lis = document.createElement("li");
lis.style.display = "none";
lis.style.width = "100%";
ul.appendChild(lis);


function busqueda() {
    name = document.getElementById("name").value;
    childs = ul.children;
    re = new RegExp(name, "i");
    remove = 0;
    for(i = 0; i < l; i++) {
        b = re.test(listado[i].nombre);
        if(!b) {
            childs[i].style.display = "none";
            remove++;
        } else {
            childs[i].style.display = "inline-block";
            remove--;
        }
        if(remove == l) {
            lis.innerHTML = config.no_hay.replace("[query]", name);
            lis.style.display = "inline-block";
        } else {
            lis.style.display = "none";
        }
    }
}
