import AdminLayout from '../layouts/AdminLayout.vue';
import dashboard from '../backEnd/admin/dashboard.vue';

export default [
    {
        path: '/admin',
        component: AdminLayout,
        children: [
            { path: '', name: 'dashboard', component: dashboard},
        ],
    },
];