const addBtn = document.getElementById('addBtn')
const toast = document.getElementById('addToast')

const TOAST_DURATION = 10000

function selectDefaultRadios() {
  const radios = document.querySelectorAll('input[type="radio"]')
  const seenGroups = new Set()

  radios.forEach(radio => {
    if (!seenGroups.has(radio.name)) {
      radio.checked = true
      seenGroups.add(radio.name)
    }
  })
}

function validateSelections() {
  if (!addBtn) return

  const radioGroups = {}

  document.querySelectorAll('input[type="radio"]').forEach(radio => {
    if (!radioGroups[radio.name]) {
      radioGroups[radio.name] = false
    }
    if (radio.checked) {
      radioGroups[radio.name] = true
    }
  })

  const allSelected = Object.values(radioGroups).every(Boolean)
  addBtn.disabled = !allSelected
}

function showAddToast() {
  if (!toast) return

  const timestamp = Date.now()
  localStorage.setItem('showAddToast', timestamp)

  toast.classList.remove('hidden')

  setTimeout(hideAddToast, TOAST_DURATION)
}

function hideAddToast() {
  if (!toast) return

  toast.classList.add('hidden')
  localStorage.removeItem('showAddToast')
}

function restoreToast() {
  if (!toast) return

  const timestamp = localStorage.getItem('showAddToast')
  if (!timestamp) return

  const elapsed = Date.now() - Number(timestamp)

  if (elapsed < TOAST_DURATION) {
    toast.classList.remove('hidden')
    setTimeout(hideAddToast, TOAST_DURATION - elapsed)
  } else {
    localStorage.removeItem('showAddToast')
  }
}

document.addEventListener('DOMContentLoaded', () => {
  selectDefaultRadios()
  validateSelections()
  restoreToast()
})

document.addEventListener('change', validateSelections)

if (addBtn) {
  addBtn.addEventListener('click', showAddToast)
}

const qtyValue = document.getElementById('qtyValue')
const minusBtn = document.querySelector('.qty-btn.minus')
const plusBtn = document.querySelector('.qty-btn.plus')

let quantity = 1
const MIN_QTY = 1

function updateQtyUI() {
  qtyValue.textContent = quantity
  minusBtn.disabled = quantity === MIN_QTY
}

if (minusBtn && plusBtn && qtyValue) {
  minusBtn.addEventListener('click', () => {
    if (quantity > MIN_QTY) {
      quantity--
      updateQtyUI()
    }
  })

  plusBtn.addEventListener('click', () => {
    quantity++
    updateQtyUI()
  })

  updateQtyUI()
}