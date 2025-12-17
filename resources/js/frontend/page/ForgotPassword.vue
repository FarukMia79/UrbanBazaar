<template>
    <div id="content">
        <section class="auth-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <div class="form-content">
                            <p class="auth-title">Forgot Password</p>
                            <form action="https://ecom.shariatpur.shop/customer/forgot-verify" method="POST"
                                data-parsley-validate="">
                                <input type="hidden" name="_token" value="fzizel6OXvVl6vA9NZBa3ksxau6J2eaFTthG4tOf">
                                <div class="form-group mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="number" id="phone" class="form-control " name="phone" value=""
                                        required>
                                </div>
                                <!-- col-end -->
                                <div class="form-group mb-3">
                                    <button class="submit-btn">submit</button>
                                </div>
                                <!-- col-end -->
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

<style lang="scss" scoped></style>