function load() {
	let Titulo=document.getElementById('nombredelsitio');
	Titulo.innerHTML=config.sitio[0]+'<small>'+config.sitio[1]+'</small>'+config.sitio[2];
	let ImprimirSaludo=document.getElementById('saludar');
	ImprimirSaludo.textContent=config.saludo+', '+perfil.nombre;
	let TextoInicio=document.getElementById('inicio');
	TextoInicio.textContent=config.home;
	let CargarFoto=document.getElementById('foto');
	CargarFoto.innerHTML='<img src='+'"'+perfil.imagen+'"'+'alt="foto de Johan" >';
	let ImprimirNombre= document.getElementById('name');
	ImprimirNombre.textContent ='Mi nombre es'+' '+perfil.nombre;
	let ImprimirDescripcion=document.getElementById('italic');
	ImprimirDescripcion.textContent=perfil.descripcion;
	let ImprimirColor=document.getElementById('color');
	ImprimirColor.textContent=config.color+': '+perfil.color;
	let ImprimirLibro=document.getElementById('libro');
	ImprimirLibro.textContent=config.libro+': '+perfil.libro;
	let ImprimirMusica=document.getElementById('musica');
	ImprimirMusica.textContent=config.musica+': '+perfil.musica;
	let ImprimirVideojuego=document.getElementById('videojuego');
	ImprimirVideojuego.textContent=config.video_juego+': '+perfil.video_juego;
	let ImprimirLenguajes=document.getElementById('bold');
	ImprimirLenguajes.textContent=config.lenguajes+': '+perfil.lenguajes[0]+', '+perfil.lenguajes[1]+', '+perfil.lenguajes[2]+'.';
	let ImprimirCorreo=document.getElementById('correo');
	ImprimirCorreo.innerHTML=config.email+':'+'<a href="mailto:'+perfil.email+'">'+perfil.email+'</a>';
	let ImprimirPie=document.getElementById('pie');
	ImprimirPie.textContent=config.copyRight;
}