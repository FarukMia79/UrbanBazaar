import AdminLayout from '../layouts/AdminLayout.vue';
import dashboard from '../backEnd/admin/dashboard.vue';
import AllOrder from '../backEnd/order/AllOrder.vue';
import PendingOrder from '../backEnd/order/PendingOrder.vue';
import CompletedOrder from '../backEnd/order/CompletedOrder.vue';
import CancelledOrder from '../backEnd/order/CancelledOrder.vue';

export default [
    {
        path: '/admin',
        component: AdminLayout,
        children: [
            { path: '', name: 'dashboard', component: dashboard},
            { path: 'order/all', name: 'AllOrder', component: AllOrder},
            { path: 'order/pending', name: 'PendingOrder', component: PendingOrder},
            { path: 'order/completed', name: 'CompletedOrder', component: CompletedOrder},
            { path: 'order/cancelled', name: 'CancelledOrder', component: CancelledOrder},
        ],
    },
];