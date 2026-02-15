<template lang="">
    <div class="container-fluid mt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark mb-0">Sizes Manage</h4>
            <router-link :to="{ name: 'SizeCreate'}" class="btn btn-pink rounded-pill px-3 shadow-sm text-white"><i class="fa-solid fa-ruler-combined me-1"></i> Add Size</router-link>
        </div>

        <div class="card border-0 shadow-custom rounded-4 p-4">
            <div class="row g-3 mb-4 align-items-center">
                <div class="col-md-6 d-flex gap-2">
                    <button class="btn btn-teal-solid btn-sm px-3">
                        <i class="fa-solid fa-copy me-1"></i> Copy
                    </button>
                    <button class="btn btn-red-solid btn-sm px-3">
                        <i class="fa-solid fa-print me-1"></i> Print
                    </button>
                    <button
                        class="btn btn-purple-solid btn-sm px-3"
                    >
                        <i class="fa-solid fa-file-pdf me-1"></i> PDF
                    </button>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <div class="ms-auto d-flex">
                    <input v-model="searchTerm" type="text" class="search-input rounded-0 border-end-0" placeholder="Search" style="width: 200px;">
                    <button class="btn btn-search btn-sm rounded-0 text-white px-3">Search</button>
                </div>
                </div>
            </div>


            <div class="table-responsive">
                <table class="table table-hover align-middle product-table">
                    <thead class="table-light">
                        <tr>
                            <th width="40">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                />
                            </th>
                            <th width="50">SL</th>
                            <th width="150">Action</th>
                            <th>Size</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(size, index) in filterSearch" :key="size.id">
                            <td>
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                />
                            </td>
                            <td>{{index + 1}}</td>
                            <td>
                                <div class="d-flex gap-2 fs-5">
                                    <router-link :to="{name: 'SizeEdit', params: {id: size.id}}"
                                        class="fa-regular fa-edit text-muted cursor-pointer me-2 action-edit"
                                    ></router-link>
                                    <a @click="deleteSizeData(size.id)"
                                        class="fa-solid fa-trash text-muted cursor-pointer action-trash"
                                    ></a>
                                </div>
                            </td>
                            <td>{{ size.name }}</td>
                            <td>
                                <span v-if="size.status == 1" class="badge badge-active">Active</span>
                                <span v-else class="badge badge-danger text-white">Inactive</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div
                class="d-flex justify-content-between align-items-center mt-1 flex-wrap gap-2 text-muted small"
            >
                <div>Showing 1 to 6 of 6 entries</div>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled">
                            <a class="page-link border-0 text-muted" href="#"
                                ><i class="fa-solid fa-chevron-left"></i
                            ></a>
                        </li>
                        <li class="page-item">
                            <a
                                class="page-link border-0 rounded-circle active-page text-white ms-2"
                                href="#"
                                >1</a
                            >
                        </li>
                        <li class="page-item">
                            <a
                                class="page-link border-0 text-muted ms-2"
                                href="#"
                                ><i class="fa-solid fa-chevron-right"></i
                            ></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            sizes: [],
            searchTerm: ''
        }
    },
    created(){
        this.getSizeData();
    },
    computed: {
        filterSearch(){
            return this.sizes.filter(si=>{
                return si.name.toLowerCase().match(this.searchTerm.toLocaleLowerCase());
            });
        }
    },
    methods: {
        getSizeData(){
            axios.get('/api/size')
            .then((res)=>{
                this.sizes = res.data;
            }).catch((error)=>{
                console.error(error);
            });
        },
        deleteSizeData(sizeId){
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result)=>{
                if(result.isConfirmed){
                    axios.delete('/api/size/'+ sizeId)
                    .then((res)=>{
                        this.sizes = this.sizes.filter(si=>{
                            return si.id != sizeId;
                        });
                        Notification.success('Size deleted successfully!');
                    }).catch((error)=>{
                        this.$router.push({name: 'SizeIndex'});
                        Notification.error();
                    });
                }
            });
        }
    }
};
</script>
<style lang="css" scoped>
.product-table {
    color: #212529 !important;
}

.action-trash:hover {
    color: #ef5350 !important;
    cursor: pointer;
}

.action-edit:hover{
    color: #00bfa5 !important;
    cursor: pointer;
}

.shadow-custom {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important;
}


.btn-pink { background-color: #f06292; border: none; }
.btn-teal-solid { background-color: #00bfa5; color: white; border: none; }
.btn-red-solid { background-color: #ef5350; color: white; border: none; }
.btn-purple-solid { background-color: #6a1b9a; color: white; border: none; }
.btn-orange-solid { background-color: #ffca28; color: white; border: none; }
.btn-search { background-color: #00cae3; border: none; }


.btn-pink:hover, .btn-pink:active { background-color: #d81b60 !important; color: #fff !important; }
.btn-teal-solid:hover, .btn-teal-solid:active { background-color: #00897b !important; color: #fff !important; }
.btn-red-solid:hover, .btn-red-solid:active { background-color: #d32f2f !important; color: #fff !important; }
.btn-purple-solid:hover, .btn-purple-solid:active { background-color: #4a148c !important; color: white !important; }
.btn-orange-solid:hover, .btn-orange-solid:active { background-color: #f57c00  !important; color: white !important; }
.btn-search:hover, .btn-search:active { background-color: #00acc1 !important; color: white !important; }



.product-table thead th {
    background-color: #f8faff;
    color: #333;
    font-weight: 600;
    padding: 15px 10px;
}

.badge-active {
    background-color: #e0f2f1;
    color: #00bfa5;
    padding: 5px 10px;
    border-radius: 4px;
}

.product-table { border-collapse: separate; border-spacing: 0 5px; }

.active-page {
    background-color: #5e72e4 !important;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.search-input:focus {
    border-color: #00cae3 !important;
    box-shadow: 0 0 0 3px rgba(26, 188, 156, 0.1) !important; 
    outline: none !important; 
    background-color: #fff; 
}

.search-input {
    border: 1px solid #ced4da;
    border-radius: 4px;
    padding: 6px 12px;
    transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}
</style>
