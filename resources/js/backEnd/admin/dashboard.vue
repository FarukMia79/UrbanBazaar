<template>
    <main>
        <div class="container-fluid bg-light min-vh-100 p-4">
            <!-- Header with AI Status -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold text-dark mb-0">AI Engine Dashboard</h3>
                    <small :class="aiServerStatus ? 'text-success' : 'text-danger'">
                        <i class="fa-solid fa-circle me-1 small"></i>
                        AI Server: {{ aiServerStatus ? 'Online' : 'Offline' }} (Port 8001)
                    </small>
                </div>
                <div class="d-flex gap-2">
                    <router-link :to="{ name: 'index' }" class="btn btn-primary btn-sm rounded-3 px-3 shadow-sm">Visit
                        Website</router-link>
                    <button @click="getDashboardStats"
                        class="btn btn-indigo btn-sm text-white rounded-3 px-3 shadow-sm">
                        <i class="fa-solid fa-sync"></i> Refresh AI
                    </button>
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="row g-3 mb-4">
                <!-- Total Order -->
                <div class="col-md-2-5 col-sm-6">
                    <div class="card border-0 shadow-sm p-3 border-start border-primary border-4">
                        <div class="d-flex align-items-center">
                            <div class="ms-2">
                                <h4 class="mb-0 fw-bold">{{ stats.total_order }}</h4>
                                <small class="text-muted">Total Orders</small>
                            </div>
                            <i class="fa-solid fa-cart-shopping ms-auto text-primary opacity-25 fs-1"></i>
                        </div>
                    </div>
                </div>

                <!-- Today's Order -->
                <div class="col-xl col-md-4 col-6">
                    <div class="card border-0 shadow-sm p-3 border-start border-danger border-4 h-100">
                        <div class="d-flex align-items-center">
                            <div class="ms-2">
                                <h4 class="mb-0 fw-bold">{{ stats.todays_order }}</h4>
                                <small class="text-muted">Today's Orders</small>
                            </div>
                            <i class="fa-solid fa-calendar-day ms-auto text-danger opacity-25 fs-1"></i>
                        </div>
                    </div>
                </div>

                <!-- AI Interactions (The AI Data) -->
                <div class="col-md-2-5 col-sm-6">
                    <div class="card border-0 shadow-sm p-3 border-start border-info border-4">
                        <div class="d-flex align-items-center">
                            <div class="ms-2">
                                <h4 class="mb-0 fw-bold">{{ stats.ai_data_points }}</h4>
                                <small class="text-muted">AI Data Points</small>
                            </div>
                            <i class="fa-solid fa-brain ms-auto text-info opacity-25 fs-1"></i>
                        </div>
                    </div>
                </div>
                <!-- Products -->
                <div class="col-md-2-5 col-sm-6">
                    <div class="card border-0 shadow-sm p-3 border-start border-success border-4">
                        <div class="d-flex align-items-center">
                            <div class="ms-2">
                                <h4 class="mb-0 fw-bold">{{ stats.total_products }}</h4>
                                <small class="text-muted">Total Products</small>
                            </div>
                            <i class="fa-solid fa-box ms-auto text-success opacity-25 fs-1"></i>
                        </div>
                    </div>
                </div>
                <!-- Customers -->
                <div class="col-md-2-5 col-sm-6">
                    <div class="card border-0 shadow-sm p-3 border-start border-warning border-4">
                        <div class="d-flex align-items-center">
                            <div class="ms-2">
                                <h4 class="mb-0 fw-bold">{{ stats.total_customers }}</h4>
                                <small class="text-muted">Customers</small>
                            </div>
                            <i class="fa-solid fa-users ms-auto text-warning opacity-25 fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- AI Interaction Analysis (Chart) -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <h6 class="fw-bold text-dark mb-4">User Behavior Analysis</h6>
                        <div style="height: 250px;">
                            <canvas id="aiChart"></canvas>
                        </div>
                        <div class="mt-3 small text-muted">
                            <i class="fa-solid fa-info-circle"></i> Showing real-time ratio of View vs Cart vs Purchase.
                        </div>
                    </div>
                </div>

                <!-- AI Activity Logs (Real-time behavior) -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <h6 class="fw-bold text-dark mb-4">Recent AI Interactions (Live Logs)</h6>
                        <div class="table-responsive">
                            <table class="table align-middle table-sm">
                                <thead>
                                    <tr class="text-muted small text-uppercase">
                                        <th>User</th>
                                        <th>Action</th>
                                        <th>Product</th>
                                        <th>Weight</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="log in aiLogs" :key="log.id">
                                        <td><strong>{{ log.user ? log.user.name : 'Guest' }}</strong></td>
                                        <td>
                                            <span class="badge"
                                                :class="log.interaction_type === 'purchase' ? 'bg-success' : 'bg-info'">
                                                {{ log.interaction_type }}
                                            </span>
                                        </td>
                                        <td class="small">{{ log.product ? log.product.name.substring(0, 30) : 'N/A'
                                        }}...</td>
                                        <td class="fw-bold">+{{ log.weight }}</td>
                                        <td class="text-muted small">{{ new Date(log.updated_at).toLocaleTimeString() }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Latest 7 Orders -->
                <div class="col-lg-12">
                    <div class="card border-0 shadow-sm p-4">
                        <h6 class="fw-bold text-dark mb-4">Latest 7 Orders</h6>
                        <div class="table-responsive">
                            <table class="table align-middle text-center border">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Invoice</th>
                                        <th>Customer</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="order in latestOrders" :key="order.id">
                                        <td><span class="badge bg-secondary">#{{ order.invoice_no }}</span></td>
                                        <td>{{ order.user ? order.user.name : order.name }}</td>
                                        <td class="fw-bold text-success">৳{{ order.total }}</td>
                                        <td>
                                            <span class="badge"
                                                :class="order.status === 'completed' ? 'bg-success' : 'bg-warning'">
                                                {{ order.status }}
                                            </span>
                                        </td>
                                        <td class="small text-muted">{{ new Date(order.created_at).toLocaleDateString()
                                        }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import axios from 'axios';
import Chart from 'chart.js/auto';

export default {
    data() {
        return {
            stats: { total_order: 0, todays_order: 0, total_products: 0, total_customers: 0, ai_data_points: 0 },
            latestOrders: [],
            aiLogs: [],
            aiServerStatus: false,
            chart: null
        }
    },
    mounted() {
        this.getDashboardStats();
        this.checkAIServer();
    },
    methods: {
        getDashboardStats() {
            axios.get('/api/dashboard')
                .then((res) => {
                    console.log("Full Dashboard Data:", res.data); // এটি যোগ করুন চেক করার জন্য
                    this.stats = res.data.stats;
                    this.latestOrders = res.data.latest_orders;
                    this.aiLogs = res.data.ai_logs;

                    if (res.data.chart_data && res.data.chart_data.length > 0) {
                        this.renderChart(res.data.chart_data);
                    }
                });
        },
        checkAIServer() {
            // পাইথন সার্ভার চেক করা
            axios.get('http://127.0.0.1:8001/ai-search?q=test')
                .then(() => { this.aiServerStatus = true; })
                .catch(() => { this.aiServerStatus = false; });
        },
        renderChart(data) {
            const ctx = document.getElementById('aiChart');
            if (this.chart) this.chart.destroy(); // আগের চার্ট রিসেট

            this.chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.map(item => item.interaction_type),
                    datasets: [{
                        data: data.map(item => item.total),
                        backgroundColor: ['#4b1091', '#00cae3', '#28a745'],
                        borderWidth: 0
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: { legend: { position: 'bottom' } }
                }
            });
        }
    }
};
</script>

<style scoped>
.btn-indigo {
    background-color: #4b1091;
}

.card {
    border-radius: 15px;
}

.col-md-2-5 {
    width: 20%;
    flex: 0 0 20%;
    max-width: 20%;
}

/* ৫টি কার্ড দেখানোর জন্য */
@media (max-width: 992px) {
    .col-md-2-5 {
        width: 50%;
        max-width: 50%;
        flex: 0 0 50%;
    }
}

.badge {
    text-transform: capitalize;
    padding: 6px 12px;
}
</style>