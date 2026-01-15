<template lang="">
    
<div class="container-fluid mt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0 fw-bold">All Order (16)</h5>
            <button class="btn btn-add rounded-pill px-3 text-white"><i class="fa fa-cart-shopping me-1"></i> Add New</button>
        </div>

    <div class="card border-0 shadow-custom rounded-4 p-4">
        <div class="card-body">
            <!-- Buttons & Search -->
            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                <button class="btn btn-teal btn-sm text-white"><i class="fa fa-plus"></i> Assign User</button>
                <button class="btn btn-purple-dark btn-sm text-white"><i class="fa fa-plus"></i> Change Status</button>
                <button class="btn btn-coral btn-sm text-white"><i class="fa fa-plus"></i> Delete All</button>
                <button class="btn btn-sky btn-sm text-white"><i class="fa fa-print"></i> Print</button>
                <button class="btn btn-cyan btn-sm text-white"><i class="fa fa-truck"></i> pathao</button>
                <button class="btn btn-gray btn-sm text-white"><i class="fa fa-file-excel"></i> Export Excel</button>
                <button class="btn btn-green btn-sm text-white"><i class="fa fa-truck"></i> Safe Delivery</button>
                
                <div class="ms-auto d-flex">
                    <input type="text" class="form-control form-control-sm rounded-0 border-end-0" placeholder="Search" style="width: 200px;">
                    <button class="btn btn-search btn-sm rounded-0 text-white px-3">Search</button>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-bordered align-middle order-table">
                    <thead>
                        <tr class="table-light">
                            <th width="40"><input type="checkbox" class="form-check-input"></th>
                            <th width="120" class="text-center">Action</th>
                            <th width="40%">Invoice</th>
                            <th width="35%">Products</th>
                            <th width="120" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td class="text-center">
                                <div class="action-icons mb-2 btn-color">
                                    <i class="fa-regular fa-eye me-2"></i>
                                    <i class="fa-solid fa-gear me-2"></i>
                                    <i class="fa-regular fa-edit me-2"></i>
                                    <i class="fa-solid fa-trash text-danger"></i>
                                </div>
                                <span class="badge-fraud">Fraud Check</span>
                            </td>
                            <td>
                                <div class="d-flex invoice-box">
                                    <div class="w-50 border-end pe-2">
                                        <p><label>SL:</label> 1</p>
                                        <p><label>Invoice:</label> 33127</p>
                                        <p><label>Date:</label> 11-01-2026</p>
                                        <p><label>Time:</label> 02:43:28 am</p>
                                        <p><label>Name:</label> mohammed sakil rahman</p>
                                        <p><label>Address:</label> cumilla nangolkot jathiapara</p>
                                    </div>
                                    <div class="w-50 ps-3">
                                        <p><label>Phone:</label> 01855580555</p>
                                        <p><label>Assign:</label> </p>
                                        <p><label>Amount:</label> ৳700</p>
                                        <p><label>IP:</label> 36.255.81.132</p>
                                        <p><label>Comment:</label> ""</p>
                                        <p><label>Status:</label> <span class="badge btn-pending">Pending</span></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p><strong>Product:</strong> Large Capacity Waterproof Anti-...</p>
                                        <p><strong>Qty:</strong> 1</p>
                                        <p><strong>Size:</strong> N/A</p>
                                        <p><strong>Color:</strong> N/A</p>
                                        <p><strong>Price:</strong> ৳550</p>
                                    </div>
                                    <img src="https://via.placeholder.com/60" class="img-thumbnail" style="width: 70px; height: 50px;">
                                </div>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-pending btn-sm w-100">Pending</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {};
</script>
<style lang="css">
/* Font Size & General */
.order-table { font-size: 14px; }
.order-table p { margin-bottom: 2px; display: flex; align-items: flex-start; }
.order-table p label { width: 75px; flex-shrink: 0; font-weight: 500; color: #555; }
.order-table i { cursor: pointer; }

/* Action Icons & Badges */
.badge-fraud { background: #ffc107; padding: 2px 8px; border-radius: 4px; font-size: 11px; font-weight: 500; font-style: italic; }

/* Custom Button Colors */
.btn-add { background-color: #f06292; border: none; }
.btn-teal { background-color: #00bfa5; border: none; }
.btn-purple-dark { background-color: #6a1b9a; border: none; }
.btn-coral { background-color: #ef5350; border: none; }
.btn-sky { background-color: #4fc3f7; border: none; }
.btn-cyan { background-color: #00bcd4; border: none; }
.btn-gray { background-color: #78909c; border: none; }
.btn-green { background-color: #00c853; border: none; }
.btn-search { background-color: #00cae3; border: none; }
.btn-pending { background-color: #6f42c1; color: white; border: none; }


/* --- Custom Button Hover Fix --- */
.btn-teal:hover, .btn-teal:active { background-color: #00897b !important; color: #fff !important; }
.btn-add:hover, .btn-add:active { background-color: #d81b60 !important; color: #fff !important; }
.btn-purple-dark:hover, .btn-purple-dark:active { background-color: #4a148c !important; color: #fff !important; }
.btn-coral:hover, .btn-coral:active { background-color: #e53935 !important; color: #fff !important; }
.btn-sky:hover, .btn-sky:active { background-color: #039be5 !important; color: #fff !important; }
.btn-cyan:hover, .btn-cyan:active { background-color: #0097a7 !important; color: #fff !important; }
.btn-gray:hover, .btn-gray:active { background-color: #546e7a !important; color: #fff !important; }
.btn-green:hover, .btn-green:active { background-color: #00a041 !important; color: #fff !important; }
.btn-search:hover, .btn-search:active { background-color: #00acc1 !important; color: #fff !important; }
.btn-pending:hover, .btn-pending:active { background-color: #59359a !important; color: #fff !important; }

.btn-sm.text-white:hover {
    color: #ffffff !important;
}

.gray-color { color: #78909c;}
.btn-color { color: #6f42c1;}
.card-header h5 {
    color: #333 !important;
    font-size: 18px;
}

/* Layout Fix */
.invoice-box .border-end { border-color: #f0f0f0 !important; }
.table-bordered > :not(caption) > * > * { border-color: #eee; }
</style>
