import PublicLayout from '../layouts/PublicLayout.vue';
import Home from '../public/page/Home.vue';

export default [
    {
        path: '/',
        component: PublicLayout,
        children: [
            { path: '', name: 'Home', component: Home},
        ],
    }
]