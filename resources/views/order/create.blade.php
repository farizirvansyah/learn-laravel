<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kopi PPKD Jakarta Pusat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f5f6f8;
            font-family: Arial, Helvetica, sans-serif;
        }

        .product-item {
            cursor: pointer;
        }

        /* .product-item:hover {
            cursor: pointer;
            border: #000;
            border-radius: 15px;
        } */

        .product-card {
            border: none;
            border-radius: 15px;
            transition: 0.2s;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-4);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.10);
        }

        .product-image {
            height: 130px;
            display: flex;
            /* align-items: center; */
            justify-content: center;
        }

        .product-image img {
            object-fit: cover;
            /* width: 100%; */
        }

        .price {
            color: #6f4e37;
            font-weight: bold;
        }

        .cart-box {
            position: sticky;
            top: 20px;
        }

        .cart-item {
            border-bottom: 1px solid #eee;
            padding: 12px 0;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            padding: 0;
            border-radius: 50%;
        }

        .total-price {
            font-size: 25px;
            font-weight: bold;
            color: #6f4e37;
        }

        .payment-btn {
            border-radius: 10px;
        }

        .category-btn.active {
            background-color: #212529 !important;
            color: white !important;
            border-color: #212529 !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <main class="col-lg-12 p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="">
                    <h3 class="fw-bold mb-1">Point Of Sales</h3>
                    <p class="text-muted">POS - Toko Kopi PPKD Jakarta Pusat</p>
                </div>
                <button class="btn btn-dark">
                    <i class="bi bi-cart-x" style="font-size: 1rem;"></i> Empty Cart</button>
            </div>

            <div class="row g-5 mb-5">
                <div class="col-md-4">
                    <div class="card shadow p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <i class="bi bi-cart4" style="font-size: 2rem;"></i>
                            </div>
                            <div>
                                <small class="text-muted">Today's Transactions</small>
                                <h4 class="mb-0 fw-bold">10</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <i class="bi bi-cash" style="font-size: 2rem;"></i>
                            </div>
                            <div>
                                <small class="text-muted">Today's Sales</small>
                                <h4 class="mb-0 fw-bold">Rp10.000.000</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <i class="bi bi-box-seam" style="font-size: 2rem;"></i>
                            </div>
                            <div>
                                <small class="text-muted">Products Sold</small>
                                <h4 class="mb-0 fw-bold">100</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card shadow border-0">
                        <div class="card-body">

                            <div class="row mb-4">
                                <div class="col-md-7">
                                    <h5 class="fw-bold">Select Product</h5>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" id="searchProduct" class="form-control"
                                        placeholder="Search Product..." onkeyup="searchProduct()">
                                </div>
                            </div>

                            <div class="mb-4">
                                <button class="btn btn-dark btn-sm me-1 category-btn"
                                    onclick="filterCategory('all', this)" data-category="all">
                                    All
                                </button>
                                @foreach ($categories as $category)
                                    <button class="btn btn-light btn-outline-dark btn-sm me-1 category-btn"
                                        onclick="filterCategory('{{ $category->id }}', this)"
                                        data-category="{{ $category->id }}">
                                        {{ $category->name ?? '' }}
                                    </button>
                                @endforeach
                            </div>

                            <div class="row g-3" id="productList">
                                @foreach ($products as $product)
                                    <div class="col-md-4 col-sm-6 product-item"
                                        data-category="{{ $product->category_id }}" data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                                        onclick="addToCart('{{ $product->id }}')">
                                        <div class="card product-card shadow h-100">
                                            <div class="product-image">
                                                <img src="{{ asset('storage/' . $product->photo) }}" alt="">
                                            </div>
                                            <div class="card-body">
                                                <span class="badge bg-light text-dark mb-2">
                                                    {{ $product->category->name ?? '' }}
                                                </span>
                                                <h6 class="fw-bold">
                                                    {{ $product->name ?? '' }}
                                                </h6>
                                                <span class="price">
                                                    Rp{{ number_format($product->price, 0) ?? '' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-lg-4">


                    <div class="card border-0 shadow cart-box">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="fw-bold mb-0">
                                    <i class="bi bi-cart"></i>Cart
                                </h5>
                                <span class="badge bg-dark" id="cartCount">0</span>
                            </div>

                            <div class="mb-3" id="cartItems">
                                <div class="text-center text-muted py-5">
                                    <i class="bi bi-cart4"></i>
                                    <p>Empty Cart</p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <span>Sub Total</span>
                                <strong id="subTotal">Rp0</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Pajak (10%)</span>
                                <strong id="tax">Rp0</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-bold">Total</span>
                                <strong class="total-price" id="total">Rp0</strong>
                            </div>
                            <button class="btn btn-success w-100 py-3" onclick="processPayment()">Payment</button>
                        </div>
                    </div>


                </div>
            </div>
        </main>
    </div>

    <script>
        let cart = [];
        const TAX_RATE = 0.10;

        // ==========================================
        // FILTER CATEGORY
        // ==========================================
        function filterCategory(categoryId, button) {
            // console.log(categoryId);
            // selectorAll = array
            const products = document.querySelectorAll(`.product-item`);
            products.forEach(function(product) {
                const categoryName = product.dataset.category;
                // jika user click category bernama all, muncul category all
                // jika user click category snack, muncul
                if (categoryId === 'all' || categoryName === String(categoryId)) {
                    product.style.display = "";
                } else {
                    product.style.display = 'none';
                }
            });
            // Ketika user reset category
            document.querySelectorAll('.category-btn').forEach(function(btn) {
                btn.classList.remove('btn-dark', 'active');
                btn.classList.add('btn-outline-dark');
            });
            // Ketika user milih category
            button.classList.remove('btn-outline-dark');
            button.classList.add('btn-dark', 'active');

            // Reset search ketika memilih category
            document.getElementById('searchProduct').value = "";
        }


        // ==========================================
        // ADD TO CART
        // ==========================================
        function addToCart(productId) {
            // console.log('Product ID:', productId);

            const product = document.querySelector(`.product-item[data-id="${productId}"]`);
            if (!product) {
                alert('Product not found');
                return;
            }

            const productName = product.dataset.name;
            const productPrice = Number(product.dataset.price);

            const existingItem = cart.find(function(item) {
                return Number(item.id) === Number(productId);
            });

            if (existingItem) {
                existingItem.qty++;
            } else {
                cart.push({
                    id: productId,
                    name: productName,
                    price: productPrice,
                    qty: 1,
                })
            }
            // console.log('Cart:', cart);
            displayCart();
        }

        function displayCart() {
            const cartItems = document.getElementById('cartItems');
            // const cartItems = document.querySelector('#cartItems');

            cartItems.innerHTML = "";
            // Jika cart kosong
            if (cart.length === 0) {
                cartItems.innerHTML = `
                    <div class="text-center text-muted py-5">
                        <i class="bi bi-cart4"
                            style="font-size: 2rem;">
                        </i>
                        <p class="mt-2">
                            Empty Cart
                        </p>
                    </div>
                `;

                // PENTING:
                // Reset semua total menjadi 0
                calculateCart();

                return;
            }

            cart.forEach(function(item) {
                cartItems.innerHTML += `
                <div class="cart-item">

                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>
                                ${item.name}
                            </strong>
                            <div class="small text-muted">Rp${formatRupiah(item.price)}</div>
                        </div>

                        <strong>
                            Rp${formatRupiah(item.price * item.qty)}
                        </strong>
                    </div>

                    <div class="d-flex align-items-center mt-3">
                        <button onclick="decreaseItem(${item.id})" type="button" class="btn btn-outline-secondary quantity-btn">
                            -
                        </button>

                        <span>${item.qty}</span>

                        <button onclick="increaseItem(${item.id})" type="button" class="btn btn-outline-secondary quantity-btn">
                            +
                        </button>

                        <button type="button" class="btn btn-sm btn-outline-danger ms-auto" onclick="removeItem(${item.id})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>

            </div>`
                calculateCart();
            })
        }

        // ==========================================
        // REMOVE ITEM
        // ==========================================
        function removeItem(productId) {
            cart = cart.filter(function(item) {
                return Number(item.id) !== Number(productId);
            });
            displayCart();
        }

        // ==========================================
        // DECREASE ITEM
        // ==========================================
        function decreaseItem(productId) {
            const item = cart.find(function(item) {
                return Number(item.id) === Number(productId);
            });
            // Safety check
            if (!item) {
                return;
            }
            item.qty--;
            if (item.qty <= 0) {
                removeItem(productId)
                return;
            }
            displayCart();
        }

        // ==========================================
        // INCREASE ITEM
        // ==========================================
        function increaseItem(productId) {
            const item = cart.find(function(item) {
                return Number(item.id) === Number(productId);
            });
            // Safety check
            if (!item) {
                return;
            }
            item.qty++;
            displayCart();
        }

        function calculateCart() {
            let subtotal = 0;
            let itemCount = 0;

            cart.forEach(function(item) {
                subtotal += Number(item.price) * Number(item.qty);
                itemCount += Number(item.qty);
            });

            const tax = subtotal * TAX_RATE;
            const total = subtotal + tax;

            document.getElementById('cartCount').innerText = `${itemCount}`;
            document.getElementById('subTotal').innerText = `Rp${formatRupiah(subtotal)}`;
            document.getElementById('tax').innerText = `Rp${formatRupiah(tax)}`;
            document.getElementById('total').innerText = `Rp${formatRupiah(total)}`;
        }

        // ==========================================
        // FORMAT RUPIAH
        // ==========================================
        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID').format(number);
        }

        // ==========================================
        // SEARCH PRODUCT + CATEGORY
        // ==========================================
        // function searchProduct() {
        //     const search = document.getElementById('searchProduct').value.toLowerCase().trim();
        //     const products = document.querySelectorAll('.product-item');
        //     products.forEach(function(product) {
        //         const productName = product.dataset.name.toLowerCase();
        //         // Jika produk name di dalam tabel nilainya sama pada saat user input
        //         if (
        //             productName.includes(search)
        //         ) {
        //             product.style.display = "";
        //         } else {
        //             product.style.display = "none";
        //         }
        //     });
        // }

        function searchProduct() {
            const search = document.getElementById('searchProduct').value.toLowerCase().trim();
            const products = document.querySelectorAll('.product-item');

            products.forEach(function(product) {
                // Nama product
                const productName =
                    (product.dataset.name || '').toLowerCase();
                // Category ID
                const categoryId = (product.dataset.category || '').toLowerCase();


                // Ambil nama category dari badge
                const categoryNameElement =
                    product.querySelector('.badge');


                const categoryName =
                    categoryNameElement ?
                    categoryNameElement.textContent
                    .toLowerCase()
                    .trim() :
                    '';


                // Search bisa berdasarkan:
                // 1. Nama produk
                // 2. Nama category
                // 3. Category ID
                const isMatch =
                    productName.includes(search) ||
                    categoryName.includes(search) ||
                    categoryId.includes(search);


                if (isMatch) {

                    product.style.display = "";

                } else {

                    product.style.display = "none";

                }

            });


            // Jika search dikosongkan,
            // tampilkan kembali semua product
            if (search === '') {

                products.forEach(function(product) {

                    product.style.display = "";

                });

            }
        }

        // ==========================================
        // CHECK CART
        // ==========================================
        async function processPayment() {
            if (cart.length === 0) {
                alert('Cart is Empty')
                return;
            }

            try {
                // SEND DATA TO LARAVEL
                const response = await fetch("{{ route('order.store') }}", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector(`meta[name="csrf-token"]`).getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        items: cart.map(function(item) {
                            return {
                                id: item.id,
                                qty: Number(item.qty)
                            }
                        }),
                        payment_method: "cash"
                    })
                });

                const result = await response.json();
                console.log('Order berhasil');
                cart = [];
                displayCart();

                location.reload();
            } catch (error) {
                console.log(error);
                alert(error.message);
            }
        }

        // let subtotal = 0;
        // cart.forEach(function(item) {
        //     subtotal += item.price * item.qty;
        // });
        // const tax = subtotal * TAX_RATE;
        // const total = subtotal + tax;
        // document.getElementById('paymentSubtotal').innerText = formatRupiah(subtotal);
        // document.getElementById('paymentTax').innerText = formatRupiah(tax);
        // document.getElementById('paymentTotal').innerText = formatRupiah(total);
        // document.getElementById('cashAmount').value = '';
        // document.getElementById('changeAmount').innerText = 'Rp0';
        // const modalElement = document.getElementById('paymentModal');
        // const modal = bootstrap.Modal.getOrCreateInstance(modalElement);
        // modal.show();

        displayCart();
    </script>
</body>

</html>
