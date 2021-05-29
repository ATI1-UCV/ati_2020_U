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
        listadoBusqueda.forEach(estudiante => {
            if(estudiante !== undefined){
                $('#listado').append('<li class="image" ><img width="70" height="80" src="'+ estudiante.imagen + '"> <p>'+ estudiante.nombre + '</p></li>');
            }
            
        })
        
    }else {
        $('#listado').removeClass('found')
        $('#listado').addClass('not_found')
        $('#listado').append('<h3> No se han encontrado resultados con: ' + textoABuscar + '</h3>')
        
    }
    
}

busquedaFetch();

$('#textoABuscar').keyup( busquedaFetch );

$('#submitBusqueda').click(busquedaFetch);

