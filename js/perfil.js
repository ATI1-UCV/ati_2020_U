$(document).ready(function(){


	$('#lenguaje').change(cambioLenguaje)

	console.log("Test")
	//setHeader()
	//setInformacion()
	//setTabla()
});

var config = {}

async function cambioLenguaje(e){
	let lenguaje = e.target.value
	let response = await fetch('/getLanguage.php?len='+lenguaje)
	let data 	 = await response.json()
	config = data
	setHeader()
	setTabla()
}

function setHeader(){
	let misElementos = $('nav ul li')
	misElementos[0].innerHTML=config.sitio[0]+'<small>'+config.sitio[1]+'</small>'+config.sitio[2]
	$('.saludo span').html(config.saludo)
	$('nav ul li a').html(config.home)
	$('nav ul li input').attr('placeholder',config.buscar)
	$('nav ul li #buscar').attr('value',config.buscar)
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
	if(misElementos.lenght>0){	
		misElementos[0].innerHTML=config.color
		misElementos[2].innerHTML=config.libro
		misElementos[4].innerHTML=config.musica
		misElementos[6].innerHTML=config.video_juego
		misElementos[8].innerHTML=config.lenguajes
	}
}

