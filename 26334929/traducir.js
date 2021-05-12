function renderInner(el, translated){
  let transStr = ''
  if(typeof translated === 'object'){
    // Render array of strings
    transStr = translated.join(', ');
  }else{
    // Render normal string
    transStr = translated
  }
  $(el).html(transStr);
}

function traducir(traducirStr, type){
  // config and perfil are variables that come from config.json and perfil.json respectively
  $(traducirStr).each(function (){

    const jsonKey = this.dataset.jsonKey;

    if(type === "config"){
      renderInner(this, config[jsonKey]);
    } 

    if(type === "perfil"){
      renderInner(this, perfil[jsonKey]);
    }

  });
}

$(document).ready(()=>{
  // Select elements to translate
  traducir(".traducir-config", "config");
  traducir(".traducir-perfil", "perfil");

  // Special elements
  // This could have been done in a more atomic way 
  // Having sitio-nombre = ATI, sitio-uni=UCV and so on

  $("#especial-logo").html(`${config.sitio[0]} <small>${config.sitio[1]}</small> ${config.sitio[2]}`);

});
