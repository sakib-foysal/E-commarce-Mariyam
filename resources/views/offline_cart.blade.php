@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Offline Cart</h2>

    <!-- Search and Add Product -->
    <div class="mb-3">
        <label for="product_search" class="form-label">Search Product</label>
        <input type="text" id="product_search" class="form-control" placeholder="Start typing to search...">
        <select name="product_id" id="product_list" class="form-select mt-2" style="display: none;">
            <option value="">Select Product</option>
        </select>
    </div>

    <!-- Cart Items Table -->
    <h3>Cart Items</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="cart_items">
            <!-- Cart Items will be dynamically added here -->
        </tbody>
    </table>

    <!-- Cart Totals -->
    <div class="d-flex justify-content-between">
        <div>Total Amount: <span id="total_amount">0</span> Tk</div>
        <div>Pay Amount: <span id="pay_amount">0</span> Tk</div>
        <div>Phone: <span id="phone_number">N/A</span></div>
    </div>

    <!-- Save Offline Order -->
    <button id="save_order" class="btn btn-primary mt-3">Save Offline Order</button>
</div>

<script>
    const products = @json($products); // Load products from the server-side

    const cart = [];
    const totalAmountEl = document.getElementById('total_amount');
    const payAmountEl = document.getElementById('pay_amount');
    const phoneNumberEl = document.getElementById('phone_number');
    const cartItemsEl = document.getElementById('cart_items');

    // Search and Populate Product Dropdown
    document.getElementById('product_search').addEventListener('input', function () {
        const query = this.value.toLowerCase();
        const filteredProducts = products.filter(product => product.title.toLowerCase().includes(query));
        const productListEl = document.getElementById('product_list');

        if (filteredProducts.length > 0) {
            productListEl.style.display = 'block';
            productListEl.innerHTML = '<option value="">Select Product</option>';
            filteredProducts.forEach(product => {
                productListEl.innerHTML += `<option value="${product.id}">${product.title} (${product.sale_price} Tk)</option>`;
            });
        } else {
            productListEl.style.display = 'none';
        }
    });

    // Add Product to Cart
    document.getElementById('product_list').addEventListener('change', function () {
        const selectedProductId = this.value;
        if (!selectedProductId) return;

        const product = products.find(p => p.id == selectedProductId);
        const quantity = 1; // Default quantity

        // Add product to cart
        const cartItem = {
            id: product.id,
            title: product.title,
            type: product.type,
            price: product.sale_price,
            quantity: quantity,
            total: product.sale_price * quantity
        };
        cart.push(cartItem);
        updateCartTable();
        updateCartTotals();

        // Reset search
        document.getElementById('product_search').value = '';
        this.style.display = 'none';
    });

    // Update Cart Table
    function updateCartTable() {
        cartItemsEl.innerHTML = '';
        cart.forEach((item, index) => {
            cartItemsEl.innerHTML += `
                <tr>
                    <td>${item.title}</td>
                    <td>${item.type}</td>
                    <td>${item.price}</td>
                    <td>
                        <input type="number" value="${item.quantity}" min="1" class="form-control"
                               onchange="updateQuantity(${index}, this.value)">
                    </td>
                    <td>${item.total}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">Remove</button>
                    </td>
                </tr>
            `;
        });
    }

    // Update Cart Totals
    function updateCartTotals() {
        const totalAmount = cart.reduce((sum, item) => sum + item.total, 0);
        totalAmountEl.textContent = totalAmount;
        payAmountEl.textContent = totalAmount; // Default pay = total amount
        phoneNumberEl.textContent = '017XXXXXXXX'; // Default phone
    }

    // Update Quantity
    function updateQuantity(index, quantity) {
        cart[index].quantity = parseInt(quantity);
        cart[index].total = cart[index].price * cart[index].quantity;
        updateCartTable();
        updateCartTotals();
    }

    // Remove Item from Cart
    function removeFromCart(index) {
        cart.splice(index, 1);
        updateCartTable();
        updateCartTotals();
    }

    // Save Order
    document.getElementById('save_order').addEventListener('click', function () {
        // Here, data will not be saved to the backend.
        // In a real-world scenario, you would send the cart data to the server.
        console.log('Offline Order:', cart);
        alert('Order saved successfully (Offline mode)');
    });
</script>
@endsection
