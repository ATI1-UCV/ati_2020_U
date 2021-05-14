$(document).ready(function(){
	setHeader()
	setInformacion()
	setTabla()
});


function setHeader(){
	let misElementos = $('nav ul li')
	misElementos[0].innerHTML=config.sitio[0]+'<small>'+config.sitio[1]+'</small>'+config.sitio[2]
	misElementos[1].innerHTML=config.saludo+','+perfil.nombre
	$('nav ul li a').html(config.home)
}

function setInformacion() {
	$('h1').html(perfil.nombre)
	$('.container-info > p').html(perfil.descripcion)
	let myEmail=config.email
	myEmail=myEmail.replace('[email]',`<a href="mailto:${perfil.email}">${perfil.email}</a>`)
	$('.container-info > p')[1].innerHTML=myEmail
	$('footer').html(config.copyRight)
	$('img').attr("src",perfil.imagen)
}

function setTabla() {
	let misElementos =$('tbody tr td')
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


