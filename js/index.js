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
 
    //cambios ATI[UCV] 2020-U
    titulo.text (`${config.sitio[0]}${config.sitio[1]} ${config.sitio[2]}`)
    //internacionalizacion
    logo.html(`${config.sitio[0]}<small>${config.sitio[1]}</small> ${config.sitio[2]}`)
    saludo.text(`${config.saludo}, Katherin Mozo`)
    busqueda.nextElementSibling[0].setAttribute("placeholder", config.nombre)
    busqueda.nextElementSibling[1].setAttribute("value", config.buscar)
    footer.text(config.copyRight) 

    
    //listado de estudiantes
    // for(let i=0; i < listado.length; i++){
    //     const nuevoDiv = document.createElement('div')
    //     nuevoDiv.classList.add('swiper-slide')
    //         nuevoDiv.innerHTML = `
                
    //                 <img src="${listado[i].imagen}" alt="${listado[i].nombre}">
    //                 <a href="./${listado[i].ci}/perfil.html">${listado[i].nombre}</a>
    //             `
    //         sectionListado.appendChild(nuevoDiv)
    // }
    // swiper.update()

    //listado de estudiantes
    for(let i=0; i < listado.length; i++){
            sectionListado.append(`
                 <div class="swiper-slide">
                     <img src="${listado[i].imagen}" alt="${listado[i].nombre}">
                     <a href="./${listado[i].ci}/perfil.html">${listado[i].nombre}</a>
                 </div> `)
    }
    swiper.update()


   

    form.submit(function(event){
        event.preventDefault();
    })

    

    input.keyup(function (){
        const entrada = $(this).val()
       

        sectionListado.html('')
        for(let i=0; i < listado.length; i++){
            if(listado[i].nombre.toUpperCase().includes(entrada.toUpperCase())){
                sectionListado.append(`
                 <div class="swiper-slide">
                     <img src="${listado[i].imagen}" alt="${listado[i].nombre}">
                     <a href="./${listado[i].ci}/perfil.html">${listado[i].nombre}</a>
                 </div> `)

            }
        }
        if(sectionListado.html() === ''){
            let textMensaje = `<p>${config.mensajeBusqueda}</p>`
            sectionListado.html(textMensaje.replace('[query]', entrada))
        }
        swiper.update()
    })
    

    
    

}