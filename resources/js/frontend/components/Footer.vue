<template>
    <div>
        <footer>
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <div class="footer-about">
                                <a href="index.html">
                                    <img :src="`/uploads/settings/1761407468-jnsshopbd-(1).webp`" alt="" />
                                </a>
                                <p>8050 Goshairhat , Shariatpur , Dhaka</p>
                                <a href="tel:+8809638365975" class="footer-hotlint btn-call"> <i
                                        class="fas fa-phone-alt"></i> +8809638365975 </a>
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-sm-3 mb-3 mb-sm-0 col-6">
                            <div class="footer-menu">
                                <ul>
                                    <li class="title"><a>Useful Link</a></li>
                                    <li>
                                        <a href="site/contact-us.html"> <a href="site/contact-us.html">Contact
                                                Us</a></a>
                                    </li>
                                    <li><a href="page/order-procedure.html">Order procedure</a></li>
                                    <li><a href="page/delivery-rules.html">Delivery Rules</a></li>
                                    <li><a href="page/return-policy.html">Return Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-sm-2 mb-3 mb-sm-0 col-6">
                            <div class="footer-menu">
                                <ul>
                                    <li class="title"><a>Link</a></li>
                                    <li>
                                        <a href="page/terms-%26-conditions.html">Terms &amp; Conditions</a>
                                    </li>
                                    <li>
                                        <a href="page/privacy-policy.html">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="page/ad.html">ad</a>
                                    </li>
                                    <li>
                                        <a href="page/return-policy-2.html">Return Policy 2</a>
                                    </li>
                                    <li>
                                        <a href="page/clothing.html">Clothing</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- col end -->
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <div class="footer-menu">
                                <ul>
                                    <li class="title stay_conn"><a>Stay Connected</a></li>
                                </ul>
                                <ul class="social_link">
                                    <li class="social_list">
                                        <a class="mobile-social-link"
                                            href="https://www.facebook.com/Khaleditsolution"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="social_list">
                                        <a class="mobile-social-link" href="https://blue.khaleditsolution.xyz/"><i
                                                class="fab fa-google"></i></a>
                                    </li>
                                    <li class="social_list">
                                        <a class="mobile-social-link" href="https://blue.khaleditsolution.xyz/"><i
                                                class="fab fa-Youtube-f"></i></a>
                                    </li>
                                </ul>
                                <div class="d_app">
                                    <h2>Download App</h2>
                                    <a href="#">
                                        <img :src="`/frontEnd/images/app-download.png`" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- col end -->
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="copyright">
                                <p>Copyright © 2025 phpx.shop. All rights reserved. Design & Developed By <router-link
                                        class="developer-badge">Faruk</router-link></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div class="footer_nav">
            <ul>
                <li>
                    <a class="toggle">
                        <span>
                            <i class="fa-solid fa-bars"></i>
                        </span>
                        <span>Category</span>
                    </a>
                </li>

                <li>
                    <a href="https://api.whatsapp.com/send?phone=+8801790647979&amp;text=Hello">
                        <span>
                            <i class="fa fa-whatsapp"></i>
                        </span>
                        <span>Message</span>
                    </a>
                </li>

                <li class="mobile_home">
                    <a href="index.html">
                        <span><i class="fa-solid fa-home"></i></span> <span>Home</span>
                    </a>
                </li>

                <li>
                    <a href="customer/checkout.html">
                        <span>
                            <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                        <span>Cart (<b class="mobilecart-qty">0</b>)</span>
                    </a>
                </li>
                <li>
                    <a href="customer/login.html">
                        <span>
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <span>Login</span>
                    </a>
                </li>
            </ul>
        </div>


        <div class="scrolltop" style="">
            <div class="scroll">
                <i class="fa fa-angle-up"></i>
            </div>
        </div>


        <a href="https://api.whatsapp.com/send?phone=+8801743839807&amp;text=Hello" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>
        <!-- /. fixed sidebar -->

        <div id="custom-modal"></div>
        <div id="page-overlay"></div>
        <div id="loading">
            <div class="custom-loader"></div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped></style>