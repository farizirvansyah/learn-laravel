<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kopi PPKD Jakarta Pusat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
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
                                <i class="bi bi-cart" style="font-size: 2rem;"></i>
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
                                <small class="text-muted">Today's sales</small>
                                <h4 class="mb-0 fw-bold">Rp10.000.000</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <i class="bi bi-cart4" style="font-size: 2rem;"></i>
                            </div>
                            <div>
                                <small class="text-muted">Product Sold</small>
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
                                        placeholder="Search Product...">
                                </div>
                            </div>

                            <div class="mb-4">
                                <button class="btn btn-dark btn-sm me-1 category-btn">
                                    All
                                </button>
                                <button class="btn btn-dark btn-sm me-1 category-btn">
                                    Makanan
                                </button>
                                <button class="btn btn-dark btn-sm me-1 category-btn">
                                    Minuman
                                </button>
                            </div>

                            <div class="row g-3" id="productList">
                                <div class="col-md-4 col-sm-6">
                                    <div class="card product-card shadow h-100">
                                        <div class="product-image">
                                            This is Image Product
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bgt-light text-dark mb-2">
                                                Category Product
                                            </span>
                                            <h6 class="fw-bold">Product Name</h6>
                                            <span class="price">Product Price</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-lg-4"></div>
            </div>
        </main>
    </div>
</body>

</html>