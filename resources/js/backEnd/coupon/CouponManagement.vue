<template lang="">
    <div class="container-fluid mt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark mb-0">Coupon Management</h4>
            <button class="btn btn-pink rounded-pill px-3 shadow-sm text-white">
                <i class="fa-solid fa-database me-1"></i> Add Coupon
            </button>
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
                    <button class="btn btn-purple-solid btn-sm px-3">
                        <i class="fa-solid fa-file-pdf me-1"></i> PDF
                    </button>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <div class="ms-auto d-flex">
                        <input
                            type="text"
                            class="search-input rounded-0 border-end-0"
                            placeholder="Search"
                            style="width: 200px"
                        />
                        <button
                            class="btn btn-search btn-sm rounded-0 text-white px-3"
                        >
                            Search
                        </button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle coupon-table">
                    <thead class="table-light">
                        <tr>
                            <th width="150">Actions</th>
                            <th width="150">Code</th>
                            <th width="150">Amount</th>
                            <th width="150">Type</th>
                            <th width="200">Expired Date</th>
                            <th width="200">Min Purchase</th>
                            <th width="150">Max Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr>
                            <td>
                                <div class="d-flex gap-2 fs-5">
                                    <router-link :to="{ name: ''}" class="text-muted cursor-pointer me-2 action-edit">
                                        <i class="fa-regular fa-edit"></i>
                                    </router-link>
                                    <a class="text-muted cursor-pointer action-trash">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <td class="text-secondary">asdSF</td>
                            <td class="text-secondary">10.00</td>
                            <td class="text-secondary">Percent</td>
                            <td class="text-secondary">2025-11-27</td>
                            <td class="text-secondary">10.00</td>
                            <td class="text-secondary">40.00</td>
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
export default {};
</script>
<style lang="css" scoped>
.shadow-custom {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important;
}

.btn-pink {
    background-color: #f06292;
    border: none;
}

.btn-teal-solid {
    background-color: #00bfa5;
    color: white;
    border: none;
}

.btn-red-solid {
    background-color: #ef5350;
    color: white;
    border: none;
}

.btn-purple-solid {
    background-color: #6a1b9a;
    color: white;
    border: none;
}

.btn-orange-solid {
    background-color: #ffca28;
    color: white;
    border: none;
}

.btn-search {
    background-color: #00cae3;
    border: none;
}

.btn-pink:hover,
.btn-pink:active {
    background-color: #d81b60 !important;
    color: #fff !important;
}

.btn-teal-solid:hover,
.btn-teal-solid:active {
    background-color: #00897b !important;
    color: #fff !important;
}

.btn-red-solid:hover,
.btn-red-solid:active {
    background-color: #d32f2f !important;
    color: #fff !important;
}

.btn-purple-solid:hover,
.btn-purple-solid:active {
    background-color: #4a148c !important;
    color: white !important;
}

.btn-orange-solid:hover,
.btn-orange-solid:active {
    background-color: #f57c00 !important;
    color: white !important;
}

.btn-search:hover,
.btn-search:active {
    background-color: #00acc1 !important;
    color: white !important;
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


.action-trash:hover {
    color: #ef5350 !important;
    cursor: pointer;
}

.action-edit:hover {
    color: #00bfa5 !important;
    cursor: pointer;
}

.coupon-table thead th {
    background-color: #f8faff;
    color: #555;
    font-weight: 600;
    padding: 15px 12px;
    font-size: 14px;
    border-bottom: none;
}

.coupon-table tbody td {
    padding: 12px;
    font-size: 14px;
    color: #666;
    border-color: #f0f0f0 !important;
}

.coupon-table td {
    border-right: 1px solid #f0f0f0;
}

.coupon-table td:last-child {
    border-right: none;
}

.active-page {
    background-color: #5e72e4 !important;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
