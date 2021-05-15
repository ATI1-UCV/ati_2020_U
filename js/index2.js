var saludo = document.getElementsByClassName('saludo')[0]//hola
var copyright = document.getElementsByTagName("footer")[0]//copyright
var logo = document.getElementsByClassName("logo")[0]//Logo
var titulo = document.getElementsByTagName("title")[0]//Title
var buscador = document.getElementsByClassName("buscador")[0]
var nombre = buscador.getElementsByTagName("input")[0]//Nombre . . .
var buscar = buscador.getElementsByTagName("input")[1]//Buscar

saludo.innerText = config["saludo"]
copyright.innerText = config["copyRight"]
logo.innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2]
titulo.innerText = config.sitio[0] + config.sitio[1] + " " + config.sitio[2] 
nombre.setAttribute("placeholder",config["nombre"]+" . "+". "+".")
buscar.setAttribute("value",config["buscar"])

/*<li class="perfil">
					<img class="imagen_perfil" src="./25641651/25641651.jpg" height="50" width="40">
					<p>Eduardo Suarez</p>
                </li>*/
//en teoria yo deberia de iterar por index.json
var lista_perfiles = document.getElementsByClassName("ListaPerfiles")[0]
// nombre = texto
// buscar = boton
function filtrar() {
    //console.log(nombre.value)
    lista_perfiles.innerHTML=''
    let texto_b = nombre.value.toLowerCase()
    for (let elemento of listado) {
        let nombre = elemento.nombre.toLowerCase()
        if (nombre.indexOf(texto_b) !== -1) {
            lista_perfiles.innerHTML += `
            <div class="perfil">
                <img class="imagen_perfil" src="${elemento.imagen}" height="50" width="40">
                <p>${elemento.nombre}</p>
            </div>
            `
        }
    }
    if(lista_perfiles.innerHTML===''){
        lista_perfiles.innerHTML=`
        <li>${config.error} ${texto_b}</li>
        `
    }
}
filtrar()
buscar.addEventListener('click',filtrar)
nombre.addEventListener('keyup',filtrar)