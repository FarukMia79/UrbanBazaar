<template lang="">
    <main>
        <div class="container-fluid bg-light min-vh-100 p-4">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-dark">Dashboard</h3>
                <div class="d-flex gap-2">
                    <router-link :to="{ name: 'index'}" class="btn btn-primary btn-sm rounded-3 px-3 shadow-sm"><i class="fa-solid fa-globe me-1"></i> Visit Website</router-link>
                    <router-link :to="{ name: 'index'}" class="btn btn-indigo btn-sm text-white rounded-3 px-3 shadow-sm"><i class="fa-solid fa-headset me-1"></i> Developer Support</router-link>
                    
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
                                <h2 class="mb-0 fw-bold">{{ stats.total_order }}</h2>
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
                                <h2 class="mb-0 fw-bold">{{ stats.todays_order }}</h2>
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
                                <h2 class="mb-0 fw-bold">{{ stats.total_products }}</h2>
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
                                <h2 class="mb-0 fw-bold">{{ stats.total_customers }}</h2>
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
                                        <tr v-for="(order, index) in latestOrders" :key="order.id">
                                            <td>{{ index + 1 }}</td>
                                            <td>
                                                <img 
                                                    :src="order.order_items[0].color && order.order_items[0].color.includes('/') 
                                                        ? '/' + order.order_items[0].color 
                                                        : '/' + order.order_items[0].product.image" 
                                                    class="rounded-circle border shadow-sm" 
                                                    style="width: 40px; height: 40px; object-fit: cover;"
                                                    alt="Product"
                                                />
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-secondary px-2"
                                                    >{{ order.invoice_no }}</span
                                                >
                                            </td>
                                            <td class="text-success fw-bold">
                                                ৳{{ order.total }}
                                            </td>
                                            <td>{{ order.user ? order.user.name : order.name }}</td>
                                            <td>
                                                <span class="badge" :class="{
                                                    'btn-pending': order.status === 'pending',
                                                    'btn-green': order.status === 'completed',
                                                    'btn-danger': order.status === 'cancelled'
                                                }">
                                                    {{ order.status }}
                                                </span></td>
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
                                        <tr v-for="(customer, index) in latestCustomers" :key="customer.id">
                                            <td>{{ index + 1 }}</td>
                                            <td>{{ customer.name }}</td>
                                            <td>{{ customer.email }}</td>
                                            <td>{{ new Date(customer.created_at).toLocaleDateString() }}</td>
                                            <td>
                                                <span v-if="customer.status == 1" class="badge bg-warning text-dark px-2" >active</span>
                                                <span v-else class="badge bg-warning text-dark px-2" >Inactive</span>
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

export default {
    data() {
        return {
            stats: {
                total_order: 0,
                todays_order: 0,
                total_products: 0,
                total_customers: 0
            },
            latestOrders: [],
            latestCustomers: []
        }
    },
    mounted() {
        this.getDashboardStats();
    },
    methods: {
        getDashboardStats() {
            axios.get('/api/dashboard')
                .then((res) => {
                    this.stats = res.data.stats;
                    this.latestOrders = res.data.latest_orders;
                    this.latestCustomers = res.data.latest_customers;
                })
                .catch((error) => {
                    console.error("Error fetching stats:", error);
                });
        }
    }
};
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

.btn-pending {
    background-color: #6f42c1;
    color: white;
    border: none;
}

.btn-danger {
    background-color: #ef5350;
    color: white;
    border: none;
}

.btn-green {
    background-color: #00c853;
    border: none;
}

.card-header h5 {
    color: #333 !important;
    opacity: 1 !important;
    visibility: visible !important;
}
</style>
