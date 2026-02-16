<template>
    <div class="container-fluid mt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark mb-0">Product Create</h4>
            <router-link :to="{ name: 'ProductManage' }" class="btn btn-pink rounded-pill px-3 shadow-sm text-white"><i
                    class="fa-solid fa-database me-1"></i>Product
                Manage</router-link>
        </div>

        <div class="card border-0 shadow-custom rounded-4 p-4">
            <form @submit.prevent="submitProduct" enctype="multipart/form-data">
                <div class="row g-3">
                    <!-- Product Name & Categories -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Product Name *</label>
                        <input type="text" class="form-control" placeholder="" v-model="form.name" />
                        <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Categories *</label>
                        <select class="form-select" v-model="form.category_id" @change="getSubCategories">
                            <option value="">Select..</option>
                            <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
                        </select>
                    </div>

                    <!-- Sub & Child Categories -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">SubCategories (Optional)</label>
                        <select class="form-select" v-model="form.subcategory_id">
                            <option value="">Choose ...</option>
                            <option v-for="sub in subcategories" :key="sub.id" :value="sub.id">{{ sub.name }}</option>
                        </select>
                    </div>

                    <!-- Brands, Purchase Price, Old Price -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Brands</label>
                        <select class="form-select" v-model="form.brand_id">
                            <option value="">Select..</option>
                            <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{ brand.name }}</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted">Price *</label>
                        <input type="text" class="form-control" v-model="form.price" />
                    </div>

                    <!-- New Price, Stock, Image -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted">discount_price *</label>
                        <input type="text" class="form-control" v-model="form.discount_price" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted">Stock *</label>
                        <input type="text" class="form-control" v-model="form.stock_quantity" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Image *</label>
                        <div class="mb-2">
                            <div class="input-group">
                                <input type="file" class="form-control" @change="onMainImageChange" />
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <img :src="imagePreview" style="height: 100px; width: 100px; object-fit: cover;"
                            class="rounded border shadow-sm">
                    </div>

                    <!-- Multi Image Gallery -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Gallery Images (Multiple) *</label>
                        <div class="mb-2">
                            <div class="input-group">
                                <!-- এখানে multiple অ্যাট্রিবিউট যোগ করা হয়েছে -->
                                <input type="file" class="form-control" @change="onMultiImageChange" multiple />
                            </div>
                        </div>
                    </div>

                    <!-- Gallery Preview -->
                    <div class="col-6 mt-2">
                        <p class="small text-muted mb-1">Gallery Preview ({{ multiImagePreviews.length }} images):</p>
                        <div class="d-flex gap-2 flex-wrap">
                            <img v-for="(img, index) in multiImagePreviews" :key="index" :src="img"
                                style="width: 60px; height: 60px; object-fit: cover;" class="rounded border shadow-sm">
                        </div>
                    </div>

                    <!-- SKU, Unit, Video -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted">Product Code (SKU) *</label>
                        <input type="text" class="form-control" v-model="form.product_code" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted">Product Unit (Optional)</label>
                        <input type="text" class="form-control" v-model="form.unit" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted">Product Video (Optional)</label>
                        <input type="text" class="form-control" v-model="form.video_url" />
                    </div>

                    <!-- Size -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Size (Option)</label>
                        <select class="form-select" v-model="form.size_ids" multiple>
                            <option value="">Select..</option>
                            <option v-for="size in sizes" :key="size.id" :value="size.id">{{ size.name }}</option>
                        </select>
                    </div>
                    <!-- Color -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Color (Optional)</label>
                        <select class="form-select" v-model="form.color_ids" multiple>
                            <option value="">Select..</option>
                            <option v-for="color in colors" :key="color.id" :value="color.id">{{ color.name }}</option>
                        </select>
                    </div>

                    <!-- Description (Text Editor Area) -->
                    <div class="col-12">
                        <label class="form-label fw-semibold text-muted">Description *</label>
                        <div class="editor-container border rounded">
                            <div class="editor-toolbar bg-light border-bottom p-2 d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-bold"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-italic"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-list"></i>
                                </button>
                            </div>
                            <textarea class="form-control border-0" rows="4" placeholder="Enter Your Text Here"
                                v-model="form.description"></textarea>
                        </div>
                    </div>

                    <!-- Status & Hot Deals Switches -->
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

                <!-- Submit Button -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-teal px-4 text-white">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
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
                video_url: '',
                color_ids: [],
                size_ids: [],
                description: '',
                status: true,
                hot_deals: false,
            },
            categories: [],
            subcategories: [],
            brands: [],
            colors: [],
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
            axios.get('/api/color').then(res => this.colors = res.data);
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
        },

        submitProduct() {
            let data = new FormData();

            Object.keys(this.form).forEach(key => {
                if (key !== 'multi_images' && key !== 'image' && key !== 'color_ids' && key !== 'size_ids') {
                    data.append(key, this.form[key] || '');
                }
            });

            if (this.form.image) data.append('image', this.form.image);
            data.append('status', this.form.status ? 1 : 0);
            data.append('hot_deals', this.form.hot_deals ? 1 : 0);

            data.append('color_ids', this.form.color_ids.join(','));
            data.append('size_ids', this.form.size_ids.join(','));

            this.form.multi_images.forEach(file => {
                data.append('multi_images[]', file);
            });

            axios.post('/api/product', data)
                .then(res => {
                    Notification.success('Product created successfully!');
                    this.$router.push({ name: 'ProductManage' });
                })
                .catch(err => {
                    if (err.response && err.response.status === 422) {
                        this.errors = err.response.data.errors;
                    } else {
                        console.log(err.response);
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
