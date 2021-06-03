window.onload = function() {
    //config
    // variables
    const logo = $('.logo')
    const saludo = $('.saludo')
    const busqueda = document.querySelector('.busqueda').firstChild
    const footer = $('footer')
    const sectionListado = $('.swiper-wrapper')
    const input = $('#nombreBusqueda');
    const form = $('form')
    const titulo = $('title')
    const perfil = $('#perfilEstudiante')
    const msj = document.querySelector('#msj')
    const saludoSpan = $('#saludo')
    const nombreSaludo = $('#nombre')
    const visitas = $('#visitas')


    function iniciarAPP(confLenguaje){
    
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 5,
            autoplay: {
                delay: 1000,
                pauseOnMouseEnter:true,
            },
            breakpoints:{
                // si width es >= 220px
                220:{
                    slidesPerView: 2,
                    spaceBetween: 5,
                },
                // si width es >= 380px
                380:{
                    slidesPerView: 3,
                    spaceBetween: 5,
                },
                // si width es >= 500px
                500:{
                    slidesPerView: 4,
                    spaceBetween: 5,
                },
                // si width es >= 767px
                767: {
                    slidesPerView: 5,
                    spaceBetween: 10
                },
                // si width es >= 1280px
                1280: {
                    slidesPerView: 6,
                    spaceBetween: 10
                },
            },
        });
    
        // //cambios ATI[UCV] 2020-U
        titulo.text (`${confLenguaje.sitio[0]}${confLenguaje.sitio[1]} ${confLenguaje.sitio[2]}`)
        // //internacionalizacion
        logo.html(`${confLenguaje.sitio[0]}<small>${confLenguaje.sitio[1]}</small> ${confLenguaje.sitio[2]}`)
        saludoSpan.text(`${confLenguaje.saludo}`)
        nombreSaludo.text(', Katherin mozo')
        busqueda.nextElementSibling[0].setAttribute("placeholder", confLenguaje.nombre)
        busqueda.nextElementSibling[1].setAttribute("value", confLenguaje.buscar)
        footer.text(confLenguaje.copyRight) 

        //listado de estudiantes
        for(let i=0; i < listado.length; i++){
                sectionListado.append(`
                    <div class="swiper-slide">
                        <img src="${listado[i].imagen}" alt="${listado[i].nombre}">
                        <a class="estudianteA" href="${listado[i].ci}">${listado[i].nombre}</a>
                    </div> `)
                
        }
        swiper.update()


       
        

        form.submit(function(event){
            event.preventDefault();
        })

        //lista para controlar elementos mostrados en el carrusel
        let listaSlide = document.getElementsByClassName('swiper-slide')
        let tamLista = listado.length -1
        input.keyup(function (){
            msj.innerHTML = ''
            const entrada = $(this).val()
            
    
            // sectionListado.html('')
            for(let i=0; i < listado.length; i++){
               
                if(!listado[i].nombre.toUpperCase().includes(entrada.toUpperCase())){
                    if(!listaSlide[i].classList.contains('noMostrar')){
                        listaSlide[i].classList.add('noMostrar')
                        tamLista = tamLista - 1;
                    }
                }else{
                    if(listaSlide[i].classList.contains('noMostrar')){
                        listaSlide[i].classList.remove('noMostrar')
                        tamLista = tamLista + 1
                    }
                }
            }
                
                if(tamLista === 0){
                    let textMensaje = `<p>No hay estudiantes con el nombre: ${entrada}</p>`
                    msj.innerHTML = textMensaje.replace('[query]', entrada)
                }

            
           
            swiper.update()

        })


        async function perfilEstudiante(ci){
            let url = `./getDatos.php?ci=${ci}`
            let response = await fetch(url)
            let data = await response.json()

            let confEmail = confLenguaje.email
            let textContacto = `<a href="mailto:${data.email}">${data.email}</a>`
            textContacto = confEmail.replace('[email]', textContacto)
            let estudianteEnLis = listado.find(estudiante => estudiante.ci == ci)
            let cookieContador = getCookie('contador')

            //actualizar visitas por cada click a perfil
            visitas.text(`(visitas ${cookieContador})`)


            perfil.html(`
            <div class="container perfil">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5 justify-content-center">
                <img id='img-perfil' class='mx-auto d-block' src='./${estudianteEnLis.imagen}'>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 descripcion">
                <h1 id="nombre-perfil">
                    ${data.nombre}
                </h1>
                        
                <p id="desc-perfil">
                    <em>${data.descripcion}</em>
                </p>

                <table id="tabla-perfil">
                                        <tr>
                                            <td>${confLenguaje.color}:</td>
                                            <td>${data.color}</td>
                                        </tr>
                                        <tr>
                                            <td>${confLenguaje.libro}:</td>
                                            <td>${data.libro}</td>
                                        </tr>
                                        <tr>
                                            <td>${confLenguaje.musica}:</td>
                                            <td>${data.musica}</td>
                                        </tr>
                                        <tr>
                                            <td>${confLenguaje.video_juego}:</td>
                                            <td>${data.video_juego.toString()}</td>
                                        </tr>			
                                        <tr>
                                            <td><strong>Lenguaje:</strong></td>
                                            <td><strong>${data.lenguajes.toString()}</strong></td>
                                        </tr>
                            </table>
                            
                            <p id="contacto-perfil">
                                    ${textContacto}
                            </p>
            
            </div>
            </div>
    </div>
            `)
        }
        


        let listaPorClase = document.getElementsByClassName('estudianteA')
      
        for (let item of listaPorClase) {
            item.addEventListener('click', event => {
                event.preventDefault()
                let ciEstudiante = event.target.pathname.replace('/','')

                perfilEstudiante(ciEstudiante)
            })
        }
        
        
    } //Fin IniciarAPP

     function getCookie(nombre){
        let cookie = ''
         listaCookies = document.cookie.split(";")
         for (i in listaCookies) {
             let busca = listaCookies[i].search(nombre);
             //search devuelve -1 si no se encuentra
             if (busca > -1) {cookie=listaCookies[i]}
         }
 
         nombre = `${nombre}=`
         return cookie.replace(nombre,'')
    }

    async function confLenguaje(){
        let response = await fetch('./getDatos.php')
        let data = await response.json()

        iniciarAPP(data)
    }

    confLenguaje()
    

}