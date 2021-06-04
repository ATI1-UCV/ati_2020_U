var buscador = document.getElementsByClassName("buscador")[0]
var nombre = buscador.getElementsByTagName("input")[0]//Nombre . . .
var buscar = buscador.getElementsByTagName("input")[1]//Buscar

var color = document.getElementsByClassName("Tcolor")[0]
var Tcolor = document.getElementsByClassName("Tcolor")[1]
var libro = document.getElementsByClassName("Tlibro")[0]
var Tlibro = document.getElementsByClassName("Tlibro")[1]
var musica = document.getElementsByClassName("Tmusica")[0]
var Tmusica = document.getElementsByClassName("Tmusica")[1]
var video_juego = document.getElementsByClassName("Tvideo_juego")[0]
var Tvideo_juego = document.getElementsByClassName("Tvideo_juego")[1]
var lenguaje = document.getElementsByClassName("Tlenguajes")[0]
var Tlenguaje = document.getElementsByClassName("Tlenguajes")[1]
var email = document.getElementsByClassName("Temail")[0]
var Temail = document.getElementsByClassName("Temail")[1]
var nombre_perfil = document.getElementById("texto1")
var descripcion_perfil = document.getElementById("texto2")
var lista_perfiles = document.getElementsByClassName("ListaPerfiles")[0]
// nombre = texto
// buscar = boton

var cont_perfil = document.getElementsByClassName("cont_perfil")[0]

async function Display_perfil(ci){

    let imagen = document.getElementsByClassName("imagen")[0]
    let url_imagen;
    for (let elemento of listado) {
        if(elemento.ci == ci){
            url_imagen = elemento.imagen;
            console.log("lo encontre")
            console.log(url_imagen)
        }
    }
    imagen.setAttribute("src",url_imagen)
    cont_perfil.style.display = "block"
    console.log("Me llamaron")
    let data = await fetch("getDatos.php/?ci="+ci)
    let perfil = await data.json()
    console.log("Perfil: ")
    console.log(perfil)

    nombre_perfil.innerText = perfil["nombre"]
    descripcion_perfil.innerText = perfil["descripcion"]
    Tcolor.innerText = perfil["color"]
    Tlibro.innerText = perfil["libro"]
    Tmusica.innerText = perfil["musica"]
    if(typeof(perfil["video_juego"]) == "string" ){
        Tvideo_juego.innerText = perfil["video_juego"]
    }else{
        let lenguajes_texto=""
        for (let i of perfil["video_juego"]){
            lenguajes_texto += i+"\n"
        }
        Tvideo_juego.innerText = perfil["video_juego"]
    }   
    if(typeof(perfil["lenguajes"]) == "string"){
        Tlenguaje.innerText = perfil["lenguajes"]
        console.log(perfil["lenguajes"])
    }else{
        lista = ""
        for(let i of perfil["lenguajes"]){
            lista += i + " "
        }
        Tlenguaje.innerText = lista
    }
    
    Temail.innerText = perfil["email"]
}

function filtrar() {
    //console.log(nombre.value)
    lista_perfiles.innerHTML=''
    let texto_b = nombre.value.toLowerCase()
    for (let elemento of listado) {
        let nombre = elemento.nombre.toLowerCase()
        if (nombre.indexOf(texto_b) !== -1) {
            lista_perfiles.innerHTML += `
            <div class="perfil">
                <a class="link_perfil" href="#" onclick=Display_perfil(${elemento.ci})>
                    <img class="imagen_perfil" src="${elemento.imagen}" height="50" width="40">
                    <p>${elemento.nombre}</p>
                </a>
            </div>
            `
        }
    }
    if(lista_perfiles.innerHTML===''){
        lista_perfiles.innerHTML=`
        <li class="error"><p>${config.error}</p> ${texto_b}</li>
        `
    }
}
filtrar()
buscar.addEventListener('click',filtrar)
nombre.addEventListener('keyup',filtrar)