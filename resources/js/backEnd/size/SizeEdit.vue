<template>
    <div class="container-fluid mt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark mb-0">Size Update</h4>
            <router-link :to="{ name: 'SizeIndex' }" class="btn btn-pink rounded-pill px-3 shadow-sm text-white"><i
                    class="fa-solid fa-ruler-combined me-1"></i>Size
                Manage</router-link>
        </div>

        <div class="card border-0 shadow-custom rounded-4 p-4">
            <form @submit.prevent="uodateSizeData" enctype="multipart/form-data">
                <div class="row g-4">
                    <!-- Size Field -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Size *</label>
                        <input type="text" class="form-control" placeholder="" v-model="form.name"/>
                        <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                    </div>

                    <!-- Status & Front View Switches -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted d-block">Status</label>
                        <div class="form-check form-switch custom-switch">
                            <input class="form-check-input" type="checkbox" v-model="form.status" />
                            <small class="text-danger" v-if="errors.status">{{ errors.status[0] }}</small>
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
                status: true,
            },
            errors: {},
            id: this.$route.params.id,
        }
    },
    created(){
        this.getSizeData();
    },
    methods: {
        getSizeData(){
            axios.get(`/api/size/${this.id}`)
            .then((res)=>{
                this.form.name = res.data.name;
                this.form.status = res.data.status == 1;
            }).catch((error)=>{
                console.error(error);
            })
        },

        uodateSizeData() {
            let data = new FormData();

            data.append('name', this.form.name);
            data.append('status', this.form.status ? 1 : 0);

            data.append('_method', 'PUT');

            axios.post(`/api/size/${this.id}`, data)
            .then((res)=>{
                this.$router.push({ name: 'SizeIndex' });
                Notification.success();
            }).catch((error)=>{
                if(error.response && error.response.data){
                    Notification.error(error.response.data.message);
                } else{
                    Notification.error();
                }
                this.errors = error.response.data.errors;
                console.error(error);
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
</style>
