window.onload = function() {
    const logo = document.querySelector('.logo')
    const saludo = document.querySelector('#saludo')
    const busqueda = document.querySelector('.busqueda').firstChild
    const footer = document.querySelector('.footer')
    const sectionListado = document.querySelector('section')
    const input = document.querySelector('#nombreBusqueda');
    const form = document.querySelector('form')
    const titulo = document.querySelector('title')
    const selectLenguaje = document.querySelector('.lenguaje')

    async function index(){
        let response = await fetch('../datos/index.json')
        let listado = await response.json()
       
        
        for(let i=0; i < listado.length; i++){
            const nuevoUL = document.createElement('ul')
                nuevoUL.innerHTML = `
                    <li>
                        <img src="${listado[i].imagen}" alt="${listado[i].nombre}">
                        <a href="/perfil.php?ci=${listado[i].ci}">${listado[i].nombre}</a>
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
                            <a href="/perfil.php?ci=${listado[i].ci}">${listado[i].nombre}</a>
                        </li>`
                    sectionListado.appendChild(nuevoUL)
                }
            }
            if(sectionListado.innerHTML === ''){
                let textMensaje = `<p>No existen estudiantes con el nombre: ${entrada}</p>`
                sectionListado.innerHTML = textMensaje
            }
            
        };


        //Cambio de lenguaje
        selectLenguaje.addEventListener('change', cambiarLenguaje)
        async function cambiarLenguaje(event){
            const len = event.target.value

            if(len === 'EN' || len === 'ES' || len === 'PT'){
                //se busca el jso correspondiente
                let res = await fetch(`../conf/config${len}.json`)
                let configLen = await res.json()

                //se llena la pag

                saludo.innerText  = configLen['saludo']
                busqueda.nextElementSibling[0].setAttribute("placeholder", configLen['nombre'])
                busqueda.nextElementSibling[1].setAttribute("value",  configLen['buscar'])
                footer.innerText = configLen['copyRight']
            }
            
        }
    }

    index()

    
}
    