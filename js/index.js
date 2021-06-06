function change_data(config) {


	$("#logo").html(config.sitio[0]+"<small>"+config.sitio[1]+"</small>"+config.sitio[2]) 
	$("#saludo").html(config.saludo+", "+config.nombre)
	$("#buscar").html(config.buscar)


	$("footer").html(config.copyRight)
}

async function fetch_data(url) {
	const response = await fetch(url);
	const data = await response.json();
	
	await change_data(data);
}

function change_info(info){
	info = JSON.parse(info)
	$("#nombre_perfil").html("<h5>Nombre Favorito: </h5>"+ info.nombre )
	$("#descripcion_perfil").html("<h5>Descripcion: </h5>"+ info.descripcion )
	$("#color_perfil").html("<h5>Color Favorito: </h5>"+ info.color )
	$("#libro_perfil").html("<h5>Libro Favorito: </h5>"+ info.libro )
	$("#musica_perfil").html("<h5>Musica Favorito: </h5>"+ info.musica )
	$("#video_perfil").html("<h5>Videojuegos preferidos: </h5>"+ info.video_juego)
	$("#lenguajes_perfil").html("<h5>Lenguajes preferidos: </h5>"+ info.lenguajes )
	$("#email_perfil").html("<h5>Email: </h5>"+ info.email)
}

function get_info(){

	let urlParams = new URLSearchParams(window.location.search);
	let ci_param = urlParams.get('ci');


	if (ci_param == null) {
		console.log("Ci param is null");
		return;
	}

	$.ajax({
		type: 'POST',
		url: 'getDatos.php/?ci='+ci_param,
		data: { functionName: 'get_datos' },

		success: function (data) {
				if (data == "") {
					console.log("NULL");
				}else{
					change_info(data);
				}
		}
	});
}

$( document ).ready(function() {
	console.log("DONE LOADING index");

	$('#carouselID').carousel('next')

	$("#lenDrop").change(function () {
		let len = this.value;
		let url = "conf/config"+len+".json";

		fetch_data(url);
	})

	$("img").click(function(){
		get_info();
	})
	
	$('#carouselID').on('slide.bs.carousel', function onSlide (ev) {
		let urlParams = new URL(window.location)
		urlParams.searchParams.set('ci',ev.relatedTarget.children[0].id)
		let newParams = urlParams.searchParams.toString() 

		//console.log(urlParams);
		//console.log(newParams);
		//console.log(window.location.search);

		//window.history.pushState({path:newParams}, '', newParams)
		window.history.replaceState(null,null,"?"+newParams)

		get_info()
	})
});