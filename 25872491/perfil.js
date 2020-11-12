const title = document.querySelector('title')
const logo = document.querySelector('.logo')
const saludo = document.querySelector('.saludo')
const busqueda = document.querySelector('.busqueda')
const nombrePerfil = document.querySelector('#nombre-perfil')
const descPerfil = document.querySelector('#desc-perfil')
const tablaPerfil = document.querySelector('#tabla-perfil')
const contactoPerfil = document.querySelector('#contacto-perfil')
const footer = document.querySelector('footer')
const imagenPerfil = document.querySelector('#img-perfil')

let infoTabla = [
	[config.color,perfil.color],
	[config.libro,perfil.libro],
	[config.musica,perfil.musica],
	[config.video_juego,perfil.video_juego],
	[config.lenguajes,perfil.lenguajes]
]


// cambios en perfil.html
title.innerText = perfil.nombre
// header
let sitio = config.sitio
logo.innerHTML = `${sitio[0]}<small>${sitio[1]}</small> ${sitio[2]}`

busqueda.innerText = config.home
saludo.innerText = `${config.saludo}, ${perfil.nombre}`

// section-perfil
// src="25872491.PNG" alt="Katherin Mozo"
imagenPerfil.setAttribute("src",perfil.imagen)
imagenPerfil.setAttribute("alt",perfil.nombre) 
nombrePerfil.innerText = perfil.nombre
descPerfil.innerHTML = `<em>${perfil.descripcion}</em>`

let tamTabla = 5
for (let i = 0; i < tamTabla; i++) {
	const nuevoTR = document.createElement('tr')
	if(i === tamTabla-1){
		nuevoTR.innerHTML=`	<td><strong>${infoTabla[i][0]}</strong></td>
							<td><strong>${infoTabla[i][1]}</strong></td>`
		tablaPerfil.appendChild(nuevoTR)
		break
	}
	nuevoTR.innerHTML=`	<td>${infoTabla[i][0]}</td>
						<td>${infoTabla[i][1]}</td>`
	tablaPerfil.appendChild(nuevoTR)	
}

let textContacto = `<a href="mailto:${perfil.email}">${perfil.email}</a>`
textContacto = config.email.replace('[email]', textContacto)
contactoPerfil.innerHTML = textContacto


footer.innerText = config.copyRight