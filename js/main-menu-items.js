function getMenuData() {
  const rows = document.querySelectorAll('tbody tr');
  const map = {};
  rows.forEach(row => {
    const id = row.querySelector('.menu-item-checkbox')?.value;
    const name = row.querySelector('[data-label="Name"]')?.textContent?.trim();
    const price = parseFloat(row.querySelector('[data-label="Base Price"]')?.textContent?.trim() || 0);
    if (id) map[id] = { name, price };
  });
  return map;
}

function showOrderSummary() {
  const checkboxes = document.querySelectorAll('.menu-item-checkbox[type="checkbox"]');
  const menuData = getMenuData();
  const selected = Array.from(checkboxes).filter(cb => cb.checked);
  if (selected.length === 0) {
    alert('No items selected.');
    return;
  }
  let subtotal = 0;
  const orderList = document.createElement('div');
  orderList.className = 'order-list';

  selected.forEach(cb => {
    const item = menuData[cb.value];
    if (item) {
      const row = document.createElement('div');
      row.className = 'order-row';
      const label = document.createElement('p');
      label.className = 'order-label';
      label.textContent = item.name;
      const price = document.createElement('p');
      price.className = 'order-price';
      price.textContent = `$${item.price.toFixed(2)}`;
      row.append(label, price);
      orderList.append(row);
      subtotal += item.price;
    }
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
    const price = document.createElement('p');
    price.className = 'order-price';
    price.textContent = value;
    row.append(label, price);
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

function closeOrderSummary() {
  document.getElementById('order-modal').classList.remove('active');
}
function resetCheckboxes() {
  const clearBtn = document.querySelector(".reset-btn");
  if (clearBtn) {
    clearBtn.addEventListener("click", function () {
      const checkboxes = document.querySelectorAll(
        '.menu-item-checkbox[type="checkbox"]',
      );
      checkboxes.forEach((cb) => (cb.checked = false));
    });
  }
}

function updateOrderCount() {
  const checkboxes = document.querySelectorAll(
    '.menu-item-checkbox[type="checkbox"]',
  );
  const orderCount = document.getElementById("order-count");
  function updateOrderCountInner() {
    const checkedCount = Array.from(checkboxes).filter(
      (cb) => cb.checked,
    ).length;
    orderCount.textContent = checkedCount;
  }
  checkboxes.forEach((cb) => cb.addEventListener("change", updateOrderCountInner));

  const resetBtn = document.querySelector(".reset-btn");
  if (resetBtn) {
    resetBtn.addEventListener("click", function () {
      setTimeout(updateOrderCountInner, 0);
    });
  }
  updateOrderCountInner();
}

function initialize() {
  resetCheckboxes();
  updateOrderCount();

  const orderBtn = document.getElementById('order-btn');
  if (orderBtn) {
    orderBtn.addEventListener('click', showOrderSummary);
  }

  const closeBtn = document.getElementById('close-order-modal');
  if (closeBtn) {
    closeBtn.addEventListener('click', closeOrderSummary);
  }

  const modal = document.getElementById('order-modal');
  if (modal) {
    modal.addEventListener('click', function(e) {
      if (e.target === modal) closeOrderSummary();
    });
  }
}

window.addEventListener("DOMContentLoaded", initialize);