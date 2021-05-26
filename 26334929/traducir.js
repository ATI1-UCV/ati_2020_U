function renderInner(el, translated){
  let transStr = ''
  if(typeof translated === 'object'){
    // Render array of strings
    transStr = translated.join(', ');
  }else{
    // Render normal string
    transStr = translated
  }
  el.innerHTML = transStr;
}
function traducir(traducirStr, type){
  // config and perfil are variables that come from config.json and perfil.json respectively
  traducirElementos = document.getElementsByClassName(traducirStr);
  for(const el of traducirElementos){
    // Select JsonKey
    const jsonKey = el.dataset.jsonKey;
    if(type === "config"){
      renderInner(el, config[jsonKey]);
    }else if(type === "perfil"){
      renderInner(el, perfil[jsonKey]);
      
    }
  }
}

// Select elements to translate
traducir("traducir-config", "config");
traducir("traducir-perfil", "perfil");

// Special elements
// This could have been done in a more atomic way 
// Having sitio-nombre = ATI, sitio-uni=UCV and so on

document.getElementById("especial-logo").innerHTML = `${config.sitio[0]} <small>${config.sitio[1]}</small> ${config.sitio[2]}`;
