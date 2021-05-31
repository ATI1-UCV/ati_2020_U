let valor_idioma = document.getElementById("sesion_idioma").value;
let valor_nombre = document.getElementById("sesion_nombre").value;
let contador = document.getElementById("sesion_cont").value;
async function idioma(input){
    let path
    if(input == "es"){   
        path="../conf/configES.json"
    }else if(input == "en"){
        path="../conf/configEN.json"
    }else if(input == "pt"){
        path="../conf/configPT.json"
    }
    const url = path;
    const resultado = await fetch(url);
    const data = await resultado.json();
    return data
}
async function idiomaEs(){
    config = await idioma("es");
    console.log(config)
    displayIdioma(config);
}
async function idiomaEn(){
    config = await idioma("en");
    console.log(config)
    displayIdioma(config);
}
async function idiomaPt(){
    config = await idioma("pt");
    console.log(config)
    displayIdioma(config);
}

function displayIdioma(idiomaJson){
    let config = idiomaJson
    $("#inicio").html(config["home"])
    $(".saludo").html(config["nombre"])
    $(".colorC").html(config["color"])
    $(".libroC").html(config["libro"])
    $(".musicaC").html(config["musica"])
    $(".videoJuegoC").html(config["video_juego"])
    $(".lenguajeC").html(config["lenguajes"])
    $("footer").html( config["copyRight"])
    $("#saludo").html(config["saludo"] +" "+valor_nombre+ " valor:(" + contador + ")")
    $(".logo").html(config.sitio[0] + "<strong>" + config.sitio[1] + "</strong>" + config.sitio[2]) 
    $(".comu").text(config["email"]).append(
        $("<a></a>",{ href:"https://mail.google.com/mail/?view=cm&fs=1&to=eduardosuarez.ucv@gmail.com"}).append(
            $("<span></span>",{id:"texto4", text: config["email"]})
        )
    )
}

espanol = document.getElementById("español")
ingles = document.getElementById("ingles")
portugues = document.getElementById("portugues")

español.addEventListener("click",idiomaEs)
ingles.addEventListener("click",idiomaEn)
portugues.addEventListener("click",idiomaPt)

if(valor_idioma == "pt"){
    idiomaPt()
}else if(valor_idioma == "en"){
    idiomaEn()
}else if(valor_idioma == "es"){
    idiomaEs()
}