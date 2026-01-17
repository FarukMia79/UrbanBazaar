import AdminLayout from '../layouts/AdminLayout.vue';
import dashboard from '../backEnd/admin/dashboard.vue';
import AllOrder from '../backEnd/order/AllOrder.vue';
import PendingOrder from '../backEnd/order/PendingOrder.vue';
import CompletedOrder from '../backEnd/order/CompletedOrder.vue';
import CancelledOrder from '../backEnd/order/CancelledOrder.vue';
import ProductManage from '../backEnd/product/ProductManage.vue';
import ProductCreate from '../backEnd/product/ProductCreate.vue';
import ProductEdit from '../backEnd/product/ProductEdit.vue';
import ProductPriceManage from '../backEnd/product/ProductPriceManage.vue';
import CategoryIndex from '../backEnd/category/CategoryIndex.vue';
import CategoryCreate from '../backEnd/category/CategoryCreate.vue';
import CategoryEdit from '../backEnd/category/CategoryEdit.vue';
import SubCategoryIndex from '../backEnd/subcategory/SubCategoryIndex.vue';
import ChildcategoryManage from '../backEnd/childcategory/ChildcategoryManage.vue';
import SizeIndex from '../backEnd/size/SizeIndex.vue';
import CouponManagement from '../backEnd/coupon/CouponManagement.vue';
import AllReviews from '../backEnd/review/AllReviews.vue';
import UsersManage from '../backEnd/users/UsersManage.vue';
import CustomerManage from '../backEnd/users/CustomerManage.vue';
import GeneralSetting from '../backEnd/setting/generalSetting/GeneralSetting.vue';
import PixelsManage from '../backEnd/setting/PixelsManage/PixelsManage.vue';
import BannerCategory from '../backEnd/setting/Banner/BannerCategory.vue';

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
            { path: 'products/create', name: 'ProductCreate', component: ProductCreate},
            { path: 'products/edit', name: 'ProductEdit', component: ProductEdit},
            { path: 'products/price-edit', name: 'ProductPriceManage', component: ProductPriceManage},
            { path: 'categories/manage', name: 'CategoryIndex', component: CategoryIndex},
            { path: 'categories/create', name: 'CategoryCreate', component: CategoryCreate},
            { path: 'categories/edit', name: 'CategoryEdit', component: CategoryEdit},
            { path: 'subcategories/manage', name: 'SubCategoryIndex', component: SubCategoryIndex},
            { path: 'chilcategories/manage', name: 'ChildcategoryManage', component: ChildcategoryManage},
            { path: 'sizes/manage', name: 'SizeIndex', component: SizeIndex},
            { path: 'coupon', name: 'CouponManagement', component: CouponManagement},
            { path: 'reviews', name: 'AllReviews', component: AllReviews},
            { path: 'users/manage', name: 'UsersManage', component: UsersManage},
            { path: 'customer/manage', name: 'CustomerManage', component: CustomerManage},
            { path: 'setting/manage', name: 'GeneralSetting', component: GeneralSetting},
            { path: 'pixel/manage', name: 'PixelsManage', component: PixelsManage},
            { path: 'banner-category/manage', name: 'BannerCategory', component: BannerCategory},
        ],
    },
];