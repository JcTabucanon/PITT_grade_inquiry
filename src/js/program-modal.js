const addProgramBtn = document.querySelector('[data-add-button]')
const viewProgramBtn = document.querySelectorAll('[data-view-button]')
const editProgramBtn = document.querySelectorAll('[data-edit-button]')
const deleteProgramBtn = document.querySelectorAll('[data-delete-button]')
const closeBtn = document.querySelectorAll('[data-close-button]')

const addProgramModal = document.querySelector('#add-program-modal')
const viewProgramModal = document.querySelector('#view-program-modal')
const editProgramModal = document.querySelector('#edit-program-modal')
const deleteProgramModal = document.querySelector(
  '#delete-program-modal'
)

const inputFieldId = document.querySelectorAll('#id')
const inputFieldCode = document.querySelectorAll('#code')
const inputFieldName = document.querySelectorAll('#name')
const inputFieldDesc = document.querySelectorAll('#desc')

addProgramBtn.addEventListener('click', () => {
  addProgramModal.classList.remove('hidden')
  addProgramModal.classList.add('flex')
})

viewProgramBtn.forEach((btn) => {
  btn.addEventListener('click', () => {
    let code = btn.getAttribute('data-code')
    let name = btn.getAttribute('data-name')
    let desc = btn.getAttribute('data-desc')

    inputFieldCode[0].value = code
    inputFieldName[0].value = name
    inputFieldDesc[0].value = desc

    viewProgramModal.classList.remove('hidden')
    viewProgramModal.classList.add('flex')
  })
})

editProgramBtn.forEach((btn) => {
  btn.addEventListener('click', () => {
    let id = btn.getAttribute('data-id')
    let code = btn.getAttribute('data-code')
    let name = btn.getAttribute('data-name')
    let desc = btn.getAttribute('data-desc')

    inputFieldId[0].value = id
    inputFieldCode[1].value = code
    inputFieldName[1].value = name
    inputFieldDesc[1].value = desc

    editProgramModal.classList.remove('hidden')
    editProgramModal.classList.add('flex')
  })
})

deleteProgramBtn.forEach((btn) => {
  btn.addEventListener('click', () => {
    let id = btn.getAttribute('data-id')

    inputFieldId[1].value = id

    deleteProgramModal.classList.remove('hidden')
    deleteProgramModal.classList.add('flex')
  })
})

closeBtn.forEach((btn) => {
  btn.addEventListener('click', () => {
    addProgramModal.classList.add('hidden')
    addProgramModal.classList.remove('flex')
    viewProgramModal.classList.add('hidden')
    viewProgramModal.classList.remove('flex')
    editProgramModal.classList.add('hidden')
    editProgramModal.classList.remove('flex')
    deleteProgramModal.classList.add('hidden')
    deleteProgramModal.classList.remove('flex')
  })
})

addProgramModal.classList.add('hidden')
addProgramModal.classList.remove('flex')
viewProgramModal.classList.add('hidden')
viewProgramModal.classList.remove('flex')
editProgramModal.classList.add('hidden')
editProgramModal.classList.remove('flex')
deleteProgramModal.classList.add('hidden')
deleteProgramModal.classList.remove('flex')
