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

$( document ).ready(function() {
	console.log("DONE LOADING index");

	$("#lenDrop").change(function () {
		let len = this.value;
		let url = "conf/config"+len+".json";

		fetch_data(url);
	})
});