var saludo = document.getElementsByClassName('saludo')[0]//hola
var copyright = document.getElementsByTagName("footer")[0]//copyright
var logo = document.getElementsByClassName("logo")[0]//Logo
var titulo = document.getElementsByTagName("title")[0]//Title
var buscador = document.getElementsByClassName("buscador")[0]
var nombre = buscador.getElementsByTagName("input")[0]//Nombre . . .
var buscar = buscador.getElementsByTagName("input")[1]//Buscar
var lista_perfiles = document.getElementsByClassName("Lista de perfiles")[0]
let config_error;
var valor_sesion = document.getElementById("sesion_nombre").value;
var valor_cont = document.getElementById("sesion_cont").value;
let global_idioma = document.getElementById("sesion_idioma").value;
// console.log(document.getElementById("sesion_nombre"))
async function buscarListado(){
    path="../datos/index.json"
    const url = path;
    const resultado = await fetch(url);
    const data = await resultado.json();
    return data
}

async function filtrar() {
    lista_perfiles.innerHTML=''
    let texto_b = nombre.value.toLowerCase()
    let listado = await buscarListado() 
    for (let elemento of listado) {
        let nombre = elemento.nombre.toLowerCase()
        if (nombre.indexOf(texto_b) !== -1) {
            lista_perfiles.innerHTML += `
                <li class="perfil">
                    <a href="/perfil.php/?ci=${elemento.ci}&len=${global_idioma}">
                        <img class="imagen_perfil" src="${elemento.imagen}" height="50" width="40">
                        <p id="texto5">${elemento.nombre}</p>
                    </a>
                </li>
            `
        }
    }
    if(lista_perfiles.innerHTML===''){
        lista_perfiles.innerHTML=`
        <li>${config_error} ${texto_b}</li>
        `
    }
}

async function idioma(lenguaje){
    console.log("lenguaje a buscar:")
    console.log(lenguaje)
    console.log("path del idioma: ")
    let path
    if(lenguaje == "es"){   
        path="../conf/configES.json"
        console.log(path)
    }else if(lenguaje == "en"){
        path="../conf/configEN.json"
        console.log(path)
    }else if(lenguaje == "pt"){
        path="../conf/configPT.json"
        console.log(path)
    }
    const url = path;
    const resultado = await fetch(url);
    const data = await resultado.json();
    console.log("data encontrada: ")
    console.log(data)
    return data
}

async function idiomaEs(){
    global_idioma = "es"
    let config = await idioma("es"); 
    console.log(config)
    saludo.innerText = config["saludo"] + ", " + valor_sesion + "(visitas"+valor_cont+")"
    copyright.innerText = config["copyRight"]
    config_error = config["error"]
    logo.innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2]
    titulo.innerText = config.sitio[0] + config.sitio[1] + " " + config.sitio[2] 
    nombre.setAttribute("placeholder",config["nombre"]+" . "+". "+".")
    buscar.setAttribute("value",config["buscar"])
}
async function idiomaEn(){
    console.log("idioma ingles")
    global_idioma = "en"
    let config = await idioma("en");
    console.log(config)
    saludo.innerText = config["saludo"] + ", " + valor_sesion + "(visitas"+valor_cont+")"
    copyright.innerText = config["copyRight"]
    config_error = config["error"]
    logo.innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2]
    titulo.innerText = config.sitio[0] + config.sitio[1] + " " + config.sitio[2] 
    nombre.setAttribute("placeholder",config["nombre"]+" . "+". "+".")
    buscar.setAttribute("value",config["buscar"])
}
async function idiomaPt(){
    console.log("idioma portu")
    global_idioma = "pt"
    let config = await idioma("pt");
    console.log(config)
    saludo.innerText = config["saludo"] + ", " + valor_sesion + "(visitas"+valor_cont+")"
    copyright.innerText = config["copyRight"]
    config_error = config["error"]
    logo.innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2]
    titulo.innerText = config.sitio[0] + config.sitio[1] + " " + config.sitio[2] 
    nombre.setAttribute("placeholder",config["nombre"]+" . "+". "+".")
    buscar.setAttribute("value",config["buscar"])
}

espanol = document.getElementById("español")
ingles = document.getElementById("ingles")
portugues = document.getElementById("portugues")

español.addEventListener("click",idiomaEs)
ingles.addEventListener("click",idiomaEn)
portugues.addEventListener("click",idiomaPt)

filtrar()
buscar.addEventListener('click',filtrar)
idiomaEs()
