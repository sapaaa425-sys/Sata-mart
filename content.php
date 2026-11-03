<?php
// daftar halaman yang boleh dibuka: "nama di URL" => "file di folder pages"
$halaman = [
    "dashboard"    => "pages/dashboard.php",
    "products"     => "pages/produk.php",
    "orders"       => "pages/orders.php",
    "customers"    => "pages/customers.php",
    "reports"      => "pages/reports.php",
    "integrations" => "pages/integrations.php",
];

if (isset($halaman[$page])) {
    require __DIR__ . '/' . $halaman[$page];
} else {
    echo '<main class="col-12 col-md-10"><div class="container py-4"><h1>Halaman Tidak Ditemukan</h1></div></main>';
}
