  document.addEventListener("DOMContentLoaded", function(event) {
    setConfig()
    setListado()
    document.getElementsByClassName('busqueda')[0].addEventListener('change',filtrarLista)
    document.getElementById('formulario').addEventListener('submit',(e)=>{e.preventDefault()})
  });

function setConfig(){
	document.title=config.sitio[0]+config.sitio[1]+config.sitio[2]
	document.getElementsByClassName('logo')[0].innerHTML=config.sitio[0]+'<small>'+config.sitio[1]+'</small>'+config.sitio[2]
	document.getElementsByClassName('saludo')[0].innerHTML=config.saludo+" José Hernández"
	document.querySelectorAll('.busqueda input')[0].placeholder=config.nombre
	document.querySelectorAll('.busqueda input')[1].value=config.buscar
	document.getElementsByTagName('footer')[0].innerHTML=config.copyRight
}
function setListado(){
	let htmlListado=""

	listado.forEach(reg=>{
		htmlListado=htmlListado+`
		 	<li>
				<a href="#">
					<img  src="${reg.imagen}">
					<span>${reg.nombre}</span>
				</a>
			</li>
		`
	})
	document.getElementById('listado').innerHTML=htmlListado
}

function filtrarLista(e){
	let htmlListado=""
	let text=e.target.value.toString().toLowerCase()
	listado.forEach(reg=>{
		if(reg.nombre.toString().toLowerCase().includes(text) || reg.ci.toString().toLowerCase().includes(text)){		
			htmlListado=htmlListado+`
			 	<li>
					<a href="#">
						<img  src="${reg.imagen}">
						<span>${reg.nombre}</span>
					</a>
				</li>
			`
		}
	})
	if(htmlListado==""){
		htmlListado="<p id='error-query'>"+ "No hay alumnos que tengan en su nombre "+text+"</p>"
	}
	document.getElementById('listado').innerHTML=htmlListado
}