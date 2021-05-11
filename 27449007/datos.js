//Llenado de datos
var config_json = JSON.parse(JSON.stringify(config));
var perfil_json = JSON.parse(JSON.stringify(perfil));
//JSON en la tabla
$("#table").append('<tr>' + 
'<td colspan="2" class="aligned" id="name">' + perfil_json.nombre + '</td>'+'</tr>');

$("#table").append('<tr>' + 
'<td colspan="2" class="aligned" id="description">' + perfil_json.descripcion + '</td>'+'</tr>');

$("#table").append('<tr>' + 
'<td class="aligned">' + config_json.color + '</td>'+
'<td class="aligned">' + perfil_json.color + '</td>'+'</tr>');

$("#table").append('<tr>' + 
'<td class="aligned">' + config_json.libro + '</td>'+
'<td class="aligned">' + perfil_json.libro + '</td>'+'</tr>');

$("#table").append('<tr>' + 
'<td class="aligned">' + config_json.musica + '</td>'+
'<td class="aligned">' + perfil_json.musica+ '</td>'+'</tr>');

$("#table").append('<tr>' + 
'<td class="aligned">' + config_json.video_juego + '</td>'+
'<td class="aligned">' + perfil_json.video_juego + '</td>'+'</tr>');

$("#table").append('<tr>' + 
'<td class="aligned lp">' + config_json.lenguajes + '</td>'+
'<td class="aligned lp">' + perfil_json.lenguajes + '</td>'+'</tr>');

$("#table").append('<tr>' + 
'<td colspan="2" class="aligned">' + (config_json.email).replace('[email]','') + '<a href="https://www.aaronmorillo7@gmail.com" id="email">' + perfil_json.email +'</a>' + '</td>'+ '</tr>');

//JSON en el footer
$("#footer").append(config_json.copyRight);
//JSON en la imagen

$("#photo").attr('src', perfil_json.imagen);
//JSON en el header

$("#logo").append(config_json.sitio[0] + '<span>' + config_json.sitio[1] + '</span>' + ' ' +config_json.sitio[2] )
$("#saludo").append(config_json.saludo + ', ' + perfil_json.nombre)
$("#home").append(config_json.home)