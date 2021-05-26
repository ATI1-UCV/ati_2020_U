/*fetch('./perfil.php',{
	method: 'POST',
headers:{
	'Content-Type':'application/json',
},
body:JSON.stringify({len:'es'}),
})
.then(()=>console.log('ok'))
.catch((er)=>console.log(er))

const data = new FormData()
data.append('len','es')
fetch('./perfil.php',{
	method:'POST',
	body:data
})
.then((res)=>res.json())
.then((res)=>{
console.log(res)})
*/
/*
//Variables y selectores
const title = $('title')
const logo = $('.logo')
const saludo = $('.saludo')
const busqueda = $('.busqueda')
const nombrePerfil = $('#nombre-perfil')
const imagenPerfil = $('#img-perfil')
const descPerfil = $('#desc-perfil')
const tablaPerfil = $('#tabla-perfil')
const contactoPerfil = $('#contacto-perfil')
const footer = $('.footer')

let fetchData = { 
	method: 'POST',
	body: {len:'es'},
	headers: new Headers()
}

fetch('../25872491/perfil.php', fetchData)

let infoTabla = [
	[config.color,perfil.color],
	[config.libro,perfil.libro],
	[config.musica,perfil.musica],
	[config.video_juego,perfil.video_juego],
	[config.lenguajes,perfil.lenguajes]
]

// cambios en perfil.html
title.text(perfil.nombre)

// header
let sitio = config.sitio
console.log(sitio)
logo.html(`${sitio[0]}<small>${sitio[1]}</small> ${sitio[2]}`)

busqueda.text(config.home)
saludo.text(`${config.saludo}, ${perfil.nombre}`)


// section-perfil
// src="25872491.PNG" alt="Katherin Mozo"
imagenPerfil.attr("src",perfil.imagen)
imagenPerfil.attr("alt",perfil.nombre)
nombrePerfil.text(perfil.nombre)
descPerfil.html(`<em>${perfil.descripcion}</em>`)

let tamTabla = 5
for (let i = 0; i < tamTabla; i++) {
		if(i !== tamTabla-1){
			tablaPerfil.append(`<tr>
				<td>${infoTabla[i][0]}</td>
				<td>${infoTabla[i][1]}</td>
			</tr>`)	
		}else{
			tablaPerfil.append(`<tr>
				<td><strong>${infoTabla[i][0]}</strong></td>
				<td><strong>${infoTabla[i][1]}</strong></td>
			</tr>`)
		}		
}
	
let textContacto = `<a href="mailto:${perfil.email}">${perfil.email}</a>`
textContacto = config.email.replace('[email]', textContacto)
contactoPerfil.html(textContacto)

footer.text(config.copyRight)
*/
