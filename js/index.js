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
    }
  }
}

/****
 * Returns a list of students rendered in a list
 * Depends on global variable "listado"
 ***/
function renderStudents(listId, students) {
  const ulElement = document.getElementById(listId);

  // Clear any students
  ulElement.innerHTML = "";

  students.forEach((student) => {
    const template = document.createElement('template');
    template.innerHTML = `
    <li>
      <img src="${student.imagen}" alt="profile-pic">
      <p>${student.nombre}</p>
    </li>
  `;
    ulElement.appendChild(template.content.cloneNode(true))
  });
}


function searchStudent(keyword, listado){
  const result = [];
  for (const student of listado){
    // keyword in student name
    if (student.nombre.search(new RegExp(keyword, "gi")) !== -1) {
      result.push(student);
    }
  }
  return result;
}

/****
 * Gets students info from dom
 * Returns a list of students objects
 * This function exist so we don't have to fetch
 * students again.
 ***/
function getStudentList(listId){
  const studentsList = [];
  const ulElement = document.getElementById(listId);
  for (const liEl of ulElement.children){
    studentsList.push(JSON.parse(liEl.dataset.student));
  }
  return studentsList;
}
document.addEventListener("DOMContentLoaded", async () => {
  // Select elements to translate
  const ulStudentsElementId = "students-list";
  const listado = getStudentList(ulStudentsElementId);
  const urlParams = new URLSearchParams(window.location.search);
  const languaje = urlParams.get('len') || "es";
  const config_dir = "/conf/";
  const config_prefix = "config";
  const config_file_type = ".json";
  let config_file = "";
  try{

    if(languaje === "es"){
      config_file = `${config_dir}${config_prefix}ES${config_file_type}`;
    }else if(languaje === "en"){
      config_file = `${config_dir}${config_prefix}EN${config_file_type}`;
    }else if(languaje === "pt"){
      config_file = `${config_dir}${config_prefix}PT${config_file_type}`;
    }
    const config_response = await fetch(config_file);
    const config = await config_response.json();

    }catch(error){
      console.error(error);
    }

    // Search input
    const input = document.getElementById("search-students");
    input.addEventListener("input", ()=>{
      const students = searchStudent(input.value, listado);

      if (students.length !== 0){
        renderStudents("students-list", students);
      }else{
        // Render an empty student list with a message
        const ulElement = document.getElementById("students-list");
        ulElement.innerHTML = "";
        const template = document.createElement('template');

        noStudentsMessage = `No se encontro al estudiante ${input.value}`;
        template.innerHTML = `
        <li>
          <p>${noStudentsMessage}</p>
        </li>
      `;
        ulElement.appendChild(template.content.cloneNode(true))
      }
    });
});
