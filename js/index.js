
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
        console.log('response =', response);
        return response.json();
    })
    .then(function(data) {
        console.log('data = ', data);
        busqueda(data);
    })
    .catch(function(err) {
        console.error(err);
    });

}
//Busqueda

$("#submitBusqueda").on("click",function(event){
    event.preventDefault();
 });



function busqueda(listado){
    var listadoEstudiantes =JSON.parse(JSON.stringify(listado));
    console.log(listadoEstudiantes)
    $('#listado li, #listado h3').remove()
    $('#informacion li').remove()
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
                //usando fetch 
                var url = "http://"+ window.location.host + "/" + estudiante.ci + "/" + "perfil.json";
                fetch(url, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(function(response) {
                    console.log('response =', response);
                    return response.json();
                })
                .then(function(data) {
                    console.log('data = ', data);
                    var perfil = JSON.parse(JSON.stringify(data));
                    var url = '';

                    if($("#lenguaje").val() == 'en'){
                        url = "http://"+ window.location.host + "/conf/configEN.json";
                    }else if($("#lenguaje").val() == 'pt'){
                        url = "http://"+ window.location.host + "/conf/configPT.json";
                    }else{
                        url = "http://"+ window.location.host + "/conf/configES.json";
                    }
                    fetch(url, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(function(response) {
                        console.log('response =', response);
                        return response.json();
                    })
                    .then(function(data) {
                        console.log('data = ', data);
                        var config = JSON.parse(JSON.stringify(data));
                        $('#informacion').append('<li class="list-group-item">'+ 
                            '<table class="table">'+
                                '<tr>'+
                                    '<td>'+ config.nombre +'</td><td>'+ perfil.nombre +'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td colspawn="2">'+ perfil.descripcion +'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>'+ config.color +'</td><td>'+ perfil.color +'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>'+ config.libro +'</td><td>'+ perfil.libro +'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>'+ config.video_juego +'</td><td>'+ perfil.video_juego +'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>'+ config.lenguajes +'</td><td>'+ perfil.lenguajes +'</td>'
                                +'</tr>'
                            +'</table>'
                        +'</li>')
                    })
                    .catch(function(err) {
                        console.error(err);
                    });
                })
                .catch(function(err) {
                    console.error(err);
                });
                $('#listado').append('<li class="image splide__slide"><img src="'+ estudiante.imagen + '"> <p>'+ estudiante.nombre + '</p><p class="cedula">'+ estudiante.ci +'</p></li>');
                
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
