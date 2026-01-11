import UserLayout from '../layouts/UserLayout.vue';
import index from '../frontend/index.vue';
import UserLogin from '../frontend/page/auth/UserLogin.vue';
import UserSingup from '../frontend/page/auth/UserSingup.vue';
import ForgotPassword from '../frontend/page/auth/ForgotPassword.vue';
import SingleProduct from '../frontend/page/product/SingleProduct.vue';
import HotDeal from '../frontend/page/HotDeal/HotDeal.vue';
import CheckOut from '../frontend/page/CheckOut.vue';
import Contact from '../frontend/page/Contact.vue';
import OrderTrack from '../frontend/page/OrderTrack.vue';
import CategoryPage from '../frontend/page/CategoryPage.vue';
import ReturnPolicy from '../frontend/page/ReturnPolicy.vue';

export default [
    {
        path: '/',
        component: UserLayout,
        children: [
            { path: '', name: 'index', component: index },
            { path: 'hot-deal', name: 'HotDeal', component: HotDeal},
            { path: 'contact', name: 'Contact', component: Contact},
            { path: 'single-product', name: 'SingleProduct', component: SingleProduct},
            { path: 'category', name: 'CategoryPage', component: CategoryPage},
            { path: 'checkout', name: 'CheckOut', component: CheckOut},
            { path: 'order-track', name: 'OrderTrack', component: OrderTrack},
            { path: 'return-policy', name: 'ReturnPolicy', component: ReturnPolicy},
            { path: 'login', name: 'UserLogin', component: UserLogin },
            { path: 'register', name: 'UserSingup', component: UserSingup },
            { path: 'forgot-password', name: 'ForgotPassword', component: ForgotPassword }
        ],
    }
]