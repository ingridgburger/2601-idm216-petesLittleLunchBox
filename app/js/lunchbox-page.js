function formatCustomizations(selectedOptions) {
  const customizations = [];

  if (selectedOptions.bagel) customizations.push(selectedOptions.bagel.value);
  if (selectedOptions.bread) customizations.push(selectedOptions.bread.value);
  if (selectedOptions.cheese) customizations.push(selectedOptions.cheese.value);
  if (selectedOptions.size) customizations.push(selectedOptions.size.value);

  selectedOptions.toppings.forEach((topping) => {
    customizations.push(topping.value);
  });

  if (selectedOptions.dressing) {
    customizations.push(selectedOptions.dressing.value);
  }

  return customizations.join(", ");
}

function getItemImagePath(item) {
  const categoryFolders = {
    1: "breakfast-sandwiches",
    2: "breakfast-platters",
    3: "pastries-and-sides",
    4: "drinks",
    5: "fresh-salads",
    6: "lunch-sandwiches",
    7: "hoagies",
    8: "burgers-and-hot-sandwiches",
    9: "club-sandwiches",
    10: "cheesesteaks",
    11: "gyros",
  };

  const categoryFolder =
    categoryFolders[item.categoryId] || "breakfast-sandwiches";
  const filename = item.imageFilename || "egg_and_cheese.webp";

  return `app-images/menu-item-images/${categoryFolder}/${filename}`;
}

function renderCartItem(item, index) {
  const customizations = formatCustomizations(item.selectedOptions);
  const imagePath = getItemImagePath(item);

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
            <button class="qty-btn plus" onclick="updateCartItemQuantity(${index}, 1)" style="width: 24px; height: 24px; border-width: 1px; font-weight: 500;">
              +
            </button>
          </div>
        </div>
      </div>
    </div>
  `;
}

function renderLunchbox() {
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
    .map((item, index) => renderCartItem(item, index))
    .join("");
  updateCartTotal();
}

function updateCartItemQuantity(itemIndex, change) {
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
    renderLunchbox();
  }
}

function editCartItem(itemIndex) {
  const lunchboxItems = JSON.parse(
    localStorage.getItem("lunchboxItems") || "[]",
  );

  if (itemIndex >= 0 && itemIndex < lunchboxItems.length) {
    const item = lunchboxItems[itemIndex];
    window.location.href = `item.php?id=${item.id}`;
  }
}

function updateCartTotal() {
  const lunchboxItems = JSON.parse(
    localStorage.getItem("lunchboxItems") || "[]",
  );
  const total = lunchboxItems.reduce((sum, item) => sum + item.totalPrice, 0);

  const checkoutBtn = document.querySelector(
    ".primary-btn--checkout-btn--active",
  );
  const totalSpan = checkoutBtn
    ? checkoutBtn.querySelector(".checkout-total")
    : null;

  if (checkoutBtn && lunchboxItems.length > 0) {
    checkoutBtn.style.display = "flex";
    if (totalSpan) {
      totalSpan.textContent = `$${total.toFixed(2)}`;
    }
  } else if (checkoutBtn) {
    checkoutBtn.style.display = "none";
    if (totalSpan) {
      totalSpan.textContent = "$0.00";
    }
  }
}

if (window.location.pathname.includes("lunchbox.php")) {
  document.addEventListener("DOMContentLoaded", () => {
    renderLunchbox();
  });
}
