<template>
    <div class="container-fluid mt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark mb-0">All Reviews</h4>
            <button class="btn btn-pink rounded-pill px-3 shadow-sm text-white">
                <i class="fa-solid fa-star me-1"></i> Add Review
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
                        <!-- Search Input (v-model added) -->
                        <input type="text" class="search-input rounded-0 border-end-0"
                            placeholder="Search by Name/Email" style="width: 200px" v-model="searchQuery" />
                        <button class="btn btn-search btn-sm rounded-0 text-white px-3">
                            Search
                        </button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <!-- Review Table -->
                <table class="table table-hover align-middle custom-table" v-if="reviews.length > 0">
                    <thead class="table-light text-muted">
                        <tr>
                            <th width="50">SL</th>
                            <th width="200">Product</th>
                            <th>Customer Info</th>
                            <th>Rating</th>
                            <th width="30%">Review Text</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th width="120" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through filtered reviews -->
                        <tr v-for="(review, index) in filteredReviews" :key="review.id">
                            <td class="text-muted">{{ index + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center" v-if="review.product">
                                    <img :src="'/' + review.product.image" alt="Product"
                                        class="rounded border shadow-sm me-2"
                                        style="width: 45px; height: 45px; object-fit: cover;" />
                                    <span class="small fw-bold text-dark lh-sm">
                                        {{ review.product.name.length > 25 ? review.product.name.substring(0, 25) +
                                            '...' : review.product.name }}
                                    </span>
                                </div>
                                <span v-else class="text-danger small">No product found!</span>
                            </td>
                            <td>
                                <p class="mb-0 fw-bold text-dark">{{ review.name }}</p>
                                <small class="text-muted">{{ review.email }}</small>
                            </td>
                            <td>
                                <!-- Star Rating Display -->
                                <div class="text-warning">
                                    <i v-for="n in 5" :key="n" class="fa-solid fa-star"
                                        :class="n <= review.ratting ? 'text-warning' : 'text-black-50 opacity-25'">
                                    </i>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 text-muted small">
                                    {{ review.review && review.review.length > 50 ? review.review.substring(0, 50) +
                                        '...' : review.review }}
                                </p>
                            </td>
                            <td class="text-muted small">
                                {{ new Date(review.created_at).toLocaleDateString() }}
                            </td>
                            <td>
                                <span class="badge text-capitalize"
                                    :class="review.status === 'approved' ? 'bg-success' : 'bg-warning text-dark'">
                                    {{ review.status }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button @click="changeStatus(review.id, 'Public')"
                                        :disabled="review.status === 'Public'"
                                        class="btn btn-green btn-sm w-100 text-white">Public</button>
                                    <button @click="changeStatus(review.id, 'pending')"
                                        :disabled="review.status === 'pending'"
                                        class="btn btn-sky btn-sm w-100 text-white">Pending</button>
                                    <button @click="changeStatus(review.id, 'cancelled')"
                                        :disabled="review.status === 'cancelled'"
                                        class="btn btn-danger btn-sm w-100">Cancelled</button>
                                    <button @click="deleteReview(review.id)" class="btn btn-coral-icon btn-sm"
                                        title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- No Data Found -->
                        <tr v-if="filteredReviews.length === 0">
                            <td colspan="7" class="text-center p-4 text-muted">
                                No reviews found!
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-1 flex-wrap gap-2 text-muted small">
                <div>Showing {{ filteredReviews.length }} Results</div>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled">
                            <a class="page-link border-0 text-muted" href="#"><i
                                    class="fa-solid fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link border-0 rounded-circle active-page text-white ms-2" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link border-0 text-muted ms-2" href="#"><i
                                    class="fa-solid fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Notification from "../../Helpers/Notification";

export default {
    data() {
        return {
            reviews: [],
            searchQuery: ''
        };
    },
    computed: {
        // Search Filter Logic
        filteredReviews() {
            if (!this.searchQuery) {
                return this.reviews;
            }
            return this.reviews.filter(review => {
                return review.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                    review.email.toLowerCase().includes(this.searchQuery.toLowerCase());
            });
        }
    },
    mounted() {
        this.getAllReviews();
    },
    methods: {
        getAllReviews() {
            axios.get('/api/review')
                .then(res => {
                    this.reviews = res.data;
                })
                .catch(err => {
                    console.error("Error loading reviews:", err);
                });
        },
        changeStatus(reviewId, newStatus) {
            axios.post(`/api/review/update-status/${reviewId}`, { status: newStatus })
                .then(res => {
                    Notification.success(res.data.message);

                    this.getAllReviews();
                })
                .catch(error => {
                    console.error("Status update failed", error);
                    Notification.error("Something went wrong!");
                });
        },
        deleteReview(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/review/' + id)
                        .then(() => {
                            this.reviews = this.reviews.filter(review => review.id !== id);
                            Notification.success("Review deleted successfully!");
                        })
                        .catch(() => {
                            Notification.error("Something went wrong!");
                        });
                }
            })
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

.btn-green {
    background-color: #00c853;
    border: none;
}

.btn-sky {
    background-color: #4fc3f7;
    border: none;
}

.btn-search {
    background-color: #00cae3;
    border: none;
}

.btn-sky:hover,
.btn-sky:active {
    background-color: #039be5 !important;
    color: #fff !important;
}

.btn-green:hover,
.btn-green:active {
    background-color: #00a041 !important;
    color: #fff !important;
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

/* Custom Table Styles */
.custom-table thead th {
    background-color: #f8faff !important;
    font-weight: 600;
    font-size: 14px;
    padding: 15px 10px;
    border-bottom: 1px solid #eee;
}

.custom-table tbody td {
    padding: 12px 10px;
    font-size: 14px;
    vertical-align: middle;
}

/* Action Buttons */
.btn-coral-icon {
    background-color: #ef5350;
    color: white;
    border: none;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    transition: 0.3s;
}

.btn-coral-icon:hover {
    background-color: #d32f2f;
    color: white;
}
</style>