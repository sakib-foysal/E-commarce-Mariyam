@extends('layouts.NiceAdmin')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .select2-container { width: 100% !important; }
    .select2-container .select2-selection--single {
        height: 38px;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        display: flex;
        align-items: center;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px;
        padding-left: 12px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px;
    }
    .select2-dropdown {
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }
    .select2-container .select2-search--dropdown .select2-search__field {
        border: 1px solid #ced4da;
    }
    .table-responsive { overflow-x: auto; }
    .table th, .table td { vertical-align: middle; }
    .card-title { font-weight: 600; color: #012970; }
</style>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Offline Sales</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Offline Sales</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customer Information</h5>

                        <form id="offlineSalesForm" method="POST" action="#">
                            @csrf

                            <!-- Customer Info -->
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="customerName" name="name" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phoneNumber" name="phone" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <label class="form-label">Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                    <i class="bi bi-plus-circle"></i> Add Product
                                </button>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPhoneModal">
                                    <i class="bi bi-phone"></i> Add Phone
                                </button>
                            </div>

                            <!-- Products Table -->
                            <div class="mb-4">
                                <h5>Added Products</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="productsTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>ID</th><th>Name</th><th>Qty</th><th>Unit Price</th><th>Discount</th><th>Warranty</th><th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productsTableBody"></tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Phones Table -->
                            <div class="mb-4">
                                <h5>Added Phones</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="phonesTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>ID</th><th>Name</th><th>IMEI</th><th>Serial No</th><th>Qty</th><th>Unit Price</th><th>Discount</th><th>Warranty</th><th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="phonesTableBody"></tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Payment Summary -->
                            <div class="card bg-light mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Payment Summary</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Grand Total</label>
                                            <input type="number" class="form-control" id="finalGrandTotal" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Total Paid</label>
                                            <input type="number" class="form-control" id="finalTotalPaid" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Total Due</label>
                                            <input type="number" class="form-control" id="finalTotalDue" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg"><i class="bi bi-check-circle"></i> Complete Sale</button>
                            <button type="reset" class="btn btn-secondary btn-lg"><i class="bi bi-x-circle"></i> Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Add Product</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <form id="addProductForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Product <span class="text-danger">*</span></label>
                                <select class="form-select" id="productId" required>
                                    <option value="">Select Product</option>
                                    @foreach($products as $product)
                                        @if($product->type === 'Others')
                                            <option value="{{ $product->id }}" data-price="{{ $product->sale_price }}">
                                                {{ $product->id }} - {{ $product->title }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="productQuantity" value="1" min="1">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Unit Price</label>
                                <input type="number" class="form-control" id="productUnitPrice" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Discount</label>
                                <input type="number" class="form-control" id="productDiscount" value="0">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Warranty</label>
                            <input type="text" class="form-control" id="productWarranty" placeholder="e.g., 1 Year">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="addProductToTable()">Add Product</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Phone Modal -->
    <div class="modal fade" id="addPhoneModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Add Phone</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <form id="addPhoneForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Phone Product</label>
                                <select class="form-select" id="phoneProductId" required>
                                    <option value="">Select Phone</option>
                                    @foreach($products as $product)
                                        @if($product->type === 'Phone')
                                            <option value="{{ $product->id }}" data-price="{{ $product->sale_price }}">
                                                {{ $product->id }} - {{ $product->title }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">IMEI</label>
                                <input type="text" class="form-control" id="phoneIMEI" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Serial No</label>
                                <input type="text" class="form-control" id="phoneSerialNo" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="phoneQuantity" value="1" min="1">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Unit Price</label>
                                <input type="number" class="form-control" id="phoneUnitPrice" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Discount</label>
                                <input type="number" class="form-control" id="phoneDiscount" value="0">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Warranty</label>
                            <input type="text" class="form-control" id="phoneWarranty" placeholder="e.g., 1 Year">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="addPhoneToTable()">Add Phone</button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
let productsData = [];
let phonesData = [];

$(document).ready(function () {
    $('#productId, #phoneProductId').select2({ theme: 'bootstrap-5', placeholder: 'Select item' });

    $('#productId').on('change', function () {
        const price = $(this).find('option:selected').attr('data-price');
        $('#productUnitPrice').val(price || '');
    });

    $('#phoneProductId').on('change', function () {
        const price = $(this).find('option:selected').attr('data-price');
        $('#phoneUnitPrice').val(price || '');
    });
});

function addProductToTable() {
    const productId = $('#productId').val();
    const productName = $('#productId option:selected').text();
    const quantity = $('#productQuantity').val();
    const unitPrice = $('#productUnitPrice').val();
    const discount = $('#productDiscount').val();
    const warranty = $('#productWarranty').val();

    if (!productId) { alert('Please select a product'); return; }

    productsData.push({ productId, productName, quantity, unitPrice, discount, warranty });
    renderProductsTable();
    $('#addProductModal').modal('hide');
    $('#addProductForm')[0].reset();
    $('#productUnitPrice').val('');
}

function addPhoneToTable() {
    const phoneProductId = $('#phoneProductId').val();
    const phoneName = $('#phoneProductId option:selected').text();
    const imei = $('#phoneIMEI').val();
    const serialNo = $('#phoneSerialNo').val();
    const quantity = $('#phoneQuantity').val();
    const unitPrice = $('#phoneUnitPrice').val();
    const discount = $('#phoneDiscount').val();
    const warranty = $('#phoneWarranty').val();

    if (!phoneProductId || !imei || !serialNo) { alert('Please fill all required fields'); return; }

    phonesData.push({ phoneProductId, phoneName, imei, serialNo, quantity, unitPrice, discount, warranty });
    renderPhonesTable();
    $('#addPhoneModal').modal('hide');
    $('#addPhoneForm')[0].reset();
    $('#phoneUnitPrice').val('');
}

function renderProductsTable() {
    let html = '';
    productsData.forEach((item, index) => {
        html += `<tr>
            <td>${item.productId}</td>
            <td>${item.productName}</td>
            <td>${item.quantity}</td>
            <td>${item.unitPrice}</td>
            <td>${item.discount}</td>
            <td>${item.warranty}</td>
            <td><button class="btn btn-danger btn-sm" onclick="removeProduct(${index})"><i class="bi bi-trash"></i></button></td>
        </tr>`;
    });
    $('#productsTableBody').html(html);
    updateSummary();
}

function renderPhonesTable() {
    let html = '';
    phonesData.forEach((item, index) => {
        html += `<tr>
            <td>${item.phoneProductId}</td>
            <td>${item.phoneName}</td>
            <td>${item.imei}</td>
            <td>${item.serialNo}</td>
            <td>${item.quantity}</td>
            <td>${item.unitPrice}</td>
            <td>${item.discount}</td>
            <td>${item.warranty}</td>
            <td><button class="btn btn-danger btn-sm" onclick="removePhone(${index})"><i class="bi bi-trash"></i></button></td>
        </tr>`;
    });
    $('#phonesTableBody').html(html);
    updateSummary();
}

function removeProduct(index) {
    productsData.splice(index, 1);
    renderProductsTable();
}

function removePhone(index) {
    phonesData.splice(index, 1);
    renderPhonesTable();
}

function updateSummary() {
    let total = 0;
    productsData.forEach(item => {
        total += (parseFloat(item.unitPrice || 0) * parseFloat(item.quantity || 0)) - parseFloat(item.discount || 0);
    });
    phonesData.forEach(item => {
        total += (parseFloat(item.unitPrice || 0) * parseFloat(item.quantity || 0)) - parseFloat(item.discount || 0);
    });
    $('#finalGrandTotal').val(total.toFixed(2));
    $('#finalTotalPaid').val(total.toFixed(2));
    $('#finalTotalDue').val('0.00');
}
</script>

@endsection
