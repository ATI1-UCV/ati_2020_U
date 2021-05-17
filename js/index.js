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
        <div class="student-card">
          <img src="${student.imagen}" alt="profile-pic">
          <p>${student.nombre}</p>
        </div>
      </div>
    </li>
  `;
    ulElement.appendChild(template.content.cloneNode(true))
  });

  if( students.length <= 4){
    slider.options = { perPage: students.length };
  }
  slider.refresh();
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

});
