<template>
    <div class="container-fluid mt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark mb-0">Product Create</h4>
            <router-link :to="{ name: 'ProductManage' }" class="btn btn-pink rounded-pill px-3 shadow-sm text-white">
                <i class="fa-solid fa-database me-1"></i>Product Manage
            </router-link>
        </div>

        <div class="card border-0 shadow-custom rounded-4 p-4">
            <form @submit.prevent="submitProduct" enctype="multipart/form-data">
                <div class="row g-3">
                    <!-- Product Name & Categories -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Product Name *</label>
                        <input type="text" class="form-control" v-model="form.name" />
                        <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Categories *</label>
                        <select class="form-select" v-model="form.category_id" @change="getSubCategories">
                            <option value="">Select..</option>
                            <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">SubCategories (Optional)</label>
                        <select class="form-select" v-model="form.subcategory_id">
                            <option value="">Choose ...</option>
                            <option v-for="sub in subcategories" :key="sub.id" :value="sub.id">{{ sub.name }}</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Brands</label>
                        <select class="form-select" v-model="form.brand_id">
                            <option value="">Select..</option>
                            <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{ brand.name }}</option>
                        </select>
                    </div>

                    <!-- Prices & Stock -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted">Price *</label>
                        <input type="text" class="form-control" v-model="form.price" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted">Discount Price</label>
                        <input type="text" class="form-control" v-model="form.discount_price" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted">Stock *</label>
                        <input type="text" class="form-control" v-model="form.stock_quantity" />
                    </div>

                    <!-- Main Image -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Main Image *</label>
                        <input type="file" class="form-control" @change="onMainImageChange" />
                    </div>
                    <div class="col-md-6">
                        <img :src="imagePreview" v-if="imagePreview"
                            style="height: 80px; width: 80px; object-fit: cover;" class="rounded border">
                    </div>

                    <!-- Multi Image Gallery & Color Variant Selection -->
                    <div class="col-md-12 border-top pt-3">
                        <label class="form-label fw-bold text-dark">Gallery Images & Color Selection *</label>
                        <p class="small text-muted">Upload gallery images and tick the checkbox below each image if it
                            represents a different color/variant.</p>
                        <input type="file" class="form-control mb-3" @change="onMultiImageChange" multiple />

                        <div class="row g-2" v-if="multiImagePreviews.length">
                            <div v-for="(img, index) in multiImagePreviews" :key="index" class="col-auto text-center">
                                <div class="position-relative border rounded p-1 bg-white shadow-sm">
                                    <img :src="img" style="width: 100px; height: 100px; object-fit: cover;"
                                        class="rounded">
                                    <div class="mt-2 p-1 bg-light rounded">
                                        <input type="checkbox" :value="index" v-model="form.selected_variant_indices"
                                            class="form-check-input">
                                        <label class="small ms-1 fw-bold">As Color</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SKU & Video -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Product Code (SKU)</label>
                        <input type="text" class="form-control" v-model="form.product_code" />
                    </div>
                    <!-- Tags Field -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Product Tags (Comma separated) *</label>
                        <input type="text" class="form-control" v-model="form.tags"
                            placeholder="e.g. t-shirt, cotton, red, summer" />
                        <small class="text-muted">কমা দিয়ে আলাদা করে লিখুন (যেমন: ব্যাগ, লেডিস ব্যাগ,
                            হ্যান্ডব্যাগ)</small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Unit</label>
                        <input type="text" class="form-control" v-model="form.unit" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Video URL</label>
                        <input type="text" class="form-control" v-model="form.video_url" />
                    </div>

                    <!-- Sizes Only (Color is now handled by images) -->
                    <div class="col-md-12">
                        <label class="form-label fw-semibold text-muted">Select Sizes</label>
                        <div class="d-flex flex-wrap gap-3 border p-3 rounded bg-light">
                            <div v-for="size in sizes" :key="size.id" class="form-check">
                                <input class="form-check-input" type="checkbox" :value="size.id" v-model="form.size_ids"
                                    :id="'size' + size.id">
                                <label class="form-check-label" :for="'size' + size.id">{{ size.name }}</label>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-12">
                        <label class="form-label fw-semibold text-muted">Description *</label>
                        <textarea class="form-control" rows="6" v-model="form.description"
                            placeholder="Enter product details..."></textarea>
                    </div>

                    <!-- Status -->
                    <div class="col-md-2">
                        <label class="form-label fw-semibold text-muted d-block">Status</label>
                        <div class="form-check form-switch custom-switch">
                            <input class="form-check-input" type="checkbox" v-model="form.status" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold text-muted d-block">Hot Deals</label>
                        <div class="form-check form-switch custom-switch">
                            <input class="form-check-input" type="checkbox" v-model="form.hot_deals" />
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-teal px-5 text-white fw-bold">Create Product</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            form: {
                name: '',
                category_id: '',
                subcategory_id: '',
                brand_id: '',
                price: '',
                discount_price: '',
                stock_quantity: '',
                image: null,
                multi_images: [],
                product_code: '',
                unit: '',
                tags: '',
                video_url: '',
                size_ids: [],
                description: '',
                status: true,
                hot_deals: false,
                selected_variant_indices: [],
            },
            categories: [],
            subcategories: [],
            brands: [],
            sizes: [],
            imagePreview: null,
            multiImagePreviews: [],
            errors: {}
        };
    },
    methods: {
        loadInitialData() {
            axios.get('/api/category').then(res => this.categories = res.data);
            axios.get('/api/brand').then(res => this.brands = res.data);
            axios.get('/api/size').then(res => this.sizes = res.data);
        },
        getSubCategories() {
            if (this.form.category_id) {
                axios.get('/api/get-subcategories/' + this.form.category_id)
                    .then(res => this.subcategories = res.data);
            }
        },
        onMainImageChange(e) {
            let file = e.target.files[0];
            this.form.image = file;
            this.imagePreview = URL.createObjectURL(file);
        },
        onMultiImageChange(e) {
            let files = e.target.files;
            this.form.multi_images = Array.from(files);
            this.multiImagePreviews = this.form.multi_images.map(file => URL.createObjectURL(file));
            this.form.selected_variant_indices = [];
        },
        submitProduct() {
            let data = new FormData();

            Object.keys(this.form).forEach(key => {
                if (!['multi_images', 'image', 'selected_variant_indices', 'size_ids'].includes(key)) {
                    data.append(key, this.form[key] || '');
                }
            });

            if (this.form.image) data.append('image', this.form.image);
            data.append('status', this.form.status ? 1 : 0);
            data.append('hot_deals', this.form.hot_deals ? 1 : 0);
            data.append('size_ids', this.form.size_ids.join(','));
            data.append('variant_indices', this.form.selected_variant_indices.join(','));

            this.form.multi_images.forEach(file => {
                data.append('multi_images[]', file);
            });

            axios.post('/api/product', data)
                .then(res => {
                    Notification.success('Product created successfully!');
                    this.$router.push({ name: 'ProductManage' });
                })
                .catch(err => {
                    if (err.response.status === 422) {
                        this.errors = err.response.data.errors;
                    }
                });
        }
    },
    mounted() {
        this.loadInitialData();
    }
};
</script>
<style scoped>
.shadow-custom {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important;
}

.btn-pink {
    background-color: #f06292;
    border: none;
}

.btn-pink:hover,
.btn-pink:active {
    background-color: #d81b60 !important;
    color: #fff !important;
}

.btn-purple {
    background-color: #6f42c1;
    border: none;
}

.btn-purple:hover {
    background-color: #5e35b1;
    color: #fff;
}

.btn-teal {
    background-color: #1abc9c;
    border: none;
}

.btn-teal:hover {
    background-color: #16a085;
    color: #fff;
}

.form-control,
.form-select {
    border: 1px solid #dee2e6;
    border-radius: 6px;
    padding: 10px 12px;
    font-size: 14px;
}

.form-control:focus,
.form-select:focus {
    border-color: #1abc9c;
    box-shadow: 0 0 0 0.2rem rgba(26, 188, 156, 0.1);
}

.form-label {
    font-size: 14px;
    margin-bottom: 6px;
}

.custom-switch .form-check-input {
    width: 3em;
    height: 1.5em;
    cursor: pointer;
}

.custom-switch .form-check-input:checked {
    background-color: #28a745;
    border-color: #28a745;
}

.editor-container {
    background: #fff;
}
</style>
