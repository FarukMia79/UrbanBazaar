<template lang="">
<div class="container-fluid mt-4">
    <div class="card border-0 shadow-sm">
        <!-- Header -->
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h5 class="mb-0 fw-bold">Completed Order (16)</h5>
            <button class="btn btn-add rounded-pill px-3 text-white"><i class="fa fa-cart-shopping me-1"></i> Add New</button>
        </div>

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
                                        <p><label>Status:</label> <span class="badge btn-pending">Completed</span></p>
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
                                <button class="btn btn-pending btn-sm w-100">Completed</button>
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

</style>
