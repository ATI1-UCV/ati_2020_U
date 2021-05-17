var config_json = JSON.parse(JSON.stringify(config));
var perfilJson = JSON.parse(JSON.stringify(perfil));
var listadoEstudiantes = JSON.parse(JSON.stringify(listado));
var splides = $(".splide");




$("#submitBusqueda").on("click",function(event){
    event.preventDefault();
 });

listadoEstudiantes.forEach(estudiante => {
    $('#listado').append('<li class="image splide__slide" ><img width="70" height="80" src="'+ estudiante.imagen + '"> <p>'+ estudiante.nombre + '</p></li>');
})
for( i=0; i < splides.length; i++){
    new Splide(splides[i],{ 
        type    : 'loop',
        perPage : 3,
        autoplay: true, 
        rewind: true,
        pagination: false
        }).mount()
}

function busqueda(){
    $('#listado li, #listado h3 ').remove()
    var textoABuscar = $('#textoABuscar').val()
    console.log(textoABuscar)
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
        $('#listado').append('<h3>'+ config_json.notFound + textoABuscar + '</h3>')
        $('#carrusel').removeClass('splide')
        $(".splide__arrows").css("display", "none")
    }
    for( i=0; i < splides.length; i++){
        new Splide(splides[i],{ 
            type    : 'loop',
            perPage : 3,
            autoplay: true,
            rewind: true,
            pagination: false
            }).mount()
    }
    
}

$('#textoABuscar').keyup( busqueda );

$('#submitBusqueda').click(busqueda);

//JSON en el footer
$("#footer").append(config_json.copyRight);

//JSON en el header
$("#logo").append(config_json.sitio[0] + '<span>' + config_json.sitio[1] + '</span>' + ' ' + config_json.sitio[2] )
$("#saludo").append(config_json.saludo + ', ' + perfilJson.nombre)
$("#home").append(config_json.home);

//Carrusel

document.addEventListener( 'DOMContentLoaded', function () {
    new Splide( '.splide' , {
        type    : 'loop',
        perPage : 5,
        rewind: true,
        clone: false,
        autoplay: true,
    }).mount();
} );



    
