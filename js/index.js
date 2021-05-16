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
    if (el.type === "text") {
      el.placeholder = transStr;
    }

    if (el.type === "button") {
      el.value = transStr
    }

  } else {
    el.innerHTML = transStr;
  }
}
function traducir(traducirStr, type) {
  // config and perfil are variables that come from config.json and perfil.json respectively
  traducirElementos = document.getElementsByClassName(traducirStr);
  for (const el of traducirElementos) {
    // Select JsonKey
    const jsonKey = el.dataset.jsonKey;
    if (type === "config") {
      renderInner(el, config[jsonKey]);
    }
  }
}

document.addEventListener("DOMContentLoaded", () => {
  // Select elements to translate
  traducir("traducir-config", "config");

  document.getElementById("especial-logo").innerHTML = `${config.sitio[0]} <small>${config.sitio[1]}</small> ${config.sitio[2]}`;
});
