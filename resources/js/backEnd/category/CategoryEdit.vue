<template>
    <div class="container-fluid mt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark mb-0">Category Update</h4>
            <router-link :to="{ name: 'CategoryIndex' }" class="btn btn-pink rounded-pill px-3 shadow-sm text-white"><i
                    class="fa-solid fa-database me-1"></i>Category
                Manage</router-link>
        </div>

        <div class="card border-0 shadow-custom rounded-4 p-4">
            <form @submit.prevent="updateCategory" enctype="multipart/form-data">
                <div class="row g-4">
                    <!-- Name Field -->
                    <div class="col-12">
                        <label class="form-label fw-semibold text-muted">Name *</label>
                        <input type="text" class="form-control" placeholder="" v-model="form.name" />
                        <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                    </div>

                    <!-- Image Field -->
                    <div class="col-6">
                        <label class="form-label fw-semibold text-muted">Image *</label>
                        <input type="file" class="form-control" @change="onImageChange" />
                        <small class="text-danger" v-if="errors.image">{{ errors.image[0] }}</small>
                    </div>
                    <div class="col-6">
                        <img :src="imagePreview" style="height: 100px; width: 100px; object-fit: cover;"
                            class="rounded border shadow-sm">
                    </div>

                    <!-- Meta Title Field -->
                    <div class="col-12">
                        <label class="form-label fw-semibold text-muted">Meta Title</label>
                        <input type="text" class="form-control" v-model="form.meta_title" />
                        <small class="text-danger" v-if="errors.meta_title">{{ errors.meta_title[0] }}</small>
                    </div>

                    <!-- Meta Description (Text Editor Area) -->
                    <div class="col-12">
                        <label class="form-label fw-semibold text-muted">Meta Description*</label>
                        <div class="editor-container border rounded">
                            <!-- এডিটর টুলবার (শুধুমাত্র ডিজাইন) -->
                            <div class="editor-toolbar bg-light border-bottom p-2 d-flex flex-wrap gap-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-magic"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-bold"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-italic"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-underline"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-eraser"></i>
                                </button>
                                <div class="border-end mx-1"></div>
                                <select class="form-select form-select-sm d-inline-block w-auto">
                                    <option>sans-serif</option>
                                </select>
                                <div class="border-end mx-1"></div>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-font"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-list-ul"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-align-left"></i>
                                </button>
                                <div class="border-end mx-1"></div>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-table"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-link"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-image"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-video"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-code"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-question"></i>
                                </button>
                            </div>
                            <textarea class="form-control border-0" rows="5" placeholder="Enter Your Text Here"
                                v-model="form.meta_description"></textarea>
                            <small class="text-danger" v-if="errors.meta_description">{{ errors.meta_description[0]
                                }}</small>
                        </div>
                    </div>

                    <!-- Status & Front View Switches -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted d-block">Status</label>
                        <div class="form-check form-switch custom-switch">
                            <input class="form-check-input" type="checkbox" checked v-model="form.status" />
                            <small class="text-danger" v-if="errors.status">{{ errors.status[0] }}</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted d-block">Front View</label>
                        <div class="form-check form-switch custom-switch">
                            <input class="form-check-input" type="checkbox" v-model="form.front_view" />
                            <small class="text-danger" v-if="errors.front_view">{{ errors.front_view[0] }}</small>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-5">
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
                image: null,
                meta_title: '',
                meta_description: '',
                status: true,
                front_view: false
            },

            imagePreview: null,
            errors: {},
            id: this.$route.params.id,
        }
    },
    created() {
        this.getCategoryData();
    },
    methods: {
        getCategoryData() {
            axios.get(`/api/category/${this.id}`)
                .then((res) => {
                    this.form.name = res.data.name;
                    this.form.meta_title = res.data.meta_title;
                    this.form.meta_description = res.data.meta_description;
                    this.form.status = res.data.status == 1;
                    this.form.front_view = res.data.front_view == 1;
                    this.imagePreview = '/' + res.data.image;
                }).catch((error) => {
                    console.log('gateCategoryData:', error);
                });
        },

        onImageChange(e) {
            let file = e.target.files[0];
            if (file.size > 2097152) {
                Notification.image_validation();
            } else {
                this.form.image = file;
                this.imagePreview = URL.createObjectURL(file);
            }
        },

        updateCategory() {
            let data = new FormData();
            data.append('name', this.form.name);
            data.append('meta_title', this.form.meta_title || '');
            data.append('meta_description', this.form.meta_description || '');
            data.append('status', this.form.status ? 1 : 0);
            data.append('front_view', this.form.front_view ? 1 : 0);

            if (this.form.image) {
                data.append('image', this.form.image);
            }

            data.append('_method', 'PUT');

            axios.post(`/api/category/${this.id}`, data)
                .then((res) => {
                    Notification.success("Category Updated!");
                    this.$router.push({ name: 'CategoryIndex' });
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                    Notification.error(error.response.data.message);
                });
        }
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
    border-radius: 4px;
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
    color: #333;
}

.form-control:focus {
    border-color: #1abc9c;
    box-shadow: 0 0 0 0.2rem rgba(26, 188, 156, 0.1);
}

.form-label {
    font-size: 13px;
    margin-bottom: 8px;
}

.custom-switch .form-check-input {
    width: 3.2em;
    height: 1.6em;
    cursor: pointer;
}

.custom-switch .form-check-input:checked {
    background-color: #28a745;
    border-color: #28a745;
}

.editor-toolbar .btn {
    border-color: #ddd;
    color: #666;
}

.editor-toolbar .btn:hover {
    background-color: #f0f0f0;
}


input[type=file]::file-selector-button {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    margin-right: 15px;
    padding: 4px 12px;
    cursor: pointer;
}
</style>
