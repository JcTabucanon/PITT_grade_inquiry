// Get the modal
var uploadModal = document.getElementById("uploadModal");

// Get the button that opens the modal
var btn = document.getElementById("upload_Modal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close_uploadmodal_edit")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  uploadModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  uploadModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    uploadModal.style.display = "none";
  }
}