import UserLayout from '../layouts/UserLayout.vue';
import Home from '../frontend/page/Home.vue';

export default [
    {
        path: '/',
        component: UserLayout,
        children: [
            { path: '', name: 'Home', component: Home },
        ],
    }
]