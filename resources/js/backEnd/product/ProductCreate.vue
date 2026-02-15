<template>
    <div class="container-fluid mt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark mb-0">Product Create</h4>
            <router-link
                :to="{ name: 'ProductManage' }"
                class="btn btn-pink rounded-pill px-3 shadow-sm text-white"
                ><i class="fa-solid fa-database me-1"></i>Product
                Manage</router-link
            >
        </div>

        <div class="card border-0 shadow-custom rounded-4 p-4">
            <form>
                <div class="row g-3">
                    <!-- Product Name & Categories -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted"
                            >Product Name *</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            placeholder=""
                        />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted"
                            >Categories *</label
                        >
                        <select class="form-select text-muted">
                            <option selected>Select..</option>
                        </select>
                    </div>

                    <!-- Sub & Child Categories -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted"
                            >SubCategories (Optional)</label
                        >
                        <select class="form-select text-muted">
                            <option selected>Choose ...</option>
                        </select>
                    </div>

                    <!-- Brands, Purchase Price, Old Price -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted"
                            >Brands</label
                        >
                        <select class="form-select text-muted">
                            <option selected>Select..</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted"
                            >Price *</label
                        >
                        <input type="text" class="form-control" />
                    </div>

                    <!-- New Price, Stock, Image -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted"
                            >discount_price *</label
                        >
                        <input type="text" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted"
                            >Stock *</label
                        >
                        <input type="text" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted"
                            >Image *</label
                        >
                        <div class="mb-2"
                        >
                            <div class="input-group">
                                <input type="file" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <img src="" style="height: 100px; width: 100px; object-fit: cover;"
                            class="rounded border shadow-sm">
                    </div>

                    <!-- SKU, Unit, Video -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted"
                            >Product Code (SKU) *</label
                        >
                        <input type="text" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted"
                            >Product Unit (Optional)</label
                        >
                        <input type="text" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted"
                            >Product Video (Optional)</label
                        >
                        <input type="text" class="form-control" />
                    </div>

                    <!-- Size & Color -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted"
                            >Size (Option)</label
                        >
                        <select class="form-select text-muted">
                            <option selected>Select..</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted"
                            >Color (Optional)</label
                        >
                        <select class="form-select text-muted">
                            <option selected>Select..</option>
                        </select>
                    </div>

                    <!-- Description (Text Editor Area) -->
                    <div class="col-12">
                        <label class="form-label fw-semibold text-muted"
                            >Description *</label
                        >
                        <div class="editor-container border rounded">
                            <div
                                class="editor-toolbar bg-light border-bottom p-2 d-flex gap-2"
                            >
                                <button
                                    type="button"
                                    class="btn btn-sm btn-outline-secondary"
                                >
                                    <i class="fa fa-bold"></i>
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-sm btn-outline-secondary"
                                >
                                    <i class="fa fa-italic"></i>
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-sm btn-outline-secondary"
                                >
                                    <i class="fa fa-list"></i>
                                </button>
                            </div>
                            <textarea
                                class="form-control border-0"
                                rows="4"
                                placeholder="Enter Your Text Here"
                            ></textarea>
                        </div>
                    </div>

                    <!-- Status & Hot Deals Switches -->
                    <div class="col-md-2">
                        <label class="form-label fw-semibold text-muted d-block"
                            >Status</label
                        >
                        <div class="form-check form-switch custom-switch">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                checked
                            />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold text-muted d-block"
                            >Hot Deals</label
                        >
                        <div class="form-check form-switch custom-switch">
                            <input class="form-check-input" type="checkbox" />
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
            
        };
    },
    methods: {
        
    },
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
