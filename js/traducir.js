function renderInner(el, translated) {
  let transStr = ''
  if (typeof translated === 'object') {
    // Render array of strings
    transStr = translated.join(', ');
  } else {
    // Render normal string
    transStr = translated
  }

  if (el instanceof HTMLInputElement) {
    if (el.type === "text" || el.type === "search") {
      el.placeholder = transStr;
    }

    if (el.type === "button") {
      el.value = transStr
    }

  } else {
    el.innerHTML = transStr;
  }
}

function traducir(traducirStr, type, config) {
  // config and perfil are variables that come from config.json and perfil.json respectively
  traducirElementos = document.getElementsByClassName(traducirStr);
  for (const el of traducirElementos) {
    // Select JsonKey
    const jsonKey = el.dataset.jsonKey;
    if (type === "config") {
      renderInner(el, config[jsonKey]);
    }else if(type === "perfil"){
      const replacement = config[jsonKey].replace("[email]", el.dataset.replace);
      renderInner(el, replacement);
    } 

  }
}

document.addEventListener("DOMContentLoaded", async () => {
  const config_dir = "/conf/";
  const config_prefix = "config";
  const config_file_type = ".json";
  const configs = {
    es: `${config_dir}${config_prefix}ES${config_file_type}`,
    en: `${config_dir}${config_prefix}EN${config_file_type}`,
    pt: `${config_dir}${config_prefix}PT${config_file_type}`
  }

  // Select language
  const select = document.getElementById("select-lang");
  select.addEventListener("input", async ()=>{
    try{
      const config_file = configs[select.value];
      const config_response = await fetch(config_file);
      const config = await config_response.json();
      traducir("traducir-config", "config", config);
      traducir("traducir-perfil", "perfil", config);
    }catch(error){
      console.error(error);
    }
  });
});
