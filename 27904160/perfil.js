function setHeader(){
	let misElementos =document.querySelectorAll('nav ul li')
	misElementos[0].innerHTML=config.sitio[0]+'<small>'+config.sitio[1]+'</small>'+config.sitio[2]
	misElementos[1].innerHTML=config.saludo+','+perfil.nombre
	misElementos[2].getElementsByTagName('a')[0].innerHTML=config.home
}

function setInformacion() {
	document.getElementsByTagName('h1')[0].innerHTML=perfil.nombre
	document.querySelectorAll('.container-info > p')[0].innerHTML=perfil.descripcion
	let myEmail=config.email
	myEmail=myEmail.replace('[email]',`<a href="mailto:${perfil.email}">${perfil.email}</a>`)
	console.log(myEmail)
	document.querySelectorAll('.container-info > p')[1].innerHTML=myEmail
	document.getElementsByTagName('footer')[0].innerHTML=config.copyRight
	document.getElementsByTagName('img')[0].src=perfil.imagen

}

function setTabla() {
	let misElementos =document.querySelectorAll('tbody tr td')
	misElementos[0].innerHTML=config.color
	misElementos[1].innerHTML=perfil.color
	misElementos[2].innerHTML=config.libro
	misElementos[3].innerHTML=perfil.libro
	misElementos[4].innerHTML=config.musica
	misElementos[5].innerHTML=perfil.musica
	misElementos[6].innerHTML=config.video_juego
	misElementos[7].innerHTML=perfil.video_juego
	misElementos[8].innerHTML=config.lenguajes
	misElementos[9].innerHTML=perfil.lenguajes
}



setHeader()
setInformacion()
setTabla()