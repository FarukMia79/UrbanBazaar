import UserLayout from '../layouts/UserLayout.vue';
import index from '../frontend/index.vue';
import offer from '../frontend/page/offer/Offer.vue'
import UserLogin from '../frontend/page/auth/UserLogin.vue';
import UserSingup from '../frontend/page/auth/UserSingup.vue';
import ForgotPassword from '../frontend/page/auth/ForgotPassword.vue';
import SingleProduct from '../frontend/page/product/SingleProduct.vue';

export default [
    {
        path: '/',
        component: UserLayout,
        children: [
            { path: '', name: 'index', component: index },
            { path: 'offer', name: 'offer', component: offer},
            { path: 'single-product', name: 'SingleProduct', component: SingleProduct},
            { path: 'login', name: 'UserLogin', component: UserLogin },
            { path: 'register', name: 'UserSingup', component: UserSingup },
            { path: 'forgot-password', name: 'ForgotPassword', component: ForgotPassword }
        ],
    }
]