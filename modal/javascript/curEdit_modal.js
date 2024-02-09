
// var span = document.getElementsByClassName("close")[0];

// span.onclick = function() {
//   var modal = document.getElementById("editModal");
//   modal.style.display = "none";

//   // Remove the modal display status from local storage
//   localStorage.removeItem("modalDisplayed");
// };

// window.onclick = function(event) {
//   var modal = document.getElementById("editModal");
//   if (event.target == modal) {
//     modal.style.display = "none";

//     // Remove the modal display status from local storage
//     localStorage.removeItem("modalDisplayed");
//   }
// };

// window.addEventListener("DOMContentLoaded", function() {
//   var modal = document.getElementById("editModal");

//   // Check if the modal was previously displayed
//   var modalDisplayed = localStorage.getItem("modalDisplayed");

//   if (modalDisplayed) {
//     modal.style.display = "none";
//   }
// });

// function openModal(button) {
//   var modal = document.getElementById("editModal");

//   // Get the values of the clicked row and fill the form
//   var id = button.getAttribute("data-id");
//   var course_code = button.getAttribute("data-course-code");
//   var descriptive_title = button.getAttribute("data-descriptive-title");
//   var instructor_name = button.getAttribute("data-instructor-name");
//   var lec = button.getAttribute("data-lec");
//   var lab = button.getAttribute("data-lab");

//   document.getElementById("edit_id").value = id;
//   document.getElementById("course_code").value = course_code;
//   document.getElementById("descriptive_title").value = descriptive_title;
//   document.getElementById("instructor_name").value = instructor_name;
//   document.getElementById("lec").value = lec;
//   document.getElementById("lab").value = lab;

//   modal.style.display = "block";

//   // Store the modal display status in local storage
//   localStorage.setItem("modalDisplayed", true);
// }

