<template lang="">
    <div id="content">
        <section
            class="auth-section py-5"
            style="
                background-color: #f7f0fc;
                min-height: 80vh;
                display: flex;
                align-items: center;
            "
        >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-8 col-md-6 col-lg-5">
                        <div
                            class="form-content p-4 p-md-5 shadow-lg rounded"
                            style="
                                background: #fff;
                                border-top: 5px solid #750377;
                            "
                        >
                            <p
                                class="auth-title text-center mb-4"
                                style="
                                    font-size: 26px;
                                    font-weight: 700;
                                    color: #750377;
                                "
                            >
                                Track Your Order
                            </p>
                            <p class="text-center text-muted mb-4 small">
                                Enter your phone number and invoice ID to view
                                the status of your order.
                            </p>

                            <form
                                action="https://ecom.shariatpur.shop/customer/order-track/result"
                                data-parsley-validate=""
                            >
                                <input
                                    type="hidden"
                                    name="_token"
                                    value="y7aDCAV3se8t4D9O7zmHvVTyqAEWJLJlKXFMjaO8"
                                />
                                <div class="form-group mb-4">
                                    <label
                                        for="phone"
                                        class="form-label font-weight-bold"
                                        style="color: #444"
                                        >Phone Number</label
                                    >
                                    <div class="input-group input-group-modern">
                                        <span
                                            class="input-group-text"
                                            style="
                                                background-color: #750377;
                                                color: #fff;
                                                border: 1px solid #750377;
                                                border-right: none;
                                            "
                                        >
                                            <i class="fas fa-mobile-alt"></i>
                                        </span>
                                        <input
                                            type="number"
                                            id="phone"
                                            class="form-control"
                                            name="phone"
                                            value=""
                                            placeholder="Enter Phone Number"
                                            required
                                        />
                                    </div>
                                </div>

                                <div class="form-group mb-5">
                                    <label
                                        for="invoice_id"
                                        class="form-label font-weight-bold"
                                        style="color: #444"
                                        >Invoice ID</label
                                    >
                                    <div class="input-group input-group-modern">
                                        <span
                                            class="input-group-text"
                                            style="
                                                background-color: #750377;
                                                color: #fff;
                                                border: 1px solid #750377;
                                                border-right: none;
                                            "
                                        >
                                            <i class="fas fa-receipt"></i>
                                        </span>
                                        <input
                                            type="text"
                                            id="invoice_id"
                                            class="form-control"
                                            name="invoice_id"
                                            value=""
                                            placeholder="Enter Your Invoice ID (e.g., 10001)"
                                        />
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button
                                        type="submit"
                                        class="submit-btn btn w-100 py-2 font-weight-bold"
                                        style="
                                            background-color: #750377;
                                            color: #ffffff;
                                            border: none;
                                            font-size: 18px;
                                            border-radius: 6px;
                                            transition: background-color 0.3s
                                                ease;
                                        "
                                    >
                                        Track Order Status
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
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
export default {};
</script>
<style lang="css">
/* Button Hover Effect */
.submit-btn:hover {
    background-color: #5d025e !important;
}

/* Modern Input Focus Effect */
.input-group-modern .form-control:focus {
    border-color: #750377 !important;
    box-shadow: 0 0 0 0.25rem rgba(117, 3, 119, 0.25) !important;
}

/* Ensure input-group-text remains sharp */
.input-group-modern .input-group-text {
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
}
</style>
