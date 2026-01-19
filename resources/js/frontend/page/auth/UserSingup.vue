<template>
    <div id="content">
        <section class="auth-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <div class="form-content p-4 shadow rounded bg-white">
                            <p class="auth-title h4 mb-4 text-center primary-color-text">

                                <i class="fa-solid fa-user-plus primary-color-text"></i> Sign Up
                            </p>
                            <form @submit.prevent="UserInsert">
                                <div class="form-group mb-3">
                                    <label for="name" class="primary-color-text">

                                        <i class="fa-solid fa-user primary-color-text"></i> Full Name
                                    </label>
                                    <input type="text" id="name" class="form-control " name="name"
                                        placeholder="Enter your name" required v-model="FormData.name">
                                    <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email" class="primary-color-text">

                                        <i class="fa-solid fa-envelope primary-color-text"></i> Email
                                    </label>
                                    <input type="email" id="email" class="form-control " name="email"
                                        placeholder="Enter email" required v-model="FormData.email">
                                    <span class="text-danger " v-if="errors.email">{{ errors.email[0] }}</span>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password" class="primary-color-text">

                                        <i class="fa-solid fa-lock primary-color-text"></i> Password
                                    </label>
                                    <input type="password" id="password" class="form-control " name="password"
                                        placeholder="Enter password" required v-model="FormData.password">
                                    <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password_confirmation" class="primary-color-text">

                                        <i class="fa-solid fa-lock primary-color-text"></i> Confirm Password
                                    </label>
                                    <input type="password" id="password_confirmation" class="form-control "
                                        name="password_confirmation" placeholder="Confirm password" required
                                        v-model="FormData.password_confirmation">
                                    <small class="text-danger" v-if="errors.password_confirmation">{{
                                        errors.password_confirmation[0] }}</small>
                                </div>


                                <button class="btn btn-register-purple w-100">
                                    <i class="fa-solid fa-user-plus"></i> Register
                                </button>

                                <div class="register-now no-account mt-3 text-center">
                                    <p class="primary-color-text">

                                        <i class="fa-solid fa-circle-question primary-color-text"></i> Already
                                        registered?
                                    </p>
                                    <router-link :to="{ name: 'UserLogin' }"
                                        class="text-decoration-none primary-color-text"><i
                                            class="fa-solid fa-right-to-bracket primary-color-text"></i> Login
                                        here</router-link>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content end -->
</template>

<script>
import axios from 'axios';
import Notification from '../../../Helpers/Notification'
export default {
    data() {
        return {
            FormData: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
            },
            errors: {}
        }
    },
    methods: {
        UserInsert() {
            axios.post('/api/register', this.FormData)
                .then(() => {
                    this.$router.push({ name: 'UserLogin' });
                    Notification.success();
                }).catch((error) => {
                    this.errors = error.response.data.errors;
                })
        }
    }
}
</script>

<style scoped>
.auth-section {
    background-color: #f8f8f8;
    padding: 50px 0;
    min-height: 80vh;
    display: flex;
    align-items: center;
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
    transition: all 0.3s ease;
}

.btn-register-purple:hover {
    background-color: #750377;
    border-color: #750377;
}
</style>