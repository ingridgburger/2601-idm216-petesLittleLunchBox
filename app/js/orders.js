document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab');
    const tabContents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabName = this.getAttribute('data-tab');
            
            tabs.forEach(t => t.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            this.classList.add('active');
            
            const activeContent = document.getElementById(tabName + '-tab');
            if (activeContent) {
                activeContent.classList.add('active');
            }
        });
    });
    
    loadActiveOrder();
});

function loadActiveOrder() {
    const checkoutTimestamp = localStorage.getItem('checkoutTimestamp');
    const orderData = JSON.parse(localStorage.getItem('confirmationOrder') || 'null');
    const activeContainer = document.querySelector('.active-order-container');
    const emptyState = document.querySelector('.empty-active-state');
    
    if (!orderData || !checkoutTimestamp) {
        if (activeContainer) activeContainer.style.display = 'none';
        if (emptyState) emptyState.style.display = 'block';
        return;
    }
    
    const timeSinceOrder = Date.now() - Number(checkoutTimestamp);
    const fiveMinutes = 5 * 60 * 1000;
    
    if (timeSinceOrder > fiveMinutes) {
        if (activeContainer) activeContainer.style.display = 'none';
        if (emptyState) emptyState.style.display = 'block';
        localStorage.removeItem('confirmationOrder');
        localStorage.removeItem('checkoutTimestamp');
        return;
    }
    
    if (activeContainer) activeContainer.style.display = 'block';
    if (emptyState) emptyState.style.display = 'none';
    
    const orderNumberEl = document.getElementById('activeOrderNumber');
    const pickupTimeEl = document.getElementById('activePickupTime');
    
    if (orderNumberEl) orderNumberEl.textContent = orderData.orderNumber;
    if (pickupTimeEl) {
        const pickupText = `pickup at ${orderData.pickupTime}`;
        pickupTimeEl.textContent = pickupText;
    }
    
    updateActiveOrderProgress(timeSinceOrder);
    
    renderActiveOrderItems(orderData.items);
    renderActiveOrderTotals(orderData);
}

function updateActiveOrderProgress(timeSinceOrder) {
    const progressFill = document.getElementById('activeProgressFill');
    const receivedStatus = document.getElementById('activeReceivedStatus');
    const preparingStatus = document.getElementById('activePreparingStatus');
    const readyStatus = document.getElementById('activeReadyStatus');
    
    [receivedStatus, preparingStatus, readyStatus].forEach(status => {
        if (status) status.classList.remove('active');
    });
    
    const twoMinutes = 2 * 60 * 1000;
    const fourMinutes = 4 * 60 * 1000;
    
    if (timeSinceOrder < twoMinutes) {
        if (progressFill) progressFill.className = 'progress-fill received';
        if (receivedStatus) receivedStatus.classList.add('active');
    } else if (timeSinceOrder < fourMinutes) {
        if (progressFill) progressFill.className = 'progress-fill preparing';
        if (preparingStatus) preparingStatus.classList.add('active');
    } else {
        if (progressFill) progressFill.className = 'progress-fill ready';
        if (readyStatus) readyStatus.classList.add('active');
    }
}

function renderActiveOrderItems(items) {
    const orderItemsContainer = document.getElementById('activeOrderItems');
    if (!orderItemsContainer || !items) return;
    
    const categoryFolders = {
        1: 'breakfast-sandwiches', 2: 'breakfast-platters', 3: 'pastries-and-sides',
        4: 'drinks', 5: 'fresh-salads', 6: 'lunch-sandwiches', 7: 'hoagies',
        8: 'burgers-and-hot-sandwiches', 9: 'club-sandwiches', 10: 'cheesesteaks', 11: 'gyros'
    };
    
    const itemsHTML = items.map(item => {
        const categoryFolder = categoryFolders[item.categoryId] || 'breakfast-sandwiches';
        const filename = item.imageFilename || 'egg_and_cheese.webp';
        const imagePath = `app-images/menu-item-images/${categoryFolder}/${filename}`;
        
        const customizations = [];
        if (item.selectedOptions && item.selectedOptions.bagel) customizations.push(item.selectedOptions.bagel.value);
        if (item.selectedOptions && item.selectedOptions.bread) customizations.push(item.selectedOptions.bread.value);
        if (item.selectedOptions && item.selectedOptions.cheese) customizations.push(item.selectedOptions.cheese.value);
        if (item.selectedOptions && item.selectedOptions.size) customizations.push(item.selectedOptions.size.value);
        if (item.selectedOptions && item.selectedOptions.toppings) {
            item.selectedOptions.toppings.forEach(topping => customizations.push(topping.value));
        }
        if (item.selectedOptions && item.selectedOptions.dressings) {
            item.selectedOptions.dressings.forEach(dressing => customizations.push(dressing.value));
        }
        
        const customizationText = customizations.length > 0 ? customizations.join(',<br>') : '';
        
        return `
            <div class="cart-item">
                <img src="${imagePath}" alt="${item.name}" class="cart-item-img">
                <div class="cart-item-info">
                    <div class="cart-item-details">
                        <h4>${item.name}</h4>
                        <span class="price">$${item.totalPrice.toFixed(2)}</span>
                    </div>
                    ${customizationText ? `<p class="customizations">${customizationText}</p>` : ''}
                    <p class="qty-right">${item.quantity}×</p>
                </div>
            </div>
        `;
    }).join('');
    
    orderItemsContainer.innerHTML = itemsHTML;
}

function renderActiveOrderTotals(orderData) {
    const orderTotalsContainer = document.getElementById('activeOrderTotals');
    if (!orderTotalsContainer) return;
    
    orderTotalsContainer.innerHTML = `
        <div class="totals">
            <div class="total-details">
                <p>Subtotal</p>
                <p>$${orderData.subtotal.toFixed(2)}</p>
            </div>
            <div class="total-details">
                <p>Tax</p>
                <p>$${orderData.tax.toFixed(2)}</p>
            </div>
            <div class="total-details">
                <p>Tip</p>
                <p>$${orderData.tip.toFixed(2)}</p>
            </div>
            <div class="total-details total-final">
                <h4>Total</h4>
                <span class="price">$${orderData.total.toFixed(2)}</span>
            </div>
        </div>
    `;
}

function toggleActiveOrderDetails() {
    const orderDetails = document.getElementById('activeOrderDetails');
    const button = document.querySelector('.view-details-btn');
    
    if (!orderDetails || !button) return;
    
    if (orderDetails.style.display === 'none' || !orderDetails.style.display) {
        orderDetails.style.display = 'block';
        button.textContent = 'Hide Details';
    } else {
        orderDetails.style.display = 'none';
        button.textContent = 'View Details';
    }
}