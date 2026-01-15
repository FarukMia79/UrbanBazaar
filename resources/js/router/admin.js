import AdminLayout from '../layouts/AdminLayout.vue';
import dashboard from '../backEnd/admin/dashboard.vue';
import AllOrder from '../backEnd/order/AllOrder.vue';
import PendingOrder from '../backEnd/order/PendingOrder.vue';
import CompletedOrder from '../backEnd/order/CompletedOrder.vue';
import CancelledOrder from '../backEnd/order/CancelledOrder.vue';
import ProductManage from '../backEnd/product/ProductManage.vue';
import ProductPriceManage from '../backEnd/product/ProductPriceManage.vue';
import CategoryIndex from '../backEnd/category/CategoryIndex.vue';
import SubCategoryIndex from '../backEnd/subcategory/SubCategoryIndex.vue';
import ChildcategoryManage from '../backEnd/childcategory/ChildcategoryManage.vue';
import SizeIndex from '../backEnd/size/SizeIndex.vue';
import CouponManagement from '../backEnd/coupon/CouponManagement.vue';

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
            { path: 'products/manage', name: 'ProductManage', component: ProductManage},
            { path: 'products/price-edit', name: 'ProductPriceManage', component: ProductPriceManage},
            { path: 'categories/manage', name: 'CategoryIndex', component: CategoryIndex},
            { path: 'subcategories/manage', name: 'SubCategoryIndex', component: SubCategoryIndex},
            { path: 'chilcategories/manage', name: 'ChildcategoryManage', component: ChildcategoryManage},
            { path: 'sizes/manage', name: 'SizeIndex', component: SizeIndex},
            { path: 'coupon', name: 'CouponManagement', component: CouponManagement},
        ],
    },
];