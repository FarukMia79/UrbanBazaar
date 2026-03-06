<template lang="">

<div class="container-fluid mt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0 fw-bold">Pending Order ({{ filterSearch.length }})</h5>
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
                    <input v-model="searchTerm" type="text" class="search-input rounded-0 border-end-0" placeholder="Search" style="width: 200px;">
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
                        <tr v-for="(item, index) in filterSearch" :key="item.id">
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td class="text-center">
                                <div class="action-icons mb-2 btn-color">
                                    <i class="fa-regular fa-eye me-2"></i>
                                    <i class="fa-solid fa-gear me-2"></i>
                                    <i class="fa-regular fa-edit me-2"></i>
                                    <i @click="deleteOrder(item.order.id)" class="fa-solid fa-trash text-danger"></i>
                                </div>
                                <span class="badge-fraud">Fraud Check</span>
                            </td>
                            <td>
                                <div class="d-flex invoice-box">
                                    <div class="w-50 border-end pe-2">
                                        <p><label>SL:</label>{{ index + 1 }}</p>
                                        <p><label>Invoice:</label>{{ item.order.invoice_no }}</p>
                                        <p><label>Date:</label>{{ new Date(item.order.created_at).toLocaleDateString() }}</p>
                                        <p><label>Time:</label>{{ new Date(item.order.created_at).toLocaleTimeString() }}</p>
                                        <p><label>Name:</label>{{ item.order.name }}</p>
                                        <p><label>Address:</label>{{ item.order.address }}</p>
                                    </div>
                                    <div class="w-50 ps-3">
                                        <p><label>Phone:</label>{{ item.order.phone }}</p>
                                        <p><label>Assign:</label> </p>
                                        <p><label>Amount:</label> ৳{{ item.price }}</p>
                                        <p><label>IP:</label> {{ item.order.ip_address }}</p>
                                        <p><label>Comment:</label> ""</p>
                                        <p><label>Status:</label> <span class="badge btn-sky text-capitalize">{{ item.order.status }}</span></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p><label>Product:</label> {{ item.product.name }}</p>
                                        <p><label>Qty:</label> {{ item.qty }}</p>
                                        <p><label>Size:</label>{{ item.size || 'N/A' }}</p>
                                        <p>
                                            <label>Color:</label>
                                            <span v-if="item.color && item.color.includes('uploads/')">
                                            <img :src="'/' + item.color" style="width: 30px; height: 30px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;">
                                            </span>
                                            <span v-else>{{ item.color || 'N/A' }}</span>
                                        </p>
                                        <p><label>Price:</label> ৳{{ item.product.discount_price || 'N/A' }}</p>
                                    </div>
                                    <img :src="'/' + (item.color ? item.color : item.product.image)" class="img-thumbnail" style="width: 100px; height: 100px;">
                                </div>
                            </td>
                            <td class="text-center">
                                <button @click="changeStatus(item.order.id, 'completed')" :disabled="item.order.status === 'completed'" class="btn btn-green btn-sm w-100 text-white">Completed</button>
                                <button @click="changeStatus(item.order.id, 'pending')" :disabled="item.order.status === 'pending'" class="btn btn-sky btn-sm w-100 text-white mt-2">Pending</button>
                                <button @click="changeStatus(item.order.id, 'cancelled')" :disabled="item.order.status === 'cancelled'" class="btn btn-danger btn-sm w-100 mt-2">Cancelled</button>
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
export default {
    data() {
        return {
            orderItem: [],
            searchTerm: '',
        }
    },
    created() {
        this.getOrderItem();
    },
    computed: {
        filterSearch() {
            let pendingOrders = this.orderItem.filter(item => {
                return item.order && item.order.status === 'pending';
            });

            if (!this.searchTerm) {
                return pendingOrders;
            }

            const term = this.searchTerm.toLowerCase();
            return this.pendingOrders.filter(orderItem => {
                const order = orderItem.order || {};
                return (
                    (order.name && order.name.toLowerCase().includes(term)) ||
                    (order.phone && order.phone.includes(term)) ||
                    (order.invoice_no && String(order.invoice_no).includes(term))
                );
            });
        },
    },
    methods: {
        getOrderItem() {
            axios.get("/api/orderitem")
                .then((res) => {
                    this.orderItem = res.data;
                }).catch(err => console.log(err));
        },
        changeStatus(orderId, newStatus) {
            axios.post(`/api/order/update-status/${orderId}`, { status: newStatus })
                .then(res => {
                    Notification.success(res.data.message);

                    this.getOrderItem();
                })
                .catch(error => {
                    console.error("Status update failed", error);
                    Notification.error("Something went wrong!");
                });
        },
        deleteOrder(orderId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/api/order/${orderId}`)
                        .then((res) => {
                            this.getOrderItem();
                        }).catch((error) => {
                            Notification.error();
                        });
                }
            });

        }
    },
};
</script>
<style lang="css" scoped>
/* Font Size & General */
.order-table {
    font-size: 14px;
}

.order-table p {
    margin-bottom: 2px;
    display: flex;
    align-items: flex-start;
}

.order-table p label {
    width: 75px;
    flex-shrink: 0;
    font-weight: 500;
    color: #555;
}

.order-table i {
    cursor: pointer;
}

/* Action Icons & Badges */
.badge-fraud {
    background: #ffc107;
    padding: 2px 8px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 500;
    font-style: italic;
}

/* Custom Button Colors */
.btn-add {
    background-color: #f06292;
    border: none;
}

.btn-teal {
    background-color: #00bfa5;
    border: none;
}

.btn-purple-dark {
    background-color: #6a1b9a;
    border: none;
}

.btn-coral {
    background-color: #ef5350;
    border: none;
}

.btn-sky {
    background-color: #4fc3f7;
    border: none;
}

.btn-cyan {
    background-color: #00bcd4;
    border: none;
}

.btn-gray {
    background-color: #78909c;
    border: none;
}

.btn-green {
    background-color: #00c853;
    border: none;
}

.btn-search {
    background-color: #00cae3;
    border: none;
}

.btn-pending {
    background-color: #6f42c1;
    color: white;
    border: none;
}


/* --- Custom Button Hover Fix --- */
.btn-teal:hover,
.btn-teal:active {
    background-color: #00897b !important;
    color: #fff !important;
}

.btn-add:hover,
.btn-add:active {
    background-color: #d81b60 !important;
    color: #fff !important;
}

.btn-purple-dark:hover,
.btn-purple-dark:active {
    background-color: #4a148c !important;
    color: #fff !important;
}

.btn-coral:hover,
.btn-coral:active {
    background-color: #e53935 !important;
    color: #fff !important;
}

.btn-sky:hover,
.btn-sky:active {
    background-color: #039be5 !important;
    color: #fff !important;
}

.btn-cyan:hover,
.btn-cyan:active {
    background-color: #0097a7 !important;
    color: #fff !important;
}

.btn-gray:hover,
.btn-gray:active {
    background-color: #546e7a !important;
    color: #fff !important;
}

.btn-green:hover,
.btn-green:active {
    background-color: #00a041 !important;
    color: #fff !important;
}

.btn-search:hover,
.btn-search:active {
    background-color: #00acc1 !important;
    color: #fff !important;
}

.btn-pending:hover,
.btn-pending:active {
    background-color: #59359a !important;
    color: #fff !important;
}

.btn-sm.text-white:hover {
    color: #ffffff !important;
}

.gray-color {
    color: #78909c;
}

.btn-color {
    color: #6f42c1;
}

.card-header h5 {
    color: #333 !important;
    font-size: 18px;
}

/* Layout Fix */
.invoice-box .border-end {
    border-color: #f0f0f0 !important;
}

.table-bordered> :not(caption)>*>* {
    border-color: #eee;
}

.search-input:focus {
    border-color: #00cae3 !important;
    box-shadow: 0 0 0 3px rgba(26, 188, 156, 0.1) !important;
    outline: none !important;
    background-color: #fff;
}

.search-input {
    border: 1px solid #ced4da;
    border-radius: 4px;
    padding: 6px 12px;
    transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}
</style>
