const addBtn = document.getElementById("addBtn");
const toast = document.getElementById("addToast");
const priceSpan = addBtn ? addBtn.querySelector("span") : null;
const basePrice = addBtn ? parseFloat(addBtn.dataset.basePrice) : 0;

const TOAST_DURATION = 10000;

function selectDefaultRadios() {
  const radios = document.querySelectorAll('input[type="radio"]');
  const seenGroups = new Set();

  radios.forEach((radio) => {
    if (!seenGroups.has(radio.name)) {
      radio.checked = true;
      seenGroups.add(radio.name);
    }
  });
}

function validateSelections() {
  if (!addBtn) return;

  const radioGroups = {};

  document.querySelectorAll('input[type="radio"]').forEach((radio) => {
    if (!radioGroups[radio.name]) {
      radioGroups[radio.name] = false;
    }
    if (radio.checked) {
      radioGroups[radio.name] = true;
    }
  });

  const allSelected = Object.values(radioGroups).every(Boolean);
  addBtn.disabled = !allSelected;

  updatePrice();
}

function updatePrice() {
  if (!priceSpan) return;

  let totalExtra = 0;

  document
    .querySelectorAll(
      'input[type="radio"]:checked, input[type="checkbox"]:checked',
    )
    .forEach((input) => {
      const extraCharge = parseFloat(input.dataset.extraCharge) || 0;
      totalExtra += extraCharge;
    });

  const itemTotal = basePrice + totalExtra;
  const finalTotal = itemTotal * quantity;

  priceSpan.textContent = `$${finalTotal.toFixed(2)}`;
}

function getSelectedOptions() {
  const selectedOptions = {
    bagel: null,
    bread: null,
    cheese: null,
    size: null,
    dressing: null,
    toppings: [],
  };

  document.querySelectorAll('input[type="radio"]:checked').forEach((input) => {
    selectedOptions[input.name] = {
      value: input.value,
      extraCharge: parseFloat(input.dataset.extraCharge) || 0,
    };
  });

  document.querySelectorAll('input[type="checkbox"]:checked')
    .forEach((input) => {
      const optionData = {
        value: input.value,
        extraCharge: parseFloat(input.dataset.extraCharge) || 0,
      };

      if (input.name === "toppings[]") {
        selectedOptions.toppings.push(optionData);
      }
    });

  return selectedOptions;
}

function optionsMatch(options1, options2) {
  const radioKeys = ['bagel', 'bread', 'cheese', 'size', 'dressing']
  for (let key of radioKeys) {
    const opt1 = options1[key]
    const opt2 = options2[key]
    if ((opt1 === null) !== (opt2 === null)) return false
    if (opt1 && opt2 && (opt1.value !== opt2.value || opt1.extraCharge !== opt2.extraCharge)) return false
  }
  
  const arrayKeys = ['toppings']
  for (let key of arrayKeys) {
    const arr1 = options1[key] || []
    const arr2 = options2[key] || []
    if (arr1.length !== arr2.length) return false
    
    const sortedArr1 = [...arr1].sort((a, b) => a.value.localeCompare(b.value))
    const sortedArr2 = [...arr2].sort((a, b) => a.value.localeCompare(b.value))
    
    for (let i = 0; i < sortedArr1.length; i++) {
      if (sortedArr1[i].value !== sortedArr2[i].value || sortedArr1[i].extraCharge !== sortedArr2[i].extraCharge) {
        return false
      }
    }
  }
  
  return true
}

function addToLunchbox() {
  const selectedOptions = getSelectedOptions();

  let totalExtra = 0;
  Object.values(selectedOptions).forEach((option) => {
    if (Array.isArray(option)) {
      option.forEach((opt) => (totalExtra += opt.extraCharge));
    } else if (option && option.extraCharge) {
      totalExtra += option.extraCharge;
    }
  });

  const itemTotal = basePrice + totalExtra;
  const finalTotal = itemTotal * quantity;

  const lunchboxItem = {
    id: addBtn.dataset.itemId,
    name: addBtn.dataset.itemName,
    basePrice: basePrice,
    totalPrice: finalTotal,
    quantity: quantity,
    selectedOptions: selectedOptions,
    categoryId: window.itemData ? window.itemData.categoryId : 1,
    imageFilename: window.itemData
      ? window.itemData.imageFilename
      : "egg_and_cheese.webp",
  };

  const existingItems = JSON.parse(
    localStorage.getItem("lunchboxItems") || "[]",
  );

  const existingItemIndex = existingItems.findIndex(existingItem => 
    existingItem.id === lunchboxItem.id && 
    optionsMatch(existingItem.selectedOptions, lunchboxItem.selectedOptions)
  );

  if (existingItemIndex !== -1) {
    const existingItem = existingItems[existingItemIndex];
    const newQuantity = existingItem.quantity + quantity;
    
    if (newQuantity > 10) {
      alert('Sorry! You have reached the maximum quantity of 10 for this item.');
      return;
    }
    
    existingItem.quantity = newQuantity;
    const unitPrice = itemTotal;
    existingItem.totalPrice = unitPrice * existingItem.quantity;
  } else {
    if (quantity > 10) {
      alert('Sorry! You have reached the maximum quantity of 10 for this item.');
      return;
    }
    existingItems.push(lunchboxItem);
  }

  localStorage.setItem("lunchboxItems", JSON.stringify(existingItems));

  showAddToast();
}

function showAddToast() {
  if (!toast) return;

  toast.classList.remove("hidden");

  setTimeout(hideAddToast, TOAST_DURATION);
}

function hideAddToast() {
  if (!toast) return;

  toast.classList.add("hidden");
}

document.addEventListener("DOMContentLoaded", () => {
  selectDefaultRadios();
  validateSelections();
  restoreToast();
  updatePrice();
});

document.addEventListener("change", (e) => {
  if (e.target.matches('input[type="radio"], input[type="checkbox"]')) {
    
    if (e.target.name === "toppings[]") {
      const isNoTopping = e.target.value === "No Topping";
      const allToppings = document.querySelectorAll('input[name="toppings[]"]');
      
      if (isNoTopping && e.target.checked) {

        allToppings.forEach(topping => {
          if (topping.value !== "No Topping") {
            topping.checked = false;
          }
        });
      } else if (e.target.checked && !isNoTopping) {

        allToppings.forEach(topping => {
          if (topping.value === "No Topping") {
            topping.checked = false;
          }
        });
      }
    }
    
    validateSelections();
  }
});

if (addBtn) {
  addBtn.addEventListener("click", (e) => {
    e.preventDefault();
    addToLunchbox();
  });
}

const qtyValue = document.getElementById("qtyValue");
const minusBtn = document.querySelector(".qty-btn.minus");
const plusBtn = document.querySelector(".qty-btn.plus");

let quantity = 1;
const MIN_QTY = 1;
const MAX_QTY = 10;

function updateQtyUI() {
  qtyValue.textContent = quantity;
  minusBtn.disabled = quantity === MIN_QTY;
  plusBtn.disabled = quantity === MAX_QTY;
  updatePrice();
}

if (minusBtn && plusBtn && qtyValue) {
  minusBtn.addEventListener("click", () => {
    if (quantity > MIN_QTY) {
      quantity--;
      updateQtyUI();
    }
  });

  plusBtn.addEventListener("click", () => {
      if (quantity < MAX_QTY) {
        quantity++;
        updateQtyUI();
      }
  });

  updateQtyUI();
}

function formatCustomizations(selectedOptions) {
  const customizations = []
  
  if (selectedOptions.bagel) customizations.push(selectedOptions.bagel.value)
  if (selectedOptions.bread) customizations.push(selectedOptions.bread.value) 
  if (selectedOptions.cheese) customizations.push(selectedOptions.cheese.value)
  if (selectedOptions.size) customizations.push(selectedOptions.size.value)
  if (selectedOptions.dressing) customizations.push(selectedOptions.dressing.value)
  
  selectedOptions.toppings.forEach(topping => {
    customizations.push(topping.value)
  })
  
  return customizations.join(', ')
}

function getItemImagePath(item) {
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
  
  return `app-images/menu-item-images/${categoryFolder}/${filename}`
}

function renderCartItem(item, index) {
  const customizations = formatCustomizations(item.selectedOptions)
  const imagePath = getItemImagePath(item)
  
  const plusDisabled = item.quantity >= 10 ? 'disabled' : ''
  
  return `
    <div class="cart-item" data-index="${index}">
      <img src="${imagePath}" alt="${item.name}" class="cart-item-img">
      <div class="cart-item-info">
        <div class="cart-item-details">
          <div class="cart-item-name-and-customizations">
            <h4>${item.name}</h4>
            <p class="customizations">
            ${customizations}
            </p>
          </div>
          <span class="price">$${item.totalPrice.toFixed(2)}</span>
        </div>
        <div class="cart-item-actions">
          <button class="icon-btn edit-btn" aria-label="Edit item" onclick="editCartItem(${index})">
            Edit
          </button>
          <div class="qty-selector">
            <button class="qty-btn minus" onclick="updateCartItemQuantity(${index}, -1)" style="width: 24px; height: 24px; border-width: 1px; font-weight: 500;">
              −
            </button>
            <span class="qty">${item.quantity}</span>
            <button class="qty-btn plus" onclick="updateCartItemQuantity(${index}, 1)" style="width: 24px; height: 24px; border-width: 1px; font-weight: 500;" ${plusDisabled}>
              +
            </button>
          </div>
        </div>
      </div>
    </div>
  `
}

function renderLunchbox() {
  const lunchboxItems = JSON.parse(localStorage.getItem('lunchboxItems') || '[]')
  const cartSection = document.querySelector('.cart-section')
  const emptySection = document.querySelector('.empty-cart-section')
  
  if (!cartSection) return
  
  if (lunchboxItems.length === 0) {
    cartSection.style.display = 'none'
    if (emptySection) {
      emptySection.style.display = 'block'
    }
    updateCartTotal()
    return
  }
  
  if (emptySection) {
    emptySection.style.display = 'none'
  }
  cartSection.style.display = 'block'
  
  cartSection.innerHTML = lunchboxItems.map((item, index) => renderCartItem(item, index)).join('')
  updateCartTotal()
}

function updateCartItemQuantity(itemIndex, change) {
  const lunchboxItems = JSON.parse(localStorage.getItem('lunchboxItems') || '[]')
  
  if (itemIndex >= 0 && itemIndex < lunchboxItems.length) {
    const item = lunchboxItems[itemIndex]
    const newQuantity = item.quantity + change
    
    if (newQuantity <= 0) {
      lunchboxItems.splice(itemIndex, 1)
    } else if (newQuantity <= 10) {
      const unitPrice = item.totalPrice / item.quantity
      lunchboxItems[itemIndex].quantity = newQuantity
      lunchboxItems[itemIndex].totalPrice = unitPrice * newQuantity
    }
    
    localStorage.setItem('lunchboxItems', JSON.stringify(lunchboxItems))
    renderLunchbox()
  }
}

function editCartItem(itemIndex) {
  const lunchboxItems = JSON.parse(localStorage.getItem('lunchboxItems') || '[]')
  
  if (itemIndex >= 0 && itemIndex < lunchboxItems.length) {
    const item = lunchboxItems[itemIndex]
    window.location.href = `item.php?id=${item.id}`
  }
}

function updateCartTotal() {
  const lunchboxItems = JSON.parse(localStorage.getItem('lunchboxItems') || '[]')
  const total = lunchboxItems.reduce((sum, item) => sum + item.totalPrice, 0)
  
  const checkoutBtn = document.querySelector('.primary-btn--checkout-btn--active')
  const totalSpan = checkoutBtn ? checkoutBtn.querySelector('.checkout-total') : null
  
  if (checkoutBtn) {
    checkoutBtn.style.display = 'flex'
    if (lunchboxItems.length > 0) {
      checkoutBtn.disabled = false
      if (totalSpan) {
        totalSpan.textContent = `$${total.toFixed(2)}`
      }
    } else {
      checkoutBtn.disabled = true
      if (totalSpan) {
        totalSpan.textContent = '$0.00'
      }
    }
  }
}

if (window.location.pathname.includes('lunchbox.php')) {
  document.addEventListener('DOMContentLoaded', () => {
    renderLunchbox()
    
    const checkoutBtn = document.getElementById('checkoutBtn')
    if (checkoutBtn) {
      checkoutBtn.addEventListener('click', () => {
        if (!checkoutBtn.disabled) {
          window.location.href = 'checkout.php'
        }
      })
    }
  })
}