<template>
    <div id="content">
        <section class="auth-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <div class="form-content p-4 shadow rounded bg-white">
                            <p class="auth-title h4 mb-4 text-center primary-color-text">
                                <i class="fa-solid fa-envelope me-2"></i>Forgot Password
                            </p>
                            
                            <form @submit.prevent="SendLink">
                                <div class="form-group mb-3">
                                    <label for="email" class="primary-color-text mb-1">Email Address</label>
                                    <input 
                                        type="email" 
                                        id="email" 
                                        class="form-control" 
                                        placeholder="Enter your registered email"
                                        v-model="email" 
                                        required
                                    >
                                    <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                                </div>

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-register-purple w-100" :disabled="loading">
                                        <span v-if="loading">Sending...</span>
                                        <span v-else>Send Reset Link</span>
                                    </button>
                                </div>

                                <div class="text-center mt-3">
                                    <router-link :to="{ name: 'UserLogin' }" class="text-decoration-none primary-color-text">
                                        Back to Login
                                    </router-link>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from 'axios';
import Notification from '../../../Helpers/Notification';

export default {
    data() {
        return {
            email: null,
            errors: {},
            loading: false 
        }
    },
    methods: {
        SendLink() {
            this.loading = true;
            this.errors = {};

            axios.post('/api/password/email', { email: this.email })
                .then((res) => {
                    this.loading = false;
                    this.email = null; 
                    Notification.success("Reset link sent! Please check your email.");
                })
                .catch((error) => {
                    this.loading = false;
                    if (error.response && error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    } else {
                        Notification.error("Something went wrong!");
                    }
                })
        }
    }
}
</script>

<style scoped>
.auth-section {
    background-color: #f8f8f8;
    padding: 40px 0;
}
.form-content {
    border: 1px solid #750377;
    box-shadow: 0 10px 30px rgba(63, 0, 81, 0.15) !important;
}
.primary-color-text {
    color: #3F0051 !important;
}
.btn-register-purple {
    background-color: #3F0051;
    border-color: #3F0051;
    color: white;
    font-weight: bold;
}
.btn-register-purple:hover {
    background-color: #750377;
}
</style>