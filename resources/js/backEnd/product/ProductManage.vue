<template lang="">
    <div class="container-fluid mt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark mb-0">Product Manage</h4>
            <button class="btn btn-pink rounded-pill px-3 shadow-sm text-white">
                <i class="fa-solid fa-cart-shopping me-1"></i> Add Product
            </button>
        </div>

        <div class="card border-0 shadow-custom rounded-4 p-4">
            <div class="row g-3 mb-4 align-items-center">
                <div class="col-md-6 d-flex gap-2">
                    <button class="btn btn-teal-solid btn-sm px-3">
                        <i class="fa-solid fa-thumbs-up me-1"></i> Deal
                    </button>
                    <button class="btn btn-red-solid btn-sm px-3">
                        <i class="fa-solid fa-thumbs-down me-1"></i> Deal
                    </button>
                    <button
                        class="btn btn-purple-solid btn-sm px-3"
                    >
                        <i class="fa-solid fa-thumbs-up me-1"></i> Active
                    </button>
                    <button
                        class="btn btn-orange-solid btn-sm px-3"
                    >
                        <i class="fa-solid fa-thumbs-down me-1"></i> Inactive
                    </button>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <div class="ms-auto d-flex">
                    <input type="text" class="form-control form-control-sm rounded-0 border-end-0" placeholder="Search" style="width: 200px;">
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
                            <th width="120">Action</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Deal & Feature</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                />
                            </td>
                            <td>1</td>
                            <td>
                                <div class="d-flex gap-2 fs-5">
                                    <i
                                        class="fa-regular fa-thumbs-down text-muted cursor-pointer"
                                    ></i>
                                    <i
                                        class="fa-regular fa-edit text-muted cursor-pointer"
                                    ></i>
                                    <i
                                        class="fa-solid fa-trash text-muted cursor-pointer"
                                    ></i>
                                </div>
                            </td>
                            <td>sneakers</td>
                            <td>Sneakers</td>
                            <td>
                                <img
                                    src="https://via.placeholder.com/40"
                                    class="rounded-circle border"
                                    alt="prod"
                                    style="
                                        width: 45px;
                                        height: 45px;
                                        object-fit: cover;
                                    "
                                />
                            </td>
                            <td>2500</td>
                            <td>100</td>
                            <td class="small">
                                Hot Deals : No <br />
                                Top Feature : No
                            </td>
                            <td>
                                <span class="badge badge-active">Active</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style lang="css">
.product-table {
    color: #212529 !important;
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
</style>
