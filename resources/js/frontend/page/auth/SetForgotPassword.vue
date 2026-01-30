<template>
    <div id="content">
        <section class="auth-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <div class="form-content p-4 shadow rounded bg-white">
                            <p
                                class="auth-title h4 mb-4 text-center primary-color-text"
                            >
                                <i class="fa-solid fa-lock me-2"></i>New
                                Password
                            </p>

                            <form @submit.prevent="updatePassword">
                                <div class="form-group mb-3">
                                    <label
                                        for="email"
                                        class="primary-color-text mb-1"
                                        >New Password</label
                                    >
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control"
                                        placeholder="Enter your registered password"
                                        v-model="formData.password"
                                        required
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.password"
                                        >{{ errors.password[0] }}</small
                                    >
                                </div>

                                <div class="form-group mb-4">
                                    <label
                                        for="password_confirmation"
                                        class="primary-color-text mb-1"
                                        >Confirm Password</label
                                    >
                                    <input
                                        type="password"
                                        id="password_confirmation"
                                        class="form-control"
                                        placeholder="Confirm your password"
                                        v-model="formData.password_confirmation"
                                        required
                                    />
                                </div>

                                <div class="form-group mb-3">
                                    <button
                                        type="submit"
                                        class="btn btn-register-purple w-100"
                                        :disabled="loading"
                                    >
                                        {{ loading ? "Saving..." : "Save" }}
                                    </button>
                                </div>

                                <div class="text-center mt-3">
                                    <router-link
                                        :to="{ name: 'UserLogin' }"
                                        class="text-decoration-none primary-color-text"
                                    >
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
import axios from "axios";

export default {
    data() {
        return {
            formData: {
                token: null,
                email: null,
                password: null,
                password_confirmation: null,
            },
            errors: {},
            loading: false,
        };
    },
    created() {
        this.formData.token = this.$route.query.token;
        this.formData.email = this.$route.query.email;

        if (!this.formData.token || !this.formData.email) {
            Notification.error("Invalid or expired reset link!");
            this.$router.push({ name: "UserLogin" });
        }
    },
    methods: {
        updatePassword() {
            this.loading = true;
            this.errors = {};

            axios
                .post("/api/password/reset", this.formData)
                .then((res) => {
                    this.loading = false;
                    Notification.success(
                        "Password updated successfully! Please login.",
                    );
                    this.$router.push({ name: "UserLogin" });
                })
                .catch((error) => {
                    this.loading = false; 

                    if (error.response) {
                        if (error.response.status === 422) {
                            if (error.response.data.errors) {
                                this.errors = error.response.data.errors;
                            }
                            if (error.response.data.message) {
                                Notification.error(error.response.data.message);
                            }
                        } else {
                            Notification.error(
                                error.response.data.message ||
                                    "Something went wrong!",
                            );
                        }
                    }
                });
        },
    },
};
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
    color: #3f0051 !important;
}

.btn-register-purple {
    background-color: #3f0051;
    border-color: #3f0051;
    color: white;
    font-weight: bold;
}

.btn-register-purple:hover {
    background-color: #750377;
}
</style>
