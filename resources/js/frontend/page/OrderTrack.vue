<template>
    <div id="content">
        <section class="auth-section py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-8 col-md-6 col-lg-5">
                        <!-- ট্র্যাক করার ফর্ম -->
                        <div v-if="!orderData" class="form-content p-4 p-md-5 shadow-lg rounded border-top-custom">
                            <p class="auth-title text-center mb-4">Track Your Order</p>
                            <p class="text-center text-muted mb-4 small">
                                আপনার ফোন নম্বর এবং ইনভয়েস আইডি দিয়ে অর্ডারের বর্তমান অবস্থা জানুন।
                            </p>

                            <form @submit.prevent="trackOrder">
                                <div class="form-group mb-4">
                                    <label class="form-label fw-bold">Phone Number</label>
                                    <div class="input-group input-group-modern">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        <input type="text" class="form-control" v-model="form.phone"
                                            placeholder="017xxxxxxxx" required />
                                    </div>
                                </div>

                                <div class="form-group mb-5">
                                    <label class="form-label fw-bold">Invoice ID</label>
                                    <div class="input-group input-group-modern">
                                        <span class="input-group-text"><i class="fas fa-receipt"></i></span>
                                        <input type="text" class="form-control" v-model="form.invoice_id"
                                            placeholder="e.g., 14154" required />
                                    </div>
                                </div>

                                <button type="submit" class="submit-btn btn w-100 py-2" :disabled="loading">
                                    <span v-if="loading">Checking...</span>
                                    <span v-else>TRACK ORDER STATUS <i class="fas fa-arrow-right ms-2"></i></span>
                                </button>
                            </form>
                        </div>

                        <!-- ট্র্যাকিং রেজাল্ট দেখানোর সেকশন -->
                        <div v-else class="order-result-card p-4 shadow-lg rounded bg-white border-top-custom">
                            <div class="text-center mb-4">
                                <h5 class="fw-bold text-dark">Order Status: <span class="text-purple">{{
                                        orderData.status }}</span></h5>
                                <p class="text-muted small">Invoice #{{ orderData.invoice_no }}</p>
                            </div>

                            <!-- প্রোগ্রেস বার  -->
                            <div class="order-tracking-timeline mb-4">
                                <div class="step" :class="{ 'completed': orderData.status !== 'pending' }">
                                    <div class="bullet"></div>
                                    <p class="small">Pending</p>
                                </div>
                                <div class="step" :class="{ 'completed': orderData.status === 'completed' }">
                                    <div class="bullet"></div>
                                    <p class="small">Delivered</p>
                                </div>
                            </div>

                            <div class="details-list small">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Customer:</span> <strong>{{ orderData.name }}</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Date:</span> <strong>{{ new Date(orderData.created_at).toLocaleDateString()
                                        }}</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Total Amount:</span> <strong class="text-success">৳{{ orderData.total
                                        }}</strong>
                                </div>
                            </div>

                            <button @click="orderData = null" class="btn btn-outline-secondary btn-sm w-100 mt-4">Back
                                to Track</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from 'axios';
import Notification from "../../Helpers/Notification";

export default {
    data() {
        return {
            form: {
                phone: '',
                invoice_id: ''
            },
            orderData: null,
            loading: false
        }
    },
    methods: {
        trackOrder() {
            this.loading = true;
            axios.post('/api/order/track', this.form)
                .then(res => {
                    this.orderData = res.data;
                    this.loading = false;
                })
                .catch(err => {
                    this.loading = false;
                    Notification.error("Order not found! Please check ID and Phone.");
                });
        }
    }
}
</script>

<style scoped>
.auth-section {
    background-color: #f7f0fc;
    min-height: 80vh;
    display: flex;
    align-items: center;
}

.border-top-custom {
    border-top: 5px solid #750377;
}

.text-purple {
    color: #750377;
}

.auth-title {
    font-size: 26px;
    font-weight: 700;
    color: #750377;
}

.input-group-text {
    background-color: #750377;
    color: #fff;
    border: 1px solid #750377;
}

.submit-btn {
    background-color: #750377;
    color: #ffffff;
    border: none;
    font-size: 18px;
    border-radius: 6px;
    font-weight: bold;
    transition: 0.3s;
}

.submit-btn:hover {
    background-color: #5d025e;
}

/* Timeline CSS */
.order-tracking-timeline {
    display: flex;
    justify-content: space-between;
    position: relative;
    padding: 20px 0;
}

.order-tracking-timeline::before {
    content: "";
    position: absolute;
    top: 25px;
    left: 10%;
    right: 10%;
    height: 2px;
    background: #ddd;
    z-index: 1;
}

.step {
    text-align: center;
    position: relative;
    z-index: 2;
    width: 50%;
}

.bullet {
    width: 15px;
    height: 15px;
    background: #ddd;
    border-radius: 50%;
    margin: 0 auto 5px;
}

.step.completed .bullet {
    background: #750377;
    box-shadow: 0 0 10px #750377;
}

.step.completed p {
    color: #750377;
    font-weight: bold;
}
</style>