let selectedTipPercentage = 0;
const TAX_RATE = 0.08;
let orderTotal = 0;

function renderCheckoutCart() {
  const lunchboxItems = JSON.parse(
    localStorage.getItem("lunchboxItems") || "[]",
  );
  const cartSection = document.querySelector(".cart-section");
  const emptySection = document.querySelector(".empty-cart-section");

  if (!cartSection) return;

  if (lunchboxItems.length === 0) {
    cartSection.style.display = "none";
    if (emptySection) {
      emptySection.style.display = "block";
    }
    return;
  }

  if (emptySection) {
    emptySection.style.display = "none";
  }
  cartSection.style.display = "block";

  cartSection.innerHTML = lunchboxItems
    .map((item, index) => renderCheckoutCartItem(item, index))
    .join("");
  calculateTotals();
}

function renderCheckoutCartItem(item, index) {
  const customizations = []
  
  if (item.selectedOptions.bagel) customizations.push(item.selectedOptions.bagel.value)
  if (item.selectedOptions.bread) customizations.push(item.selectedOptions.bread.value) 
  if (item.selectedOptions.cheese) customizations.push(item.selectedOptions.cheese.value)
  if (item.selectedOptions.size) customizations.push(item.selectedOptions.size.value)
  
  if (item.selectedOptions.toppings) {
    item.selectedOptions.toppings.forEach(topping => {
      customizations.push(topping.value)
    })
  }
  
  if (item.selectedOptions.dressing) {
    customizations.push(item.selectedOptions.dressing.value);
  }
  
  const customizationText = customizations.length > 0 ? customizations.join(', ') : '';
  
  const categoryFolders = {
    1: 'breakfast-sandwiches',
    2: 'breakfast-platters', 
    3: 'pastries-and-sides',
    4: 'drinks',
    5: 'fresh-salads',
    6: 'lunch-sandwiches',
    7: 'hoagies',
    8: 'burgers-and-hot-sandwiches',
    9: 'club-sandwiches',
    10: 'cheesesteaks',
    11: 'gyros'
  }
  
  const categoryFolder = categoryFolders[item.categoryId] || 'breakfast-sandwiches'
  const filename = item.imageFilename || 'egg_and_cheese.webp'
  const imagePath = `app-images/menu-item-images/${categoryFolder}/${filename}`

  return `
        <div class="cart-item" data-index="${index}">
            <img src="${imagePath}" alt="${item.name}" class="cart-item-img">
            <div class="cart-item-info">
                <div class="cart-item-details">
                    <div class="cart-item-name-and-customizations">
                        <h4>${item.name}</h4>
                        <p class="customizations">
                        ${customizationText}
                        </p>
                    </div>
                    <span class="price">$${item.totalPrice.toFixed(2)}</span>
                </div>
                <div class="cart-item-actions" style="justify-content: flex-end;">
                    <span class="qty-display">${item.quantity} ×</span>
                </div>
            </div>
        </div>
    `;
}

function updateCheckoutQuantity(itemIndex, change) {
  const lunchboxItems = JSON.parse(
    localStorage.getItem("lunchboxItems") || "[]",
  );

  if (itemIndex >= 0 && itemIndex < lunchboxItems.length) {
    const item = lunchboxItems[itemIndex];
    const newQuantity = item.quantity + change;

    if (newQuantity <= 0) {
      lunchboxItems.splice(itemIndex, 1);
    } else if (newQuantity <= 10) {
      const unitPrice = item.totalPrice / item.quantity;
      lunchboxItems[itemIndex].quantity = newQuantity;
      lunchboxItems[itemIndex].totalPrice = unitPrice * newQuantity;
    }

    localStorage.setItem("lunchboxItems", JSON.stringify(lunchboxItems));
    renderCheckoutCart();
  }
}

function calculateTotals() {
  const lunchboxItems = JSON.parse(
    localStorage.getItem("lunchboxItems") || "[]",
  );
  const subtotal = lunchboxItems.reduce(
    (sum, item) => sum + item.totalPrice,
    0,
  );
  const tax = subtotal * TAX_RATE;
  const tip = subtotal * (selectedTipPercentage / 100);
  const total = subtotal + tax + tip;
  orderTotal = total;

  const subtotalEl = document.querySelector(".subtotal-amount");
  const taxEl = document.querySelector(".tax-amount");
  const tipEl = document.querySelector(".tip-amount");
  const totalEl = document.querySelector(".total-amount");

  if (subtotalEl) subtotalEl.textContent = `$${subtotal.toFixed(2)}`;
  if (taxEl) taxEl.textContent = `$${tax.toFixed(2)}`;
  if (tipEl) tipEl.textContent = `$${tip.toFixed(2)}`;
  if (totalEl) totalEl.textContent = `$${total.toFixed(2)}`;
}

function initializeTipButtons() {
  const tipButtons = document.querySelectorAll(
    ".tip-section .option-btn-group button",
  );

  tipButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const isCurrentlySelected = button.classList.contains("option--selected");

      tipButtons.forEach((btn) => {
        btn.classList.remove("option--selected");
        btn.classList.add("option-btn");
      });

      if (!isCurrentlySelected) {
        button.classList.remove("option-btn");
        button.classList.add("option--selected");

        const tipText = button.textContent.trim();
        if (tipText.includes("%")) {
          selectedTipPercentage = parseInt(tipText.replace("%", ""));
        } else if (tipText === "Custom") {
          selectedTipPercentage = 0;
        }
      } else {
        selectedTipPercentage = 0;
      }

      calculateTotals();
    });
  });
}

function initializePickupButtons() {
  const pickupButtons = document.querySelectorAll(
    ".pickup-section .horizontal-scroll button",
  );

  pickupButtons.forEach((button) => {
    button.addEventListener("click", () => {

      pickupButtons.forEach((btn) => {
        btn.classList.remove("option--selected");
        btn.classList.add("option-btn");
      });

      button.classList.remove("option-btn");
      button.classList.add("option--selected");
    });
  });
}

function saveOrderAndRedirect() {
  const lunchboxItems = JSON.parse(localStorage.getItem("lunchboxItems") || "[]");
  
  if (lunchboxItems.length === 0) return;
  
  const subtotal = lunchboxItems.reduce((sum, item) => sum + item.totalPrice, 0);
  const tax = subtotal * TAX_RATE;
  const tip = subtotal * (selectedTipPercentage / 100);
  const total = subtotal + tax + tip;
  
  const selectedPickupBtn = document.querySelector('.pickup-section .option--selected');
  const pickupTime = selectedPickupBtn ? selectedPickupBtn.textContent.trim() : 'ASAP';
  
  const orderNumber = Math.floor(Math.random() * 90000) + 10000;
  
  const orderData = {
    orderNumber: orderNumber,
    items: lunchboxItems,
    subtotal: subtotal,
    tax: tax,
    tip: tip,
    total: total,
    pickupTime: pickupTime,
    orderTime: new Date().toLocaleString(),
    timestamp: Date.now()
  };
  
  localStorage.setItem("confirmationOrder", JSON.stringify(orderData));
  
  localStorage.setItem("checkoutTimestamp", Date.now());
  
  localStorage.removeItem("lunchboxItems");
  
  window.location.href = "order-confirmation.php";
}

document.addEventListener("DOMContentLoaded", () => {
  renderCheckoutCart();

  initializeTipButtons();
  
  initializePickupButtons();
  
  const paymentBtns = document.querySelectorAll(".primary-btn--checkout-btn--active");
  paymentBtns.forEach(btn => {
    if (!btn.classList.contains('apple-pay-btn')) {
      btn.style.cursor = 'not-allowed';
      btn.style.pointerEvents = 'none';
    }
  });

  const applePayBtn = document.querySelector(".apple-pay-btn");

if (applePayBtn) {
  applePayBtn.addEventListener("click", function (e) {
    e.preventDefault();
    openApplePay(orderTotal);
  });
}
});
