<template>
    <div class="login-page d-flex align-items-center justify-content-center">
        <div class="card login-card border-0 shadow-lg">
            <div class="card-body p-5">
                <h3 class="text-center fw-bold mb-4 text-dark">
                    Login to Your Account
                </h3>

                <form @submit.prevent="StoreData">
                    <!-- Email Input -->
                    <div class="mb-3">
                        <label class="form-label text-secondary small fw-semibold">Email address</label>
                        <input type="email" class="form-control custom-input" placeholder="" v-model="FormData.email" />
                    </div>

                    <!-- Password Input -->
                    <div class="mb-3">
                        <label class="form-label text-secondary small fw-semibold">Password</label>
                        <input type="password" class="form-control custom-input" placeholder=""
                            v-model="FormData.password" />
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" />
                        <label class="form-check-label text-secondary small" for="rememberMe">Remember Me</label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-login w-100 fw-bold py-2 mb-3 text-white">
                        Login
                    </button>

                    <!-- Forgot Password Link -->
                    <div class="text-center">
                        <a href="#" class="text-decoration-none text-secondary small">Forgot Your Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
// ১. প্রয়োজনীয় ফাইলগুলো এখানে ইম্পোর্ট করতে হবে (পাথ ঠিক আছে কি না চেক করে নিন)
import AppStorage from '../../Helpers/AppStorage';
import Notification from '../../Helpers/Notification';
import axios from 'axios';

export default {
    data() {
        return {
            FormData: {
                email: null,
                password: null,
            },
            errors: {},
        }
    },
    methods: {
        StoreData() {
            axios.post('/api/admin/login', this.FormData)
                .then((response) => {
                    const token = response.data.access_token;
                    const user = response.data.user;

                    AppStorage.store(token, user);

                    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

                    Notification.success();

                    this.$router.push({ name: 'dashboard' });

                    console.log("Login Successful!");
                })
                .catch((error) => {
                    if (error.response && error.response.data) {
                        Notification.error(error.response.data.message);
                    } else {
                        Notification.error("Something went wrong!");
                    }
                    console.error("Login Error:", error.response.data);
                })
        }
    }
};
</script>
<style lang="css" scoped>
body,
html {
    height: 100%;
    margin: 0;
}

.login-page {
    background: linear-gradient(135deg, #a4e4d4 0%, #b2c1f3 100%);
    width: 100%;
    height: 100vh;
}

.login-card {
    width: 100%;
    max-width: 450px;
    border-radius: 15px;
    background: #ffffff;
}

.custom-input {
    border: 1px solid #dee2e6;
    border-radius: 8px;
    padding: 10px 15px;
    font-size: 14px;
}

.custom-input:focus {
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
    border-color: #007bff;
}

.btn-login {
    background-color: #007bff;
    border: none;
    border-radius: 8px;
    transition: 0.3s;
}

.btn-login:hover {
    background-color: #0062cc;
    box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
}

h3 {
    color: #333;
}

.text-secondary {
    color: #6c757d !important;
}

.form-check-input:checked {
    background-color: #007bff;
    border-color: #007bff;
}
</style>
