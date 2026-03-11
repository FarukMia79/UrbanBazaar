<template>
    <div class="container-fluid mt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark mb-0">Update General Setting</h4>
            <router-link :to="{ name: 'GeneralSetting' }" class="btn btn-pink rounded-pill px-3 shadow-sm text-white"><i
                    class="fa-solid fa-database me-1"></i>General Setting
                Manage</router-link>
        </div>

        <div class="card border-0 shadow-custom rounded-4 p-4">
            <form @submit.prevent="updateSettings" enctype="multipart/form-data">
                <div class="row g-3">
                    <!-- Site Name -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Site Name *</label>
                        <input v-model="form.site_name" type="text" class="form-control" placeholder="" />
                    </div>


                    <div class="col-md-5">
                        <label class="form-label fw-semibold text-muted">White Logo *</label>
                        <div class="mb-2">
                            <div class="input-group">
                                <input @change="onFileChange($event, 'white')" type="file" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <img :src="previews.white" style="height: 100px; width: 100px; object-fit: cover;"
                            class="rounded border shadow-sm">
                    </div>

                    <div class="col-md-5">
                        <label class="form-label fw-semibold text-muted">Dark Logo *</label>
                        <div class="mb-2">
                            <div class="input-group">
                                <input @change="onFileChange($event, 'dark')" type="file" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <img :src="previews.dark" style="height: 100px; width: 100px; object-fit: cover;"
                            class="rounded border shadow-sm">
                    </div>

                    <div class="col-md-5">
                        <label class="form-label fw-semibold text-muted">Favicon *</label>
                        <div class="mb-2">
                            <div class="input-group">
                                <input @change="onFileChange($event, 'favicon')" type="file" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <img :src="previews.favicon" style="height: 100px; width: 100px; object-fit: cover;"
                            class="rounded border shadow-sm">
                    </div>



                    <!-- Status -->
                    <div class="col-md-2">
                        <label class="form-label fw-semibold text-muted d-block">Status</label>
                        <div class="form-check form-switch custom-switch">
                            <input v-model="form.status" class="form-check-input" type="checkbox" checked />
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
                id: null,
                site_name: '',
                white_logo: null,
                dark_logo: null,
                favicon: null,
                status: true,
            },
            previews: {
                white: '',
                dark: '',
                favicon: ''
            },
            id: this.$route.params.id
        }
    },
    mounted() {
        this.getSettings();
    },
    methods: {
        getSettings() {
            axios.get(`/api/general/setting/${this.id}`)
                .then(res => {
                    this.form.id = res.data.id;
                    this.form.site_name = res.data.site_name;
                    this.form.status = res.data.status == 1;
                    this.previews.white = '/' + res.data.white_logo;
                    this.previews.dark = '/' + res.data.dark_logo;
                    this.previews.favicon = '/' + res.data.favicon;
                });
        },
        onFileChange(e, type) {
            let file = e.target.files[0];
            if (type === 'white') {
                this.form.white_logo = file;
                this.previews.white = URL.createObjectURL(file);
            } else if (type === 'dark') {
                this.form.dark_logo = file;
                this.previews.dark = URL.createObjectURL(file);
            } else if (type === 'favicon') {
                this.form.favicon = file;
                this.previews.favicon = URL.createObjectURL(file);
            }
        },
        updateSettings() {
            let formData = new FormData();
            formData.append('_method', 'PUT');
            formData.append('site_name', this.form.site_name);
            formData.append('status', this.form.status ? 1 : 0);

            if (this.form.white_logo) formData.append('white_logo', this.form.white_logo);
            if (this.form.dark_logo) formData.append('dark_logo', this.form.dark_logo);
            if (this.form.favicon) formData.append('favicon', this.form.favicon);

            axios.post(`/api/general/setting/${this.id}`, formData)
                .then(res => {
                    Notification.success('Updated successfully!');
                    this.$router.push({ name: 'GeneralSetting' });
                })
                .catch(err => console.log(err.response.data));
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
