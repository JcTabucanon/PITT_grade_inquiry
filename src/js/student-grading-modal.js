const editStudentGradesBtn = document.querySelectorAll('[data-edit-button]')
const closeBtn = document.querySelectorAll('[data-close-button]')

const editStudentGradesModal = document.querySelector('#edit-grade-modal')

const inputFieldStudentId = document.querySelector('#studentid')
const inputFieldName = document.querySelector('#name')
const inputFieldId = document.querySelector('#id')
const inputFieldFirst = document.querySelector('#first')
const inputFieldSecond = document.querySelector('#second')

const inputFieldAvg = document.querySelector('#avg')
const inputFieldRemarks = document.querySelector('#remarks')

const computeAvg = (first, second) => {
  let avg = (parseFloat(first) + parseFloat(second)) / 2;
  return avg.toFixed(1);
};

const computeRemarks = () => {
  let first = inputFieldFirst.value;
  let second = inputFieldSecond.value;

  let avg = computeAvg(first, second);
  inputFieldAvg.value = avg;

  
// 1.0 - 3.2 "Passed"
// 3.3 - 4.2 "Conditional" if avg range from 3.3 to 4.2 convert to 4.0 which is "conditional"
// 4.3 - 5.0 "Failed" if avg range from 4.3 to 5.0 convert to 5.0 which is "Failed"

  if (avg >= 1.0 && avg < 3.2) {
    inputFieldRemarks.value = 'Passed';
  } else if (avg >= 3.3 && avg <= 4.2) {
    inputFieldRemarks.value = 'Conditional';
  } else if (avg > 4.3 && avg <= 5.0) {
    inputFieldRemarks.value = 'Failed';
  } else {
    inputFieldRemarks.value = null;
  }
};

inputFieldFirst.addEventListener('keyup', computeRemarks)
inputFieldSecond.addEventListener('keyup', computeRemarks)


editStudentGradesBtn.forEach((btn) => {
  btn.addEventListener('click', () => {
    let studentId = btn.getAttribute('data-student-id')
    let name = btn.getAttribute('data-name')
    let id = btn.getAttribute('data-id')
    let first = btn.getAttribute('data-first')
    let second = btn.getAttribute('data-second')
  
    let avg = btn.getAttribute('data-avg')
    let remarks = btn.getAttribute('data-remarks')

    inputFieldStudentId.value = studentId
    inputFieldName.value = name
    inputFieldId.value = id
    inputFieldFirst.value = first
    inputFieldSecond.value = second
  
    inputFieldAvg.value = avg
    inputFieldRemarks.value = remarks

    editStudentGradesModal.classList.remove('hidden')
    editStudentGradesModal.classList.add('flex')
  })
})

closeBtn.forEach((btn) => {
  btn.addEventListener('click', () => {
    editStudentGradesModal.classList.add('hidden')
    editStudentGradesModal.classList.remove('flex')
  })
})

editStudentGradesModal.classList.add('hidden')
editStudentGradesModal.classList.remove('flex')


