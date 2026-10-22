//  Cart Variables 
var cartItems = [];
var cartCount = 0;

var cartIcon = document.getElementById('cart-icon');
var cartSection = document.getElementById('cart-section');
var overlay = document.getElementById('overlay');
var cartClose = document.getElementById('cart-close');
var cartItemsContainer = document.getElementById('cart-items');
var cartCountElement = document.getElementById('cart-count');
var subtotalElement = document.getElementById('subtotal');
var taxElement = document.getElementById('tax');
var totalElement = document.getElementById('total');
var deliveryFeeElement = document.getElementById('delivery-fee');
var packageFeeElement = document.getElementById('package-fee');
var serviceType = document.getElementById('service-type');
var addToCartButtons = document.querySelectorAll('.cart-btn');
var checkoutBtn = document.querySelector('.checkout-btn');

//  Load Saved Cart 
window.addEventListener('load', function() {
    var savedCart = localStorage.getItem('cartItems');
    var savedCount = localStorage.getItem('cartCount');
    if (savedCart) {
        cartItems = JSON.parse(savedCart);
        cartCount = savedCount ? parseInt(savedCount) : cartItems.reduce((sum, item) => sum + item.quantity, 0);
        cartCountElement.textContent = cartCount;
        updateCartDisplay();
    }
});

//  Save Cart 
function saveCart() {
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
    localStorage.setItem('cartCount', cartCount);
}

// Show & Hide Cart 
function showCart() {
    cartSection.style.display = 'block';
    overlay.style.display = 'block';
    document.body.style.overflow = 'hidden';
}
function hideCart() {
    cartSection.style.display = 'none';
    overlay.style.display = 'none';
    document.body.style.overflow = '';
}

// Add to Cart
function addToCart(name, price, image, size, extra) {
    var existingItemIndex = cartItems.findIndex(item => item.name === name && item.size === size);
    if (existingItemIndex !== -1) {
        cartItems[existingItemIndex].quantity += 1;
    } else {
        cartItems.push({
            name: name,
            price: parseFloat(price) + parseFloat(extra),
            size: size,
            quantity: 1,
            image: image
        });
    }
    cartCount += 1;
    cartCountElement.textContent = cartCount;
    updateCartDisplay();
    saveCart();
    alert(size + " " + name + " is successfully added to your cart!");
}

//  Remove Item 
function removeFromCart(index) {
    cartCount -= cartItems[index].quantity;
    cartItems.splice(index, 1);
    cartCountElement.textContent = cartCount;
    updateCartDisplay();
    saveCart();
}

// Update Quantity 
function updateQuantity(index, change) {
    var newQuantity = cartItems[index].quantity + change;
    if (newQuantity < 1) {
        removeFromCart(index);
        return;
    }
    cartItems[index].quantity = newQuantity;
    cartCount += change;
    cartCountElement.textContent = cartCount;
    updateCartDisplay();
    saveCart();
}

//  Update Cart Display 
function updateCartDisplay() {
    cartItemsContainer.innerHTML = '';
    if (cartItems.length === 0) {
        cartItemsContainer.innerHTML = '<p class="empty-cart">Your cart is empty</p>';
        updateCartSummary();
        return;
    }

    cartItems.forEach(function(item, index) {
        var cartItemElement = document.createElement('div');
        cartItemElement.className = 'cart-item';
        cartItemElement.innerHTML = `
            <div class="cart-item-info">
                <img src="${item.image}" alt="${item.name}" style="width:80px;height:80px;border-radius:10px;">
                <h4>${item.name} (${item.size})</h4>
                <p>RM ${item.price.toFixed(2)} x ${item.quantity}</p>
            </div>
            <div class="cart-item-controls">
                <button class="quantity-btn minus" data-index="${index}">-</button>
                <span class="quantity">${item.quantity}</span>
                <button class="quantity-btn plus" data-index="${index}">+</button>
                <button class="remove-btn" data-index="${index}"><i class="fa fa-trash"></i></button>
            </div>
        `;
        cartItemsContainer.appendChild(cartItemElement);
    });

    updateCartSummary();

    // Re-bind quantity and remove buttons
    document.querySelectorAll('.quantity-btn.minus').forEach(button => {
        button.addEventListener('click', () => updateQuantity(parseInt(button.dataset.index), -1));
    });
    document.querySelectorAll('.quantity-btn.plus').forEach(button => {
        button.addEventListener('click', () => updateQuantity(parseInt(button.dataset.index), 1));
    });
    document.querySelectorAll('.remove-btn').forEach(button => {
        button.addEventListener('click', () => removeFromCart(parseInt(button.dataset.index)));
    });
}

//  Update Cart Summary 
function updateCartSummary() {
    var subtotal = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    var tax = subtotal * 0.06; // Base 6% tax
    var deliveryFee = 0;
    var packagingFee = 0;

    if (serviceType && serviceType.value === 'delivery') {
        deliveryFee = cartItems.length > 0 ? 5.00 : 0;
        packagingFee = cartItems.reduce((sum, item) => sum + (1.00 * item.quantity), 0);
    } else if (serviceType && serviceType.value === 'dinein') {
        tax = subtotal * 0.10; // Example: 10% service tax
    }

    var total = subtotal + tax + deliveryFee + packagingFee;

    subtotalElement.textContent = "RM " + subtotal.toFixed(2);
    taxElement.textContent = "RM " + tax.toFixed(2);
    deliveryFeeElement.textContent = "RM " + deliveryFee.toFixed(2);
    packageFeeElement.textContent = "RM " + packagingFee.toFixed(2);
    totalElement.textContent = "RM " + total.toFixed(2);
}

// Checkout Button
checkoutBtn.addEventListener('click', function () {
    if (cartItems.length === 0) {
        alert("Your cart is empty! Redirecting to products page...");
        window.location.href = "product1.html";
    } else {
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        localStorage.setItem('cartTotal', totalElement.textContent);
        localStorage.setItem('serviceType', serviceType.value);

        // Dine-In will show alert before going to checkout
        if (serviceType.value === 'dinein') {
            alert("Your Dine-In order is completed.");
        }

        // Both Dine-In & Delivery go to checkout.html
        window.location.href = "checkout.html";
    }
});
//  Events 
cartIcon.addEventListener('click', e => { e.preventDefault(); showCart(); });
cartClose.addEventListener('click', hideCart);
overlay.addEventListener('click', hideCart);
serviceType.addEventListener('change', updateCartSummary);

addToCartButtons.forEach(button => {
    button.addEventListener('click', function() {
        var parent = this.closest('.item-container');
        var sizeSelect = parent.querySelector('.size-select');
        var size = sizeSelect ? sizeSelect.value : "Small";
        var extra = sizeSelect ? sizeSelect.selectedOptions[0].dataset.extra : 0;
        addToCart(this.dataset.name, this.dataset.price, this.dataset.image, size, extra);
    });
});

// Initialize
updateCartDisplay();

