<?php
$daftarProduk = array();

function tampilkanDaftarProduk() {
    global $daftarProduk;

    echo "<ul>";
    foreach ($daftarProduk as $produk) {
        echo "<li>{$produk['nama']} - Harga: {$produk['harga']} - Stok: {$produk['stok']}</li>";
    }
    echo "</ul>";
}

function tambahProduk($nama, $harga, $stok) {
    global $daftarProduk;

    $produk = array(
        'nama' => $nama,
        'harga' => $harga,
        'stok' => $stok
    );

    $daftarProduk[] = $produk;

    echo "Produk $nama berhasil ditambahkan.\n";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaProduk = $_POST['nama'];
    $hargaProduk = $_POST['harga'];
    $stokProduk = $_POST['stok'];

    tambahProduk($namaProduk, $hargaProduk, $stokProduk);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Inventaris Toko</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        h1, h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manajemen Inventaris Toko</h1>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="nama">Nama Produk:</label>
            <input type="text" name="nama" required>

            <label for="harga">Harga:</label>
            <input type="text" name="harga" required>

            <label for="stok">Stok:</label>
            <input type="text" name="stok" required>

            <input type="submit" value="Tambah Produk">
        </form>

        <h2>Daftar Produk</h2>
        <?php tampilkanDaftarProduk(); ?>
    </div>
</body>
</html>