<template lang="">
    <!-- Topbar -->
    <nav class="navbar topbar px-4">
        <span class="fw-bold">Admin Panel</span>

        <div class="ms-auto dropdown">
            <a
                class="text-white dropdown-toggle"
                data-bs-toggle="dropdown"
                href="#"
            >
                <i class="bi bi-person-circle"></i> Admin
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Dashboard</a></li>
                <li><a class="dropdown-item" href="#">Change Password</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <a class="dropdown-item text-danger" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="position-fixed sidebar p-3">
        <h5 class="text-white mb-4">Menu</h5>

        <ul class="nav flex-column gap-2">
            <li>
                <a href="#" class="d-flex align-items-center gap-2">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>

            <li>
                <a data-bs-toggle="collapse" href="#ordersMenu">
                    <i class="bi bi-cart"></i> Orders
                </a>
                <div class="collapse ps-4" id="ordersMenu">
                    <a href="#" class="d-block mt-2">All Orders</a>
                    <a href="#" class="d-block">Pending</a>
                    <a href="#" class="d-block">Delivered</a>
                </div>
            </li>

            <li>
                <a data-bs-toggle="collapse" href="#productMenu">
                    <i class="bi bi-box"></i> Products
                </a>
                <div class="collapse ps-4" id="productMenu">
                    <a href="#" class="d-block mt-2">Manage Products</a>
                    <a href="#" class="d-block">Categories</a>
                    <a href="#" class="d-block">Brands</a>
                </div>
            </li>

            <li>
                <a href="#"> <i class="bi bi-people"></i> Customers </a>
            </li>

            <li>
                <a href="#"> <i class="bi bi-gear"></i> Settings </a>
            </li>
        </ul>
    </div>
</template>
<script>
export default {};
</script>
<style lang="css">
body {
    background: #f5f6fa;
}
.sidebar {
    width: 260px;
    min-height: 100vh;
    background: #212529;
}
.sidebar a {
    color: #adb5bd;
    text-decoration: none;
}
.sidebar a:hover {
    color: #fff;
}
.content {
    margin-left: 260px;
    padding: 20px;
}
.topbar {
    height: 60px;
    background: #212529;
    color: #fff;
}
</style>
