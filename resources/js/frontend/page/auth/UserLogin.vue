<template>
    <div id="content">
        <section class="auth-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-6 col-lg-5">
                        <div
                            class="form-content p-4 rounded-4 shadow-lg"
                            style="
                                background: #ffffff;
                                border: 1px solid #750377;
                            "
                        >
                            <div class="text-center mb-4">
                                <div
                                    class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="
                                        width: 60px;
                                        height: 60px;
                                        background-color: #750377 !important;
                                    "
                                >
                                    <i
                                        class="fa-solid fa-user-lock text-white fa-lg"
                                    ></i>
                                </div>
                                <h4
                                    class="auth-title mt-3 mb-0 fw-semibold text-dark"
                                >
                                    Customer Login
                                </h4>
                            </div>

                            <form @submit.prevent="LoginData">
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label"
                                        >Email</label
                                    >
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"
                                            ><i
                                                class="fa-solid fa-envelope"
                                                style="color: #750377"
                                            ></i
                                        ></span>
                                        <input
                                            type="email"
                                            id="email"
                                            class="form-control"
                                            name="email"
                                            value=""
                                            required
                                            v-model="FormData.email"
                                        />
                                        <small class="text-danger" v-if="FormData.email">{{ errors.email[0] }}</small>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="form-label"
                                        >Password</label
                                    >
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"
                                            ><i
                                                class="fa-solid fa-lock"
                                                style="color: #750377"
                                            ></i
                                        ></span>
                                        <input
                                            type="password"
                                            id="password"
                                            class="form-control"
                                            name="password"
                                            required
                                            v-model="FormData.password"
                                        />
                                        <small class="text-danger" v-if="FormData.password">{{ errors.password[0] }}</small>
                                    </div>
                                </div>

                                <div class="text-end mb-3">
                                    <router-link
                                        :to="{ name: 'ForgotPassword' }"
                                        class="text-decoration-none"
                                        style="color: #3f0051"
                                        ><i
                                            class="fa-solid fa-unlock"
                                            style="color: #750377"
                                        ></i>
                                        Forgot Password?</router-link
                                    >
                                </div>

                                <div class="form-group mb-3">
                                    <button
                                        class="btn w-100 shadow-sm"
                                        style="
                                            background-color: #750377;
                                            color: white;
                                        "
                                    >
                                        <i
                                            class="fa-solid fa-right-to-bracket me-1"
                                        ></i>
                                        Login
                                    </button>
                                </div>
                            </form>

                            <div class="register-now text-center mt-3">
                                <p class="mb-2 text-muted">
                                    Don't have an account?
                                </p>
                                <router-link
                                    style="
                                        border-color: #3f0051;
                                        color: #3f0051;
                                    "
                                    class="btn btn-outline-primary px-4"
                                    :to="{ name: 'UserSingup' }"
                                    ><i class="fa-solid fa-user-plus me-1"></i>
                                    Register Now</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content end -->
</template>

<script>
import axios from "axios";
import AppStorage from "../../../Helpers/AppStorage";
import Notification from "../../../Helpers/Notification";
export default {
    data() {
        return {
            FormData: {
                email: null,
                password: null,
            },
            errors: {},
        };
    },
    methods: {
        LoginData(){
            axios.post('/api/user/login', this.FormData)
            .then((response)=>{
                const token = response.data.access_token;
                const user = response.data.user;

                AppStorage.store(token, user);

                axios.defaults.headers.common['Authorization'] = `bearer ${token}`;

                this.$router.push({ name: 'index'});
            }).catch((error)=>{
                this.errors = error.response.data.errors;
            })
        }
    },
};
</script>

<style scoped></style>
