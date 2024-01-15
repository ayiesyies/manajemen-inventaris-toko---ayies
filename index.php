<?php
// Fungsi untuk menambahkan produk ke dalam inventaris
function tambahProduk($nama, $harga, $stok) {
    // Logika untuk menambahkan produk ke dalam inventaris
    // Disini dapat disertakan koneksi ke database untuk menyimpan data
    echo "Produk $nama berhasil ditambahkan.\n";
}

// Fungsi untuk mencari produk berdasarkan nama
function cariProduk($nama) {
    // Logika untuk mencari produk berdasarkan nama
    // Disini dapat disertakan koneksi ke database untuk mencari data
    return true; // Contoh sederhana, selalu mengembalikan true
}

// Fungsi untuk memperbarui informasi produk
function updateProduk($nama, $hargaBaru, $stokBaru) {
    // Logika untuk memperbarui informasi produk
    // Disini dapat disertakan koneksi ke database untuk memperbarui data
    echo "Informasi produk $nama berhasil diperbarui.\n";
}

// Fungsi untuk menangani formulir penambahan produk
function handleTambahProduk() {
    tambahProduk($_POST['nama'], $_POST['harga'], $_POST['stok']);
}

// Fungsi untuk menangani formulir pembaruan produk
function handleUpdateProduk() {
    $namaProduk = $_POST['nama'];
    $produkDitemukan = cariProduk($namaProduk);
    if ($produkDitemukan) {
        updateProduk($namaProduk, $_POST['hargaBaru'], $_POST['stokBaru']);
    } else {
        echo "Produk tidak ditemukan.\n";
    }
}

// Menangani input dari formulir atau request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menuPilihan = $_POST['menuPilihan'];

    switch ($menuPilihan) {
        case 1:
            handleTambahProduk();
            break;
        case 2:
            handleUpdateProduk();
            break;
        // Tambahkan case untuk fungsi penjualan dan lainnya sesuai kebutuhan
        default:
            echo "Pilihan tidak valid.\n";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Inventaris Toko</title>
</head>
<body>
    <h1>Manajemen Inventaris Toko</h1>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="menuPilihan">Pilih Menu:</label>
        <select name="menuPilihan">
            <option value="1">Tambah Produk</option>
            <option value="2">Update Produk</option>
            <!-- Tambahkan opsi lainnya sesuai dengan kebutuhan -->
        </select>

        <br>

        <label for="nama">Nama Produk:</label>
        <input type="text" name="nama" required>

        <br>

        <label for="harga">Harga:</label>
        <input type="text" name="harga" required>

        <br>

        <label for="stok">Stok:</label>
        <input type="text" name="stok" required>

        <br>

        <label for="hargaBaru">Harga Baru:</label>
        <input type="text" name="hargaBaru">

        <br>

        <label for="stokBaru">Stok Baru:</label>
        <input type="text" name="stokBaru">

        <br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
