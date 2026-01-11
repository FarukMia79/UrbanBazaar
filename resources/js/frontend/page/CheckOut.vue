<template lang="">
    <div id="content">
        <section class="chheckout-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 cus-order-2">
                        <div class="checkout-shipping">
                            <form
                                action="https://ecom.shariatpur.shop/customer/order-save"
                                method="POST"
                                data-parsley-validate=""
                            >
                                <input
                                    type="hidden"
                                    name="_token"
                                    value="y7aDCAV3se8t4D9O7zmHvVTyqAEWJLJlKXFMjaO8"
                                />
                                <div
                                    class="card"
                                    style="
                                        background: linear-gradient(
                                            135deg,
                                            #f3f4f6,
                                            #e0eafc
                                        );
                                        border-radius: 0px;
                                    "
                                >
                                    <div class="card-header">
                                        <h6>
                                            <i
                                                class="fas fa-clipboard-list"
                                            ></i>
                                            To confirm your order, fill in the
                                            information and click the "Order"
                                            button.
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Name Field -->
                                            <div class="col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="name"
                                                        ><i
                                                            class="fas fa-user"
                                                        ></i>
                                                        Enter your name *</label
                                                    >
                                                    <input
                                                        type="text"
                                                        id="name"
                                                        name="name"
                                                        class="form-control"
                                                        value=" "
                                                        required
                                                        style="
                                                            background: linear-gradient(
                                                                to right,
                                                                #ffffff,
                                                                #f3f4f6
                                                            );
                                                            border-radius: 0px;
                                                        "
                                                    />
                                                </div>
                                            </div>

                                            <!-- Phone Field -->
                                            <div class="col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="phone"
                                                        ><i
                                                            class="fas fa-phone-alt"
                                                        ></i>
                                                        Enter your mobile number
                                                        *</label
                                                    >
                                                    <input
                                                        type="text"
                                                        id="number"
                                                        name="phone"
                                                        minlength="11"
                                                        maxlength="11"
                                                        pattern="0[0-9]+"
                                                        class="form-control"
                                                        value=""
                                                        required
                                                        style="
                                                            background: linear-gradient(
                                                                to right,
                                                                #ffffff,
                                                                #f3f4f6
                                                            );
                                                            border-radius: 0px;
                                                        "
                                                    />
                                                </div>
                                            </div>

                                            <!-- Address Field -->
                                            <div class="col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="address"
                                                        ><i
                                                            class="fas fa-map-marker-alt"
                                                        ></i>
                                                        Enter address *</label
                                                    >
                                                    <input
                                                        type="text"
                                                        id="address"
                                                        name="address"
                                                        class="form-control"
                                                        value=" "
                                                        required
                                                        style="
                                                            background: linear-gradient(
                                                                to right,
                                                                #ffffff,
                                                                #f3f4f6
                                                            );
                                                            border-radius: 0px;
                                                        "
                                                    />
                                                </div>
                                            </div>

                                            <!-- Area Field -->
                                            <div class="col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="area"
                                                        ><i
                                                            class="fas fa-location-dot"
                                                        ></i>
                                                        Select delivery area
                                                        *</label
                                                    >
                                                    <select
                                                        id="area"
                                                        name="area"
                                                        class="form-control"
                                                        style="
                                                            background: linear-gradient(
                                                                to right,
                                                                #ffffff,
                                                                #f3f4f6
                                                            );
                                                            border-radius: 0px;
                                                        "
                                                        required
                                                    >
                                                        <option value="2">
                                                            সারা বাংলাদেশ ১৫০
                                                            টাকা ডেলিভারি চার্জ
                                                        </option>

                                                        <option value="4">
                                                            ঢাকার ভিতরে ৮০ টাকা
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Payment Method -->
                                            <div class="col-sm-12">
                                                <div class="radio_payment">
                                                    <label id="payment_method"
                                                        ><i
                                                            class="fas fa-money-bill-wave"
                                                        ></i>
                                                        Payment Method
                                                        (optional)</label
                                                    >
                                                </div>
                                                <div class="payment-methods">
                                                    <div
                                                        class="form-check p_cash"
                                                    >
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="payment_method"
                                                            id="inlineRadio1"
                                                            value="Cash On Delivery"
                                                            checked
                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="inlineRadio1"
                                                        >
                                                            Cash On Delivery
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="form-check p_shurjo"
                                                    >
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="payment_method"
                                                            id="inlineRadio3"
                                                            value="Bkash"
                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="inlineRadio3"
                                                        >
                                                            Bkash
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="form-check p_shurjo"
                                                    >
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="payment_method"
                                                            id="inlineRadio3"
                                                            value="Rocket"
                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="inlineRadio3"
                                                        >
                                                            Rocket
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="col-sm-12 mt-3">
                                                <div class="form-group">
                                                    <button
                                                        class="order_place btn btn-primary w-100"
                                                        type="submit"
                                                    >
                                                        <i
                                                            class="fas fa-check-circle"
                                                        ></i>
                                                        Place Confirm Order
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row end -->
                                    </div>
                                    <!-- card-body end -->
                                </div>
                                <!-- card end -->
                            </form>
                        </div>
                    </div>
                    <!-- col end -->
                    <div class="col-sm-7 cust-order-1">
                        <div class="cart_details table-responsive-sm">
                            <div
                                class="card"
                                style="
                                    background: linear-gradient(
                                        to right,
                                        #f2f5ff,
                                        #e4e2ff
                                    );
                                    border-radius: 0px;
                                    border: 1px solid #135deg;
                                "
                            >
                                <div class="card-header">
                                    <h5>Order information</h5>
                                </div>
                                <div class="card-body cartlist">
                                    <table
                                        class="cart_table table table-bordered table-striped text-center mb-0"
                                    >
                                        <thead>
                                            <tr>
                                                <th style="width: 20%">
                                                    Delete
                                                </th>
                                                <th style="width: 40%">
                                                    Product
                                                </th>
                                                <th style="width: 20%">
                                                    Quantity
                                                </th>
                                                <th style="width: 20%">
                                                    Price
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody></tbody>
                                        <tfoot>
                                            <tr>
                                                <th
                                                    colspan="3"
                                                    class="text-end px-4"
                                                >
                                                    Total
                                                </th>
                                                <td class="px-4">
                                                    <span id="net_total"
                                                        ><span class="alinur"
                                                            >৳ </span
                                                        ><strong
                                                            >0</strong
                                                        ></span
                                                    >
                                                </td>
                                            </tr>
                                            <tr>
                                                <th
                                                    colspan="3"
                                                    class="text-end px-4"
                                                >
                                                    Delivery charges
                                                </th>
                                                <td class="px-4">
                                                    <span
                                                        id="cart_shipping_cost"
                                                        ><span class="alinur"
                                                            >৳ </span
                                                        ><strong
                                                            >150</strong
                                                        ></span
                                                    >
                                                </td>
                                            </tr>
                                            <tr>
                                                <th
                                                    colspan="3"
                                                    class="text-end px-4"
                                                >
                                                    Total price
                                                </th>
                                                <td class="px-4">
                                                    <span id="grand_total"
                                                        ><span class="alinur"
                                                            >৳ </span
                                                        ><strong
                                                            >150</strong
                                                        ></span
                                                    >
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <form id="coupon_form">
                                        <div class="form-group">
                                            <label for="coupon_code"
                                                >Have a coupon?</label
                                            >
                                            <input
                                                type="text"
                                                id="coupon_code"
                                                class="form-control"
                                                placeholder="Enter coupon code"
                                            />
                                        </div>
                                        <button
                                            type="button"
                                            id="apply_coupon"
                                            class="btn btn-primary btn-sm mt-2"
                                        >
                                            Apply Coupon
                                        </button>
                                        <div
                                            id="coupon-message"
                                            class="mt-2"
                                        ></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col end -->
                </div>
            </div>
        </section>

        <!-- duplicate order modal -->

        <div
            class="modal fade"
            id="duplicateOrderModal"
            tabindex="-1"
            aria-labelledby="duplicateOrderModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="duplicateOrderModalLabel">
                            ⚠️Duplicate Order Detective Alert
                        </h5>
                        <button
                            type="button"
                            class="btn-close text-white"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body text-center">
                        <p></p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <a
                            href="https://wa.me/88017?text=%E0%A6%B9%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%B2%E0%A7%8B%21+%E0%A6%86%E0%A6%AE%E0%A6%BF+%E0%A6%8F%E0%A6%95%E0%A6%9F%E0%A6%BF+%E0%A6%85%E0%A6%B0%E0%A7%8D%E0%A6%A1%E0%A6%BE%E0%A6%B0+%E0%A6%A6%E0%A6%BF%E0%A6%A4%E0%A7%87+%E0%A6%9A%E0%A6%BE%E0%A6%87%E0%A5%A4"
                            target="_blank"
                            class="btn btn-success"
                        >
                            <i class="fab fa-whatsapp"></i> Contact on WhatsApp
                        </a>
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content end -->
</template>
<script>
export default {};
</script>
<style lang=""></style>
