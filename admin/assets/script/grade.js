 // Function to compute the final grade
 function computeFinalGrade(modalCounter) {
    var midTerm = parseFloat(document.getElementById("midTerm" + modalCounter).value);
    var finalTerm = parseFloat(document.getElementById("finalTerm" + modalCounter).value);
    var ave = ((midTerm + finalTerm) / 2).toFixed(1);
    document.getElementById("genAve" + modalCounter).value = ave;
}

// Close the modal when the close button is clicked
document.querySelectorAll(".close").forEach(function (element) {
    element.addEventListener("click", function () {
        var modal = element.closest(".modal");
        modal.style.display = "none";
    });
});

// Close the modal when the user clicks outside the modal content
window.addEventListener("click", function (event) {
    if (event.target.classList.contains("modal")) {
        event.target.style.display = "none";
    }
});

// Open the modal when an edit button is clicked
document.querySelector("table").addEventListener("click", function (event) {
    if (event.target.classList.contains("edit_data")) {
        var modal = event.target.closest("tr").querySelector(".modal");
        modal.style.display = "block";

        // Get the row data for the selected edit button
        var row = event.target.closest("tr");
        var ID = row.querySelector("td").textContent;
        var SY = row.querySelector("td:nth-child(2)").textContent;
        var COURSE = row.querySelector("td:nth-child(3)").textContent;
        var SEMESTER = row.querySelector("td:nth-child(4)").textContent;
        var MID_TERM = row.querySelector("td:nth-child(5)").textContent;
        var FINAL_TERM = row.querySelector("td:nth-child(6)").textContent;
        var GEN_AVE = row.querySelector("td:nth-child(7)").textContent;

        // Set the row data in the edit form
        var form = modal.querySelector("form");
        form.querySelector("input[name='ID']").value = ID;
        form.querySelector("input[name='SY']").value = SY;
        form.querySelector("input[name='COURSE']").value = COURSE;
        form.querySelector("input[name='SEMESTER']").value = SEMESTER;
        form.querySelector("input[name='MID_TERM']").value = MID_TERM;
        form.querySelector("input[name='FINAL_TERM']").value = FINAL_TERM;
        form.querySelector("input[name='GEN_AVE']").value = GEN_AVE;

        // Call the function to compute the initial value for GEN_AVE
        computeFinalGrade(event.target.dataset.modalCounter);
    }
});