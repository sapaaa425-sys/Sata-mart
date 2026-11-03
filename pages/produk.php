<?php
include 'koneksi.php';

// ===== TAMBAH PRODUK =====
if (isset($_POST['tambah'])) {
    $nama  = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    $simpan = mysqli_query($dbconnect, "INSERT INTO produk1 (nama_barang, harga, stok)
                                        VALUES ('$nama', '$harga', '$stok')");

    if ($simpan) {
        echo "<script>
                alert('Produk berhasil ditambahkan');
                window.location.href='index.php?pages=products';
              </script>";
    } else {
        echo "<script>alert('Produk gagal ditambahkan');</script>";
    }
}

// ===== EDIT PRODUK =====
if (isset($_POST['edit'])) {
    $id    = $_POST['id_barang'];
    $nama  = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    $update = mysqli_query($dbconnect, "UPDATE produk1 SET
                                        nama_barang = '$nama',
                                        harga = '$harga',
                                        stok = '$stok'
                                        WHERE id_barang = '$id'");

    if ($update) {
        echo "<script>
                alert('Produk berhasil diedit');
                window.location.href='index.php?pages=products';
              </script>";
    } else {
        echo "<script>alert('Produk gagal diedit');</script>";
    }
}

// ===== HAPUS PRODUK =====
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $hapus = mysqli_query($dbconnect, "DELETE FROM produk1 WHERE id_barang = '$id'");

    if ($hapus) {
        echo "<script>
                alert('Produk berhasil dihapus');
                window.location.href='index.php?pages=products';
              </script>";
    } else {
        echo "<script>alert('Produk gagal dihapus');</script>";
    }
}
?>

<main class="col-12 col-md-10">
    <div class="container py-4">
        <h2 class="fw-bold">Products</h2>
        <h4 class="mt-4 mb-3">Halaman Produk</h4>

        <!-- Tombol Add Product -->
        <button type="button" class="btn btn-dark btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Add Product
        </button>

        <!-- Tabel Produk -->
        <table class="table table-striped table-bordered bg-white">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($dbconnect, "SELECT * FROM produk1");
                $no = 1;
                while ($tampil = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $tampil['nama_barang']; ?></td>
                    <td>Rp <?= number_format($tampil['harga'], 0, ',', '.'); ?></td>
                    <td><?= $tampil['stok']; ?></td>
                    <td>
                        <!-- Tombol Edit: data produk disimpan di atribut data- -->
                        <button type="button" class="btn btn-success btn-sm btn-edit"
                                data-bs-toggle="modal" data-bs-target="#modalEdit"
                                data-id="<?= $tampil['id_barang']; ?>"
                                data-nama="<?= htmlspecialchars($tampil['nama_barang']); ?>"
                                data-harga="<?= $tampil['harga']; ?>"
                                data-stok="<?= $tampil['stok']; ?>">
                            Edit
                        </button>

                        <!-- Tombol Hapus -->
                        <a href="index.php?pages=products&hapus=<?= $tampil['id_barang']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin mau hapus produk ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<!-- ===== MODAL TAMBAH PRODUK ===== -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="post">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- ===== MODAL EDIT PRODUK ===== -->
<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="post">
            <div class="modal-header">
                <h5 class="modal-title">Edit Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_barang" id="edit-id">
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" id="edit-nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" id="edit-harga" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" id="edit-stok" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" name="edit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
// Saat tombol Edit diklik, isi form edit dengan data produk yang dipilih
var tombolEdit = document.querySelectorAll('.btn-edit');

tombolEdit.forEach(function (tombol) {
    tombol.addEventListener('click', function () {
        document.getElementById('edit-id').value    = tombol.dataset.id;
        document.getElementById('edit-nama').value  = tombol.dataset.nama;
        document.getElementById('edit-harga').value = tombol.dataset.harga;
        document.getElementById('edit-stok').value  = tombol.dataset.stok;
    });
});
</script>
