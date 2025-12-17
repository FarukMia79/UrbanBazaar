<template>
    <div id="content">
        <section class="auth-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <div class="form-content p-4 shadow rounded bg-white">
                            <p class="auth-title h4 mb-4 text-center primary-color-text">

                                <i class="fa-solid fa-user-plus primary-color-text"></i> Customer Registration
                            </p>
                            <form action="https://ecom.shariatpur.shop/customer/store" method="POST"
                                data-parsley-validate="">
                                <input type="hidden" name="_token" value="fzizel6OXvVl6vA9NZBa3ksxau6J2eaFTthG4tOf">
                                <div class="form-group mb-3">
                                    <label for="name" class="primary-color-text">

                                        <i class="fa-solid fa-user primary-color-text"></i> Full Name
                                    </label>
                                    <input type="text" id="name" class="form-control " name="name" value=""
                                        placeholder="Enter your name" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="phone" class="primary-color-text">

                                        <i class="fa-solid fa-phone primary-color-text"></i> Mobile Number
                                    </label>
                                    <input type="number" id="phone" class="form-control " name="phone" value=""
                                        placeholder="Enter mobile number" required>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password" class="primary-color-text">

                                        <i class="fa-solid fa-lock primary-color-text"></i> Password
                                    </label>
                                    <input type="password" id="password" class="form-control " name="password"
                                        placeholder="Enter password" required>
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
export default {

}
</script>

<style scoped>
/* Custom styles to ensure the registration form aligns with the Purple/Golden theme */
.auth-section {
    /* Use a light/white background for the section, similar to the main content area */
    background-color: #f8f8f8;
    padding: 50px 0;
    min-height: 80vh;
    display: flex;
    align-items: center;
}

.form-content {
    /* Card Background is White, text on white will be black (default) or the primary color */
    border: 1px solid #750377;
    /* Border matching Vibrant Purple */
    box-shadow: 0 10px 30px rgba(63, 0, 81, 0.15) !important;
    /* Deep Purple shadow effect */
}

/* Primary color for titles, labels, icons, and links: Deep Purple (#3F0051) */
.primary-color-text {
    color: #3F0051 !important;
}

/* Button styles: Deep Purple background with White Text */
.btn-register-purple {
    background-color: #3F0051;
    /* Deep Purple BG */
    border-color: #3F0051;
    color: white;
    /* White text for contrast */
    font-weight: bold;
    transition: all 0.3s ease;
}

.btn-register-purple:hover {
    background-color: #750377;
    /* Vibrant Purple on hover */
    border-color: #750377;
}
</style>