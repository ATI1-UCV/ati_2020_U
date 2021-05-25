
function AddUserProfile() {
    var fragment = document.createDocumentFragment();
    console.log("LISTADOS LEN: ", listado.length);

    for (var i = 0; i < listado.length; i++) {
        var e = document.createElement("li");
        e.className = "square_display_profile";
        e.innerHTML = "<img src=\""+listado[i].imagen+"\" alt=\""+listado[i].nombre+"\" width=\"100px\" height=\"120px\"> <h3>"+listado[i].nombre+"</h3>"	;
        fragment.appendChild(e);
    }

    var e = document.createElement("li");
    	e.id = "notFoundID";
    	e.style.display = "none";
        e.innerHTML = "<h3> No hay alumnos que tengan en su nombre: </h3>"	;
        fragment.appendChild(e);

    var UlElement = document.getElementById('listadosPerfiles');
    UlElement.appendChild(fragment);
}

function AddUserProfileCarousel() {
    var fragment = document.createDocumentFragment();
    var fragment2 = document.createDocumentFragment();
    console.log("LISTADOS LEN: ", listado.length);

    for (var i = 0; i < listado.length; i++) {

        // <div class="carousel-item active">
        var carouselItem = document.createElement("div");
        carouselItem.className = "carousel-item";
        // <img class="d-block w-100 h-100" src="./sample/Desert.jpg" alt="First slide">
        carouselItem.innerHTML = "<img class=\"d-block w-100 h-100\" src=\""+listado[i].imagen+"\" width=\"100px\" height=\"120px\" /><div class=\"carousel-caption d-none d-md-block\"><h5>"+listado[i].nombre+"</h5></div>";

        fragment.appendChild(carouselItem);


        // <li data-target="#carouselID" data-slide-to="0" class="active"></li>
        var li = document.createElement("li");
        num = i+1;
        li.setAttribute("data-target", "#carouselID");
        li.setAttribute("data-slide", num.toString());

        fragment2.appendChild(li)

    }

    var carouselInner = document.getElementById('carouselInnerID');
    carouselInner.appendChild(fragment);

    var carouselIndicators = document.getElementById('carouselIndicatorsID');
    carouselIndicators.appendChild(fragment2);

}

function filterList() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  var displayed = false;
  
  input = document.getElementById('buscadorID');
  filter = input.value.toUpperCase();

  ul = document.getElementById("listadosPerfiles");
  li = ul.getElementsByTagName('li');
  li[101].style.display = "none";

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("h3")[0];
    txtValue = a.textContent || a.innerText;

    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
      displayed = true;

    } else {
      li[i].style.display = "none";
    }
  }

  if (displayed == false) {
  	console.log("Not found, ",li.length);
  	li[101].innerHTML = "<h3> No hay alumnos que tengan en su nombre: "+ filter +" </h3>";
  	li[101].style.display = "";
  }
}

document.addEventListener("DOMContentLoaded", function(){

  AddUserProfileCarousel();
	
	document.getElementById("logo").innerHTML = config.sitio[0]+"<small>"+config.sitio[1]+"</small>"+config.sitio[2];
	document.getElementById("saludo").innerHTML   = config.saludo+", "+config.nombre;

	document.getElementById("buscadorID").placeholder = config.buscar;

	document.getElementsByTagName("footer")[0].innerHTML = config.copyRight;
});