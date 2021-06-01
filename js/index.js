$("#sec").append($("<div id=\"lista\"></div>"));
$("#lista").addClass("row center");

url = (event) => {
    var ci = event.target.getAttribute("data-ci");
    window.location.href = "perfil.php?ci=" + ci + "&len=" +len_js;
}


var l = datos.length;
for(i = 0; i < l; i++) {
    var img = $("<img></img>")[0];
    $(img).attr("src", datos[i].imagen);
    $(img).addClass("w-100 d-block");
    var li = $("<div></div>")[0];
    $(li).addClass("col-md-3");
    var a = $("<a></a>")[0];
    $(a).attr("data-ci", datos[i].ci);
    $(a).attr("href", "#");
    $(a).html(datos[i].nombre);
    a.addEventListener("click", url);
    $(li).append(img);
    $(li).append(a);
    $("#lista").append(li);
}
var lis = $("<li></li>")[0];
$(lis).addClass("d-none");
$(lis).css("width", "100%");
$(lis).attr("id", "no_hay");
$("#lista").append(lis);
var name = "";
$(lis).html(config.no_hay.replace("[query]", name));


function busqueda() {
    name = document.getElementById("name").value.toLowerCase();
    var childs = $("#lista").children();
    var remove = 0;
    for (i = 0; i < l; i++) {
        if (datos[i].nombre.toLowerCase().includes(name)) {
            $(childs[i]).attr("class", "col-md-3 d-block");
            remove--;
        } else {
            $(childs[i]).attr("class", "col-md-3 d-none");
            remove++;
        }
        if (remove == l) {
            $(lis).html(config.no_hay.replace("[query]", name));
            $(lis).attr("class", "d-block");
        } else {
            $(lis).attr("class", "d-none");
        }
    }
}