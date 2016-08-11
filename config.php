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
            if ( ! isset($_SESSION['is_pelanggan'])) {
                echo "<script>alert('Harus Login Dulu!');window.location='login.php?ref=detail_order';</script>";
            }
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
                if (checkStok($id, 1)) {
                    if (isset($_SESSION['barang'][$id])) {
                        $_SESSION['barang'][$id] += 1;
                    }
                } else {
                    echo "<script>alert('Maaf, Stok tidak mencukupi');window.location='?halaman=cart';</script>";
                }
            }
        break;
        case 'min':
            if (isset($_GET['id_barang'])) {
                $id = $_GET['id_barang'];
                if (isset($_SESSION['barang'][$id])) {
                    if ($_SESSION['barang'][$id] == 1) {
                        unset($_SESSION['barang'][$id]);
                    } else {
                        $_SESSION['barang'][$id] -= 1;
                    }
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

// Check stok
function checkStok($id, $va) {
    $c = new Mysqli("mysql.idhostinger.com", "u680616758_uni", "12345678", "u680616758_uni");
    if ($query = $c->query("SELECT stok FROM barang WHERE id_barang = $id")) {
        $data = $query->fetch_assoc();
        $a = $data['stok'] - $_SESSION['barang'][$id];
        if ($a == 0) {
            return false;
        } else {
            $b = $va + $_SESSION['barang'][$id];
            $c = $data['stok'] - $b;
            if ($c < 0) {
                return false;
            } else if ($c == 0) {
                return true;
            } else if ($c > 0) {
                return true;
            }
        }
    }
}