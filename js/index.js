
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
      <a href="/perfil.php?ci=${student.ci}">
        <p>${student.nombre}</p>
      </a>
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
