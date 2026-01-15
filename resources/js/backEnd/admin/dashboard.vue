<template lang="">
    <main>
        <div class="container-fluid bg-light min-vh-100 p-4">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-dark">Dashboard</h3>
                <div class="d-flex gap-2">
                    <button
                        class="btn btn-primary btn-sm rounded-3 px-3 shadow-sm"
                    >
                        <i class="fa-solid fa-globe me-1"></i> Visit Website
                    </button>
                    <button
                        class="btn btn-indigo btn-sm text-white rounded-3 px-3 shadow-sm"
                    >
                        <i class="fa-solid fa-headset me-1"></i> Developer
                        Support
                    </button>
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="row g-3 mb-4">
                <!-- Total Order -->
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div
                                class="icon-circle bg-primary-soft text-primary"
                            >
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                            <div class="ms-auto text-end">
                                <h2 class="mb-0 fw-bold">16</h2>
                                <small class="text-muted">Total Order</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Today's Order -->
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div
                                class="icon-circle bg-success-soft text-success"
                            >
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>
                            <div class="ms-auto text-end">
                                <h2 class="mb-0 fw-bold">0</h2>
                                <small class="text-muted">Today's Order</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Products -->
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-circle bg-info-soft text-info">
                                <i class="fa-solid fa-database"></i>
                            </div>
                            <div class="ms-auto text-end">
                                <h2 class="mb-0 fw-bold">35</h2>
                                <small class="text-muted">Products</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Customer -->
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div
                                class="icon-circle bg-warning-soft text-warning"
                            >
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="ms-auto text-end">
                                <h2 class="mb-0 fw-bold">20</h2>
                                <small class="text-muted">Customer</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Latest 7 Orders Table -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0 pt-4 px-4">
                            <h5 class="text-primary fw-bold">
                                Latest 7 Orders
                            </h5>
                        </div>
                        <div class="card-body px-4 pb-4">
                            <div class="table-responsive">
                                <table
                                    class="table align-middle table-bordered custom-table text-center"
                                >
                                    <thead class="bg-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Invoice</th>
                                            <th>Amount</th>
                                            <th>Customer</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img
                                                    src="https://via.placeholder.com/40"
                                                    class="rounded-circle"
                                                    alt="p"
                                                />
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-secondary px-2"
                                                    >33127</span
                                                >
                                            </td>
                                            <td class="text-success fw-bold">
                                                ৳700.00
                                            </td>
                                            <td>shaki rahman</td>
                                            <td>
                                                <i class="badge btn-pending"
                                                    >Pending</i
                                                >
                                            </td>
                                        </tr>
                                        <!-- Repeat Rows... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest Customers Table -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div
                            class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center"
                        >
                            <h5 class="text-primary fw-bold">
                                Latest Customers
                            </h5>
                            <i
                                class="fa-solid fa-ellipsis-vertical text-muted"
                            ></i>
                        </div>
                        <div class="card-body px-4 pb-4">
                            <div class="table-responsive">
                                <table
                                    class="table align-middle table-bordered custom-table text-center"
                                >
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>shaki rahman</td>
                                            <td>01855580555</td>
                                            <td>11-01-2026</td>
                                            <td>
                                                <span
                                                    class="badge bg-warning text-dark px-2"
                                                    >active</span
                                                >
                                            </td>
                                        </tr>
                                        <!-- Repeat Rows... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
export default {};
</script>
<style lang="css" scoped>
/* Custom Dashboard Theme */
.bg-light {
    background-color: #f4f7f6 !important;
}
.btn-indigo {
    background-color: #4b1091;
    border: none;
}
.btn-indigo:hover {
    background-color: #380d6d;
}

/* Summary Cards Icon Circles */
.icon-circle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

/* Soft Background Colors for Icons */
.bg-primary-soft {
    background-color: #e7f1ff;
}
.bg-success-soft {
    background-color: #e8fadf;
}
.bg-info-soft {
    background-color: #e1f5f9;
}
.bg-warning-soft {
    background-color: #fff8e1;
}

/* Table Styling */
.custom-table {
    font-size: 14px;
    border-color: #eee !important;
}
.custom-table thead th {
    background-color: #f8f9fa;
    font-weight: 500;
    color: #666;
    border-color: #eee !important;
}
.custom-table tbody td {
    border-color: #eee !important;
    padding: 12px 8px;
}

/* Card Border Radius */
.card {
    border-radius: 12px;
}
.badge {
    font-weight: 500;
    font-size: 11px;
    text-transform: lowercase;
    border-radius: 4px;
}
</style>
