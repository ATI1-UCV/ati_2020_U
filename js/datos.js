$("#lenguaje").change( function(){ 
    //obteniendo el url
    let url;
    let len = $("#lenguaje").val();
    console.log(len);

    if(len == "es"){
        url = "http://"+ window.location.host + "/conf/configES.json";

    }else if(len == "en"){
        url = "http://"+ window.location.host + "/conf/configEN.json";

    }else if(len == "pt"){
        url = "http://"+ window.location.host + "/conf/configPT.json";

    }else{
        return
    }
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
        console.log(data.sitio);
        llenadoDatos(data);

    })
    .catch(function(err) {
        console.error(err);
    });
})

function llenadoDatos(config){

    //Llenado de datos
    var config_json = JSON.parse(JSON.stringify(config));
    
    //JSON en la tabla
    $("#logo").empty();
    $("#logo").append((config_json['sitio'])[0] + '<span>' + (config_json['sitio'])[1] + '</span>'+ (config_json['sitio'])[2]);

    $("#saludoSinNombre").empty();
    $("#saludoSinNombre").append(config_json['saludo']);

    $("#home").empty();
    $("#home").append(config_json['home']);

    $("#color").empty();
    $("#color").append(config_json['color']);

    $("#libro").empty();
    $("#libro").append(config_json['libro']);

    $("#home").empty();
    $("#home").append(config_json['video_juego']);

    $("#lenguajes").empty();
    $("#lenguajes").append(config_json['lenguajes']);

    //JSON en el footer
    $("#footer").empty();
    $("#footer").append(config_json['copyRight']);



}


