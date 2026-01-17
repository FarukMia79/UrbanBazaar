<template>
    <div class="container-fluid mt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark mb-0">Users Manage</h4>
            <button class="btn btn-pink rounded-pill px-3 shadow-sm text-white">
                <i class="fa-solid fa-user me-1"></i> Add User
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
                <table class="table table-hover align-middle user-table">
                    <thead>
                        <tr class="table-light text-muted">
                            <th width="80">
                                SL
                                <i
                                    class="fa-solid fa-sort ms-1 small opacity-50"
                                ></i>
                            </th>
                            <th>
                                Name
                                <i
                                    class="fa-solid fa-sort ms-1 small opacity-50"
                                ></i>
                            </th>
                            <th>
                                Email
                                <i
                                    class="fa-solid fa-sort ms-1 small opacity-50"
                                ></i>
                            </th>
                            <th width="150">
                                Status
                                <i
                                    class="fa-solid fa-sort ms-1 small opacity-50"
                                ></i>
                            </th>
                            <th width="150" class="text-center">
                                Action
                                <i
                                    class="fa-solid fa-sort ms-1 small opacity-50"
                                ></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-muted">1</td>
                            <td class="text-muted">Admin</td>
                            <td class="text-muted">admin@gmail.com</td>
                            <td><span class="badge-active">Active</span></td>
                            <td class="text-center">
                                <div
                                    class="d-flex justify-content-center gap-1"
                                >
                                    <button
                                        class="btn btn-gray-icon btn-sm me-2"
                                    >
                                        <i class="fa-solid fa-thumbs-down"></i>
                                    </button>
                                    <button
                                        class="btn btn-purple-icon btn-sm me-2"
                                    >
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                    <button class="btn btn-coral-icon btn-sm">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
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
export default {};
</script>
<style scoped>
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

.active-page {
    background-color: #5e72e4 !important;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-toolbar-action {
    background-color: #f8f9fa;
    color: #666;
    border: 1px solid #ddd;
}
.btn-toolbar-action:hover {
    background-color: #e9ecef !important;
    color: #333 !important;
}

.btn-purple-icon {
    background-color: #5e72e4;
    color: white;
    border: none;
}
.btn-purple-icon:hover,
.btn-purple-icon:active {
    background-color: #415ae6;
    color: white;
    border: none;
}
.btn-gray-icon {
    background-color: #6c757d;
    color: white;
    border: none;
}
.btn-gray-icon:hover,
.btn-gray-icon:active {
    background-color: #3f474e;
    color: white;
    border: none;
}
.btn-coral-icon {
    background-color: #ef5350;
    color: white;
    border: none;
}
.btn-coral-icon:hover,
.btn-coral-icon:active {
    background-color: #d41f1c;
    color: white;
    border: none;
}


.badge-active {
    background-color: #e0f2f1;
    color: #00bfa5;
    padding: 4px 10px;
    border-radius: 4px;
    font-weight: 500;
    font-size: 12px;
}

.user-table thead th {
    padding: 15px 10px;
    font-weight: 600;
    font-size: 14px;
    background-color: #f8faff !important;
    border-bottom: 1px solid #eee;
}
.user-table tbody td {
    padding: 12px 10px;
    font-size: 14px;
}
</style>
