 document.addEventListener("DOMContentLoaded", function(event) {
 	console.log("Hola")
    setListado()
    document.getElementById('input_buscar').addEventListener('keyup',filtrarLista)
    document.getElementById('formulario').addEventListener('submit',(e)=>{e.preventDefault()})
  });
listado = []
async function setListado(){
	let htmlListado	=""
	let response 	= await fetch('datos/index.json')
	listado 		= await response.json()
	listado.forEach(reg=>{
		htmlListado=htmlListado+`
		 	<li>
				<a href="/perfil.php?ci=${reg.ci}">
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
	let text=document.getElementById('input_buscar').value.toString().toLowerCase()
	listado.forEach(reg=>{
		if(reg.nombre.toString().toLowerCase().includes(text) || reg.ci.toString().toLowerCase().includes(text)){		
			htmlListado=htmlListado+`
			 	<li>
					<a href="/perfil.php?ci=${reg.ci}">
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