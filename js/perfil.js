const logo = document.querySelector('.logo')
const saludo = document.querySelector('#saludo')
const busqueda = document.querySelector('.busqueda a')
const footer = document.querySelector('.footer')
const tabla = document.querySelectorAll('#tabla-perfil tr')
const selectLenguaje = document.querySelector('.lenguaje')
const contactoPerfil = document.querySelector('#contacto-perfil')
const msjEmail = document.querySelector('#contacto-perfil');
const correo = document.querySelector('#contacto-perfil a')


selectLenguaje.addEventListener('change', cambiarLenguaje)
        async function cambiarLenguaje(event){
            const len = event.target.value

            if(len === 'EN' || len === 'ES' || len === 'PT'){
                //se busca el json correspondiente
                let response = await fetch(`../conf/config${len}.json`)
                let configLen = await response.json()

				let sitio = configLen['sitio']
				let tablaConfig = [configLen['color'],configLen['libro'],configLen['musica'],configLen['video_juego'],configLen['lenguajes']] 

				let textContacto = `<a href="mailto:${correo.innerText}">${correo.innerText}</a>`
				textContacto = configLen['email'].replace('[email]', textContacto)

				for(let id = 0; id < tabla.length; id++){
					if(id ===  tabla.length-1){
						tabla[id].firstElementChild.innerHTML = `<strong>${tablaConfig[id]}:</strong>`
					} else{
						tabla[id].firstElementChild.innerText = `${tablaConfig[id]}:`
					}
				}

                //se llena la pag
				logo.innerHTML = `${sitio[0]}<small>${sitio[1]}</small> ${sitio[2]}`
                saludo.innerText  = configLen['saludo']
				busqueda.innerText = configLen['home']
				msjEmail.innerHTML = textContacto
                footer.innerText = configLen['copyRight']
            }
            
        }

