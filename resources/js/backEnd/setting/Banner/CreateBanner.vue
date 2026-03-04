<template>
    <div class="container-fluid mt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark mb-0">Create Banner</h4>
            <router-link :to="{ name: 'BannerIndex' }" class="btn btn-pink rounded-pill px-3 shadow-sm text-white"><i
                    class="fa-solid fa-tags me-1"></i>Banner
                Manage</router-link>
        </div>

        <div class="card border-0 shadow-custom rounded-4 p-4">
            <form @submit.prevent="storeBannerData" enctype="multipart/form-data">
                <div class="row g-4">
                    <!-- Name Field -->
                    <div class="col-6">
                        <label class="form-label fw-semibold text-muted">Banner Name <small
                                class="text-danger">*</small></label>
                        <select v-model="form.category_id" class="form-select text-muted">
                            <option value="">Select...</option>
                            <option v-for="bannerCat in BannerCategory" :key="bannerCat.id" :value="bannerCat.id">{{
                                bannerCat.name }}
                            </option>
                        </select>
                        <small class="text-danger" v-if="errors.category_id">{{ errors.category_id[0] }}</small>
                    </div>

                    <!-- Link Field -->
                    <div class="col-6">
                        <label class="form-label fw-semibold text-muted">Link</label>
                        <input type="text" class="form-control" placeholder="" v-model="form.link" />
                        <small class="text-danger" v-if="errors.link">{{ errors.link[0] }}</small>
                    </div>

                    <!-- Image Field -->
                    <div class="col-6">
                        <label class="form-label fw-semibold text-muted">Banner Image <small
                                class="text-danger">*</small></label>
                        <input type="file" class="form-control" placeholder="" @change="onImageChange" />
                        <small class="text-danger" v-if="errors.image">{{ errors.image[0] }}</small>
                    </div>
                    <!-- Image view -->
                    <div class="col-6">
                        <img :src="imagePreview" style="height: 100px; width: 100px; object-fit: cover;"
                            class="rounded border shadow-sm">
                    </div>


                    <!-- Status & Front View Switches -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted d-block">Status</label>
                        <div class="form-check form-switch custom-switch">
                            <input class="form-check-input" type="checkbox" v-model="form.status" />
                            <small class="text-danger"></small>
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
                category_id: '',
                image: null,
                link: '',
                status: true,
            },
            BannerCategory: [],
            errors: {},
            imagePreview: null,
        }
    },
    created() {
        this.getBannerCategory();
    },
    methods: {
        getBannerCategory() {
            axios.get('/api/banner')
                .then((res) => {
                    this.BannerCategory = res.data.bannerCategory;
                });
        },
        onImageChange(e) {
            let file = e.target.files[0];
            if (file.size > 2097152) {
                Notification.error();
                e.target.value = '';
            } else {
                this.form.image = file;
                this.imagePreview = URL.createObjectURL(file);
            }
        },
        imageRemove() {
            this.imagePreview = null;
        },
        storeBannerData() {
            let data = new FormData();

            data.append('category_id', this.form.category_id);
            data.append('image', this.form.image);
            data.append('link', this.form.link || '');
            data.append('status', this.form.status ? 1 : 0);

            axios.post('/api/banner', data)
                .then((res) => {
                    Notification.success();
                    this.$router.push({ name: 'BannerIndex' });
                }).catch((error) => {
                    this.errors = error.response.data.errors;
                });
        }
    }
}
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

.form-select:focus {
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