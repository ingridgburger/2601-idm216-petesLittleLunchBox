document.addEventListener('DOMContentLoaded', () => {

  const applePayModal = document.getElementById('applePayModal')
  const closeApplePay = document.getElementById('closeApplePay')
  const applePayAmount = document.getElementById('applePayAmount')
  const applePayContainer = document.querySelector('.apple-pay-container')

  window.openApplePay = function(total) {
    applePayAmount.textContent = `$${total.toFixed(2)}`
    applePayModal.classList.remove('hidden')
  }

  function closeApplePayModal() {
    applePayModal.classList.add('hidden')
  }

  if (closeApplePay) {
    closeApplePay.addEventListener('click', closeApplePayModal)
  }

  applePayModal.addEventListener('click', (e) => {
    if (e.target === applePayModal) {
      closeApplePayModal()
    }
  })

  if (applePayContainer) {
    applePayContainer.addEventListener('dblclick', () => {
      if (typeof saveOrderAndRedirect === 'function') {
        saveOrderAndRedirect()
      }
    })
  }

})