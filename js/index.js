
function busquedaFetch(){
    var url = "http://"+ window.location.host + "/datos/index.json";

    //Usando fetch
    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        busqueda(data);
    })
    .catch(function(err) {
        console.error(err);
    });

}

function busqueda(listado){
    var listadoEstudiantes =JSON.parse(JSON.stringify(listado));

    $('#listado li, #listado h3').remove()
    var textoABuscar = $('#textoABuscar').val()

    var listadoBusqueda = listadoEstudiantes.map(estudiante => {
        if(estudiante.nombre.toLowerCase().includes(textoABuscar.toLowerCase()) && estudiante !== undefined){           
            return estudiante
        }
    })  

    console.log(listadoBusqueda)

    if(listadoBusqueda.some(estudiante => estudiante !== undefined) ){
        $('#listado').removeClass('not_found')
        $('#listado').addClass('found')
        $('#carrusel').addClass('splide')
        $(".splide__arrows").css("display", "block")
        listadoBusqueda.forEach(estudiante => {
            if(estudiante !== undefined){
                $('#listado').append('<li class="image splide__slide" ><img src="'+ estudiante.imagen + '"> <p>'+ estudiante.nombre + '</p></li>');
            }
            
        })
        
    }else {
        $('#listado').removeClass('found')
        $('#listado').addClass('not_found')
        $('#listado').append('<h3>No se han encontrado resultados con: ' + textoABuscar + '</h3>')
        $('#carrusel').removeClass('splide')
        $(".splide__arrows").css("display", "none")
    }
    for( i=0; i < splides.length; i++){
        new Splide(splides[i],{ 
            type    : 'loop',
            perPage : 4,
            autoplay: true,
            rewind: true,
            pagination: false
            }).mount()
    }
    
}

busquedaFetch();

$('#textoABuscar').keyup( busquedaFetch );

$('#submitBusqueda').click(busquedaFetch);

$("#submitBusqueda").on("click",function(event){
    event.preventDefault();
 });

//Splide
var splides = $(".splide");

document.addEventListener( 'DOMContentLoaded', function () {
    new Splide( '.splide' , {
        type    : 'loop',
        perPage : 5,
        rewind: true,
        clone: false,
        autoplay: true,
    }).mount();
} );
