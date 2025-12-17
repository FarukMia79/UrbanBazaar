import UserLayout from '../layouts/UserLayout.vue';
import index from '../frontend/index.vue';
import UserLogin from '../frontend/page/UserLogin.vue';
import UserSingup from '../frontend/page/UserSingup.vue';
import ForgotPassword from '../frontend/page/ForgotPassword.vue';

export default [
    {
        path: '/',
        component: UserLayout,
        children: [
            { path: '', name: 'index', component: index },
            { path: 'login', name: 'UserLogin', component: UserLogin },
            { path: 'register', name: 'UserSingup', component: UserSingup },
            { path: 'forgot-password', name: 'ForgotPassword', component: ForgotPassword }
        ],
    }
]