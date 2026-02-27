<template>
    <div id="content">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-3 rounded-4">
                        <h5 class="fw-bold mb-3">User Menu</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item active bg-purple border-0 rounded-3 mb-1">My Orders</li>
                            <li class="list-group-item border-0">Profile Settings</li>
                            <li class="list-group-item border-0 text-danger cursor-pointer" @click="logout">Logout</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h4 class="fw-bold mb-4">My Order History</h4>

                        <div class="table-responsive" v-if="orders.length > 0">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="order in orders" :key="order.id">
                                        <td>#ORD-{{ order.id }}</td>
                                        <td>{{ new Date(order.created_at).toLocaleDateString() }}</td>
                                        <td class="fw-bold text-dark">৳{{ order.total }}</td>
                                        <td>
                                            <span class="badge" :class="getStatusClass(order.status)">
                                                {{ order.status }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-purple">View Details</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div v-else class="text-center py-5">
                            <i class="fa fa-shopping-bag fa-3x text-muted mb-3"></i>
                            <h5>You haven't placed any orders yet!</h5>
                            <router-link to="/" class="btn btn-purple-cart mt-2 text-white">Start Shopping</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    data() {
        return {
            orders: [],
        }
    },
    methods: {
        loadUserOrders() {
            axios.get('/api/user/orders')
                .then(res => {
                    this.orders = res.data;
                })
                .catch(err => console.log(err));
        },
        getStatusClass(status) {
            if (status === 'pending') return 'bg-warning text-dark';
            if (status === 'completed') return 'bg-success';
            if (status === 'cancelled') return 'bg-danger';
            return 'bg-secondary';
        },
        logout() {
            // আপনার আগের লগআউট মেথড
        }
    },
    mounted() {
        this.loadUserOrders();
    }
}
</script>