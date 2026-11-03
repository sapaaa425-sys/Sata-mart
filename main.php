<?php
// $page dikirim dari index.php, dipakai untuk menandai menu yang aktif
function menu_aktif($nama, $page) {
    return $nama === $page ? 'fw-semibold' : '';
}
?>
<aside class="col-md-2 bg-white min-vh-100 p-3 border-end">
    <a class="d-block mb-3 text-decoration-none text-primary <?= menu_aktif('dashboard', $page) ?>" href="index.php?pages=dashboard">
        <i class="bi bi-house-door me-2"></i>Dashboard
    </a>
    <a class="d-block mb-3 text-decoration-none text-primary <?= menu_aktif('orders', $page) ?>" href="index.php?pages=orders">
        <i class="bi bi-cart3 me-2"></i>Orders
    </a>
    <a class="d-block mb-3 text-decoration-none text-primary <?= menu_aktif('products', $page) ?>" href="index.php?pages=products">
        <i class="bi bi-box-seam me-2"></i>Products
    </a>
    <a class="d-block mb-3 text-decoration-none text-primary <?= menu_aktif('customers', $page) ?>" href="index.php?pages=customers">
        <i class="bi bi-people me-2"></i>Customers
    </a>
    <a class="d-block mb-3 text-decoration-none text-primary <?= menu_aktif('reports', $page) ?>" href="index.php?pages=reports">
        <i class="bi bi-bar-chart-line me-2"></i>Reports
    </a>
    <a class="d-block text-decoration-none text-primary <?= menu_aktif('integrations', $page) ?>" href="index.php?pages=integrations">
        <i class="bi bi-plug me-2"></i>Integrations
    </a>
</aside>
