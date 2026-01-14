<template lang="">
    <main>
        <div class="container-fluid p-4">
            <!-- Page Title -->
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="fw-bold">Dashboard</h3>
                </div>
            </div>

            <!-- Info Cards -->
            <div class="row g-4">
                <div class="col-md-6 col-xl-3">
                    <div class="card shadow-sm">
                        <div
                            class="card-body d-flex justify-content-between align-items-center"
                        >
                            <div class="icon-circle bg-primary text-white">
                                🛒
                            </div>
                            <div class="text-end">
                                <h4 class="mb-0">120</h4>
                                <small class="text-muted">Total Orders</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card shadow-sm">
                        <div
                            class="card-body d-flex justify-content-between align-items-center"
                        >
                            <div class="icon-circle bg-success text-white">
                                📦
                            </div>
                            <div class="text-end">
                                <h4 class="mb-0">15</h4>
                                <small class="text-muted">Today's Orders</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card shadow-sm">
                        <div
                            class="card-body d-flex justify-content-between align-items-center"
                        >
                            <div class="icon-circle bg-info text-white">🗄️</div>
                            <div class="text-end">
                                <h4 class="mb-0">85</h4>
                                <small class="text-muted">Products</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card shadow-sm">
                        <div
                            class="card-body d-flex justify-content-between align-items-center"
                        >
                            <div class="icon-circle bg-warning text-dark">
                                👤
                            </div>
                            <div class="text-end">
                                <h4 class="mb-0">60</h4>
                                <small class="text-muted">Customers</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tables -->
            <div class="row mt-1 g-4">
                <!-- Latest Orders -->
                <div class="col-xl-6">
                    <div class="card shadow-sm">
                        <div class="card-header fw-semibold bg-white">
                            Latest Orders
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Invoice</th>
                                            <th>Amount</th>
                                            <th>Customer</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>INV-1001</td>
                                            <td>৳1200</td>
                                            <td>Rahim</td>
                                            <td>
                                                <span class="badge bg-warning"
                                                    >Pending</span
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>INV-1002</td>
                                            <td>৳2200</td>
                                            <td>Karim</td>
                                            <td>
                                                <span class="badge bg-success"
                                                    >Delivered</span
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>INV-1003</td>
                                            <td>৳900</td>
                                            <td>Hasan</td>
                                            <td>
                                                <span class="badge bg-info"
                                                    >Processing</span
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest Customers -->
                <div class="col-xl-6">
                    <div class="card shadow-sm">
                        <div class="card-header fw-semibold bg-white">
                            Latest Customers
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Rahim</td>
                                            <td>017xxxxxxxx</td>
                                            <td>12-01-2026</td>
                                            <td>
                                                <span class="badge bg-success"
                                                    >Active</span
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Karim</td>
                                            <td>018xxxxxxxx</td>
                                            <td>11-01-2026</td>
                                            <td>
                                                <span class="badge bg-success"
                                                    >Active</span
                                                >
                                            </td>
                                        </tr>
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
<style lang="css">
.icon-circle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}
</style>
