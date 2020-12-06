window.onload = function() {
    //config
    // variables
    const logo = document.querySelector('.logo')
    const saludo = document.querySelector('.saludo')
    const busqueda = document.querySelector('.busqueda').firstChild
    const footer = document.querySelector('footer')
    const sectionListado = document.querySelector('section')
    const input = document.querySelector('#nombreBusqueda');
    const form = document.querySelector('form')
    const titulo = document.querySelector('title')
    
   
    //cambios ATI[UCV] 2020-U
    titulo.innerText = `${config.sitio[0]}${config.sitio[1]} ${config.sitio[2]}`
    //internacionalizacion
    logo.innerHTML = `${config.sitio[0]}<small>${config.sitio[1]}</small> ${config.sitio[2]}`
    saludo.innerText = `${config.saludo}, Katherin Mozo`
    busqueda.nextElementSibling[0].setAttribute("placeholder", config.nombre)
    busqueda.nextElementSibling[1].setAttribute("value", config.buscar)
    footer.innerText = config.copyRight

    //listado de estudiantes
    for(let i=0; i < listado.length; i++){
        const nuevoUL = document.createElement('ul')
            nuevoUL.innerHTML = `
                <li>
                    <img src="${listado[i].imagen}" alt="${listado[i].nombre}">
                    <a href="./${listado[i].ci}/perfil.html">${listado[i].nombre}</a>
                </li>`
            sectionListado.appendChild(nuevoUL)
    }
    
    
    
    //busqueda 
    form.addEventListener('submit',(e)=>{
        e.preventDefault()
    })

    input.addEventListener('keyup', busquedaNombre)
    function busquedaNombre(){
        const entrada = this.value

        sectionListado.innerHTML = '';
        for(let i=0; i < listado.length; i++){
            if(listado[i].nombre.toUpperCase().includes(entrada.toUpperCase())){
                const nuevoUL = document.createElement('ul')
                nuevoUL.innerHTML = `
                    <li>
                        <img src="${listado[i].imagen}" alt="${listado[i].nombre}">
                        <a href="./${listado[i].ci}/perfil.html">${listado[i].nombre}</a>
                    </li>`
                sectionListado.appendChild(nuevoUL)
            }
        }
        if(sectionListado.innerHTML === ''){
            let textMensaje = `<p>${config.mensajeBusqueda}</p>`
            sectionListado.innerHTML = textMensaje.replace('[query]', entrada)
        }
        
    };
    

}