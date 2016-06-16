<?php

// Membuat koneksi ke database
$koneksi = new Mysqli("localhost", "root", "idiot", "e-commerce");

// Jika koneksi gagal
if (!$koneksi) {
    echo "<h3>ERROR: Koneksi database gagal!</h3>";
}

// Inisialisasi halaman default = "home"
if (isset($_GET['halaman'])) {
    $halaman = $_GET['halaman'];
} else {
    $halaman = 'home';
}

// Transaksi keranjang belanja
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            if (isset($_GET['id_barang'])) {
                $id = $_GET['id_barang'];
                if (isset($_SESSION['barang'][$id])) {
                    $_SESSION['barang'][$id] += 1;
                } else {
                    $_SESSION['barang'][$id] = 1;
                }
            }
        break;
        case 'plus':
            if (isset($_GET['id_barang'])) {
                $id = $_GET['id_barang'];
                if (isset($_SESSION['barang'][$id])) {
                    $_SESSION['barang'][$id] += 1;
                }
            }
        break;
        case 'min':
            if (isset($_GET['id_barang'])) {
                $id = $_GET['id_barang'];
                if (isset($_SESSION['barang'][$id])) {
                    $_SESSION['barang'][$id] -= 1;
                }
            }
        break;
        case 'del':
            if (isset($_GET['id_barang'])) {
                $id = $_GET['id_barang'];
                if (isset($_SESSION['barang'][$id])) {
                    unset($_SESSION['barang'][$id]);
                }
            }
        break;
        case 'clear':
            if (isset($_SESSION['barang'])) {
                foreach ($_SESSION['barang'] as $key => $val) {
                    unset($_SESSION['barang'][$key]);
                }
                unset($_SESSION['barang']);
            }
        break;
    }
}
