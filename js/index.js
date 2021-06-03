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

/****
 * Returns a list of students rendered in a list
 * Depends on global variable "listado"
 ***/
function renderStudents(listId, students, slider) {
  const ulElement = document.getElementById(listId);

  // Clear any students
  ulElement.innerHTML = "";

  students.forEach((student) => {
    const template = document.createElement('template');
    template.innerHTML = `
    <li class="splide__slide">
      <div class="splide__slide__container">
        <div class="student-card" data-ci="${student.ci}">
          <img src="${student.imagen}" alt="profile-pic">
          <p>${student.nombre}</p>
        </div>
      </div>
    </li>
  `;
    ulElement.appendChild(template.content.cloneNode(true));
  });

  if( students.length <= 4){
    slider.options = { perPage: students.length };
  }

  slider.refresh();
  
  studentCards = document.getElementsByClassName("student-card");

  for (const student of studentCards ){
    student.addEventListener("click", studentClickHandler.bind(this, student));
  }
}


/****
 * Returns a student information with the same markup of perfil.html
 * @param {object} studentJson
 ***/
function renderStudentCard(studentJson){
  const studentInfoContainer = document.getElementById("student-info-container");
  const template = document.createElement('template');
  // Delete previously rendered student
  studentInfoContainer.innerHTML = "";

  if(typeof studentJson.video_juego === 'object'){
    studentJson.video_juego = studentJson.video_juego.join(', ');
  }

  if(typeof studentJson.lenguajes === 'object'){
    studentJson.lenguajes = studentJson.lenguajes.join(', ');
  }

  // Render student information
  template.innerHTML = `
    <h1 id="nombre" class="traducir-perfil" data-json-key="nombre">${studentJson.nombre}</h1>
    <p>
    <em class="traducir-perfil" data-json-key="descripcion">${studentJson.descripcion}</em>
    </p>
    <table>
      <tbody>
        <tr>
          <td class="traducir-config" data-json-key="color"></td>
          <td class="traducir-perfil" data-json-key="color">${studentJson.color}</td>
        </tr>
        <tr>
          <td class="traducir-config" data-json-key="libro"></td>
          <td class="traducir-perfil" data-json-key="libro">${studentJson.libro}</td>
        </tr>
        <tr>
          <td class="traducir-config" data-json-key="musica"></td>
          <td class="traducir-perfil" data-json-key="musica">${studentJson.musica}</td>
        </tr>
        <tr>
          <td class="traducir-config" data-json-key="video_juego"></td>
          <td class="traducir-perfil" data-json-key="video_juego">${studentJson.video_juego}</td>
        </tr>
        <tr>
          <td><strong class="traducir-config" data-json-key="lenguajes"></strong></td>
          <td><strong class="traducir-perfil" data-json-key="lenguajes">${studentJson.lenguajes}</strong></td>
        </tr>
      </tbody>
    </table>
    <p><a href="mailto:${studentJson.email}" class="traducir-perfil" data-json-key="email">${config.email.replace('[email]',studentJson.email)}</a></p>
  `;
  
  studentInfoContainer.appendChild(template.content.cloneNode(true))

  traducir("traducir-config", "config");
}

function searchStudent(keyword){
  const result = [];
  for (const student of listado){
    // keyword in student name
    if (student.nombre.search(new RegExp(keyword, "gi")) !== -1) {
      result.push(student);
    }
  }
  return result;
}

async function studentClickHandler(student){
  try {
    const studentResponse = await fetch(`/getDatos.php?ci=${student.dataset.ci}`, {method: "GET"});

    const studentJson = await studentResponse.json();
    if(studentResponse.ok){
      renderStudentCard(studentJson);
    }else{
      console.error(studentJson.errorMsg);
    }
  }catch(error){
    console.error(error);
  }
}

// 1) Al hacer click en student card 
// 1.1 ) Llamar a getDatos.php, obtener json.
// 1.2 ) Borrar estudiante previamente renderizdo.
// 2.2 ) Renderizar estudiante.

// TODO:
// - [X] Borrar variable perfil de archivos json 26334929/perfil.json y 14444733/perfil.json
// - [ ] Add markup restante a renderStudentCard, falta foto de perfil creo.
document.addEventListener("DOMContentLoaded", () => {
  // Select elements to translate
  traducir("traducir-config", "config");

  document.getElementById("especial-logo").innerHTML = `${config.sitio[0]} <small>${config.sitio[1]}</small> ${config.sitio[2]}`;


  const slider = new Splide( '.splide',{
    perPage: 4,
    perMove: 1,
    arrows: false,
    autoplay: true,
    keyboard: true,
    gap: "10px",
    interval: 5000,
    type: "loop",
  }).mount();

  // Search input
  const input = document.getElementById("search-students");
  input.addEventListener("input", ()=>{
    const students = searchStudent(input.value);
    
    if (students.length !== 0){
      // Remove event listners of old student list to prevent memory leaks

      for (const student of studentCards ){
        student.removeEventListener("click", studentClickHandler, true);
      }
      renderStudents("students-list", students, slider);
    }else{
      // Render an empty student list with a message
      const ulElement = document.getElementById("students-list");
      ulElement.innerHTML = "";
      const template = document.createElement('template');
      noStudentsMessage = config["noEstudiantes"].replace("[query]", input.value);
      template.innerHTML = `
      <li>
        <p>${noStudentsMessage}</p>
      </li>
    `;
      ulElement.appendChild(template.content.cloneNode(true))

      slider.options = { perPage: 4 };
      slider.refresh();
    }

    if(input.value === "" || input.value === " "){
      slider.options = { perPage: 4 };
      slider.refresh();
    }
  });


  // Render student list
  renderStudents("students-list", listado, slider);
  
  // Get student json info from server
});
