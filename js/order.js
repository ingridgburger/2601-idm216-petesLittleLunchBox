let orderItems = [];
let currentItemData = null;

// GET MENU ITEM DATA
function getMenuItemData() {
  const rows = document.querySelectorAll('tbody tr');
  const map = {};
  rows.forEach(row => {
    const checkbox = row.querySelector('.menu-item-checkbox');
    if (checkbox) {
      const id = checkbox.value;
      map[id] = {
        id: id,
        name: checkbox.dataset.itemName,
        basePrice: parseFloat(checkbox.dataset.basePrice),
        bagelOptions: checkbox.dataset.bagelOptions,
        breadOptions: checkbox.dataset.breadOptions,
        cheeseOptions: checkbox.dataset.cheeseOptions,
        toppingOptions: checkbox.dataset.toppingOptions,
        dressingOptions: checkbox.dataset.dressingOptions,
        sizeOptions: checkbox.dataset.sizeOptions
      };
    }
  });
  return map;
}

// CHECKBOX ON CLICK
function handleMenuCheckboxClick(event) {
  event.preventDefault();
  const checkbox = event.target;
  const itemId = checkbox.value;
  const menuData = getMenuItemData();
  const itemData = menuData[itemId];
  
  if (!itemData) return;
  
  showItemOptionsModal(itemData);
}

// ITEM OPTIONS/CUSTOMIZATION MODAL
function showItemOptionsModal(itemData) {
  currentItemData = itemData;
  const modal = document.getElementById('customization-modal');
  const optionsContainer = document.getElementById('options-container');
  
  optionsContainer.innerHTML = '';

  const hasOptions = itemData.bagelOptions || itemData.breadOptions || 
                    itemData.cheeseOptions || itemData.toppingOptions || 
                    itemData.dressingOptions || itemData.sizeOptions;
  
  if (hasOptions) {
    createOptions('size', 'Size', itemData.sizeOptions, optionsContainer);
    createOptions('bread', 'Bread', itemData.breadOptions, optionsContainer);
    createOptions('bagel', 'Bagel', itemData.bagelOptions, optionsContainer);
    createOptions('cheese', 'Cheese', itemData.cheeseOptions, optionsContainer);
    createOptions('topping', 'Toppings', itemData.toppingOptions, optionsContainer);
    createOptions('dressing', 'Dressing', itemData.dressingOptions, optionsContainer);
  } else {
    
    const noOptionsDiv = document.createElement('div');
    noOptionsDiv.className = 'no-options-message';
    noOptionsDiv.innerHTML = '<p>No customization options available for this item.</p>';
    optionsContainer.appendChild(noOptionsDiv);
  }
  
  modal.classList.add('active');
  
  updateOptionsPrice();
}

// CREATE OPTIONS/CUSTOMIZATIONS
function createOptions(optionType, displayName, availableOptions, container) {
  if (!availableOptions || availableOptions.trim() === '') return;
  
  const optionsArray = availableOptions.split(',').map(opt => opt.trim());
  const optionData = window.optionData[optionType];
  
  if (!optionData || optionsArray.length === 0) return;
  
  const groupDiv = document.createElement('div');
  groupDiv.className = 'option-group';
  
  const groupTitle = document.createElement('h3');
  groupTitle.textContent = displayName;
  groupDiv.appendChild(groupTitle);
  
  const isMultiSelect = optionType === 'topping';
  
  optionsArray.forEach((optionName, index) => {
    const matchingOption = optionData.find(opt => {
      const optKey = opt[`${optionType}_type`];
      return optKey && optKey.toLowerCase() === optionName.toLowerCase();
    });
    
    if (matchingOption) {
      const optionDiv = document.createElement('div');
      optionDiv.className = 'option-item';
      
      const input = document.createElement('input');
      input.type = isMultiSelect ? 'checkbox' : 'radio';
      input.name = optionType;
      input.value = optionName;
      input.id = `${optionType}_${matchingOption.id}`;
      input.dataset.extraCharge = matchingOption.extra_charge || 0;
      
      if (!isMultiSelect && index === 0) {
        input.checked = true;
      }
      
      const label = document.createElement('label');
      label.htmlFor = input.id;
      
      const extraCharge = parseFloat(matchingOption.extra_charge || 0);
      const priceText = extraCharge > 0 ? ` (+$${extraCharge.toFixed(2)})` : '';
      label.textContent = `${optionName}${priceText}`;
      
      input.addEventListener('change', updateOptionsPrice);
      
      optionDiv.appendChild(label);
      optionDiv.appendChild(input);
      groupDiv.appendChild(optionDiv);
    }
  });
  
  container.appendChild(groupDiv);
}

// UPDATE PRICE 
function updateOptionsPrice() {
  if (!currentItemData) return;
  
  let totalPrice = currentItemData.basePrice;
  
  const selectedOptions = document.querySelectorAll('#options-container input:checked');
  selectedOptions.forEach(input => {
    const extraCharge = parseFloat(input.dataset.extraCharge || 0);
    totalPrice += extraCharge;
  });
  
  const addBtn = document.getElementById('add-to-order-btn');
  if (addBtn) {
    addBtn.textContent = `Add to Order - $${totalPrice.toFixed(2)}`;
  }
}

// GET SELECTED OPTIONS
function getSelectedOptions() {
  const options = {};
  const optionGroups = ['size', 'bread', 'bagel', 'cheese', 'topping', 'dressing'];
  
  optionGroups.forEach(groupName => {
    const inputs = document.querySelectorAll(`#options-container input[name="${groupName}"]:checked`);
    if (inputs.length > 0) {
      if (groupName === 'topping') {
        
        options[groupName] = Array.from(inputs).map(input => ({
          name: input.value,
          extraCharge: parseFloat(input.dataset.extraCharge || 0)
        }));
      } else {
        
        const input = inputs[0];
        options[groupName] = {
          name: input.value,
          extraCharge: parseFloat(input.dataset.extraCharge || 0)
        };
      }
    }
  });
  
  return options;
}

// ADD ITEM TO ORDER
function addItemToOrder(itemData, selectedOptions) {
  let itemPrice = itemData.basePrice;
  const customizations = [];
  
  // CALCULATE EXTRA CHARGE
  Object.keys(selectedOptions).forEach(optionType => {
    const option = selectedOptions[optionType];
    if (Array.isArray(option)) {
      
      option.forEach(topping => {
        itemPrice += topping.extraCharge;
        if (topping.name !== 'No Topping' && topping.extraCharge > 0) {
          customizations.push(`${topping.name} (+$${topping.extraCharge.toFixed(2)})`);
        } else if (topping.name !== 'No Topping') {
          customizations.push(topping.name);
        }
      });
    } else {
      // SINGLE SELECT
      itemPrice += option.extraCharge;
      if (option.name !== 'No Cheese' && option.name !== 'No Topping') {
        if (option.extraCharge > 0) {
          customizations.push(`${option.name} (+$${option.extraCharge.toFixed(2)})`);
        } else {
          customizations.push(option.name);
        }
      }
    }
  });
  
  const orderItem = {
    id: Date.now(), 
    itemId: itemData.id,
    name: itemData.name,
    basePrice: itemData.basePrice,
    finalPrice: itemPrice,
    customizations: customizations,
    selectedOptions: selectedOptions
  };
  
  orderItems.push(orderItem);
  updateOrderCount();
  closeItemOptionsModal();
}

// UPDATE ORDER COUNT
function updateOrderCount() {
  const orderCount = document.getElementById('order-count');
  if (orderCount) {
    orderCount.textContent = orderItems.length;
  }
}

// SHOW ORDER SUMMARY
function showOrderSummary() {
  if (orderItems.length === 0) {
    alert('No items in your order.');
    return;
  }
  
  let subtotal = 0;
  const orderList = document.createElement('div');
  orderList.className = 'order-list';
  
  orderItems.forEach(item => {
    const row = document.createElement('div');
    row.className = 'order-row';
    
    const itemInfo = document.createElement('div');
    itemInfo.className = 'order-item-info';
    
    const itemName = document.createElement('p');
    itemName.className = 'order-label';
    itemName.textContent = item.name;
    itemInfo.appendChild(itemName);
    
    if (item.customizations.length > 0) {
      const customizationsText = document.createElement('p');
      customizationsText.className = 'order-customizations';
      customizationsText.textContent = item.customizations.join(', ');
      itemInfo.appendChild(customizationsText);
    }
    
    const price = document.createElement('p');
    price.className = 'order-price';
    price.textContent = `$${item.finalPrice.toFixed(2)}`;
    
    row.appendChild(itemInfo);
    row.appendChild(price);
    orderList.appendChild(row);
    
    subtotal += item.finalPrice;
  });
  
  const taxRate = 0.07;
  const tax = subtotal * taxRate;
  const total = subtotal + tax;
  
  function summaryRow(labelText, value, className = 'order-row order-summary') {
    const row = document.createElement('div');
    row.className = className;
    const label = document.createElement('p');
    label.className = 'order-label';
    label.textContent = labelText;
    const priceElement = document.createElement('p');
    priceElement.className = 'order-price';
    priceElement.textContent = value;
    row.append(label, priceElement);
    return row;
  }
  
  const summaryDiv = document.createElement('div');
  summaryDiv.className = 'order-summary-group';
  summaryDiv.append(
    summaryRow('Subtotal', `$${subtotal.toFixed(2)}`),
    summaryRow('Sales Tax (7%)', `$${tax.toFixed(2)}`),
    summaryRow('Total', `$${total.toFixed(2)}`, 'order-row order-total')
  );
  orderList.append(summaryDiv);
  
  const summaryContent = document.getElementById('order-summary-content');
  summaryContent.innerHTML = '';
  summaryContent.append(orderList);
  
  const modal = document.getElementById('order-modal');
  modal.classList.add('active');
}

// CLOSE ORDER SUMMARY MODAL
function closeOrderSummary() {
  document.getElementById('order-modal').classList.remove('active');
}

// CLOSE ITEM OPTIONS MODAL
function closeItemOptionsModal() {
  document.getElementById('customization-modal').classList.remove('active');
  currentItemData = null;
}

// RESET ORDER
function resetOrder() {
  orderItems = [];
  updateOrderCount();
  
  const checkboxes = document.querySelectorAll('.menu-item-checkbox[type="checkbox"]');
  checkboxes.forEach(cb => cb.checked = false);
}

// HANDLE MENU CHECKBOXES
function setupMenuCheckboxes() {
  const checkboxes = document.querySelectorAll('.menu-item-checkbox[type="checkbox"]');
  checkboxes.forEach(checkbox => {
    checkbox.addEventListener('click', handleMenuCheckboxClick);
  });
}

// MODAL CLICKS
function setupModalEvents() {
  const orderBtn = document.getElementById('order-btn');
  if (orderBtn) {
    orderBtn.addEventListener('click', showOrderSummary);
  }
  
  const closeOrderBtn = document.getElementById('close-order-modal');
  if (closeOrderBtn) {
    closeOrderBtn.addEventListener('click', closeOrderSummary);
  }
  
  const closeOptionsBtn = document.getElementById('close-modal');
  if (closeOptionsBtn) {
    closeOptionsBtn.addEventListener('click', closeItemOptionsModal);
  }
  
  const cancelOptionsBtn = document.getElementById('cancel-btn');
  if (cancelOptionsBtn) {
    cancelOptionsBtn.addEventListener('click', closeItemOptionsModal);
  }
  
  const addToOrderBtn = document.getElementById('add-to-order-btn');
  if (addToOrderBtn) {
    addToOrderBtn.addEventListener('click', () => {
      if (currentItemData) {
        const selectedOptions = getSelectedOptions();
        addItemToOrder(currentItemData, selectedOptions);
      }
    });
  }
  
  const resetBtn = document.querySelector('.reset-btn');
  if (resetBtn) {
    resetBtn.addEventListener('click', resetOrder);
  }
  
  const orderModal = document.getElementById('order-modal');
  if (orderModal) {
    orderModal.addEventListener('click', (e) => {
      if (e.target === orderModal) closeOrderSummary();
    });
  }
  
  const optionsModal = document.getElementById('customization-modal');
  if (optionsModal) {
    optionsModal.addEventListener('click', (e) => {
      if (e.target === optionsModal) closeItemOptionsModal();
    });
  }
}

function initialize() {
  setupMenuCheckboxes();
  setupModalEvents();
  updateOrderCount();
  
  const addBtn = document.getElementById('add-to-order-btn');
  if (addBtn) {
    addBtn.textContent = 'Add to Order';
  }
}

window.addEventListener('DOMContentLoaded', initialize);