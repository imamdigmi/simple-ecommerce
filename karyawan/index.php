<?php 
require_once "../config.php";
session_start();
if (!isset($_SESSION['is_karyawan'])) {
    echo "
        <script>
            alert('Anda harus login');
            window.location='login.php';
        </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Karyawan - UNI Solo</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        body {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">UNI SOLO - <span style="color: red;"><?=strtoupper($_SESSION['nama_karyawan'])?></span></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu Data <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="?halaman=barang">Barang</a></li>
                                <li><a href="?halaman=merk">Merk</a></li>
                                <li><a href="?halaman=ongkos_kirim">Ongkos Kirim</a></li>
                                <li><a href="?halaman=pelanggan">Pelanggan</a></li>
                                <li><a href="?halaman=buku_tamu">Buku Tamu</a></li>
                                <li class="divider"></li>
                                <li><a href="?halaman=karyawan">Karyawan</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan - Laporan <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="?halaman=lap_pernota">Pernota</a></li>
                                <li><a href="?halaman=lap_perperiode">Perperiode</a></li>
                                <li><a href="?halaman=lap_konfirmasi">Konfirmasi Order</a></li>
                                <li><a href="?halaman=lap_order_terkirim">Order Terkirim</a></li>
                                <li><a href="?halaman=lap_order_belum_terkirim">Order Belum Terkirim</a></li>
                                <li><a href="?halaman=lap_barang_permerk">Barang Permerk</a></li>
                                <li><a href="?halaman=lap_barang_terlaris">Barang Terlaris</a></li>
                            </ul>
                        </li>
                        <li><a href="logout.php">Keluar</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="row">
            <?php
            switch ($halaman) {
                case 'merk':
                    if (isset($_GET['action']) AND $_GET['action'] == 'update') {
                        $halaman = "merk_edit";
                    } else {
                        $halaman = "merk";
                    }
                break;
                case 'barang':
                    if (isset($_GET['action']) AND $_GET['action'] == 'update') {
                        $halaman = "barang_edit";
                    } else {
                        $halaman = "barang";
                    }
                break;
                case 'ongkos_kirim':
                    if (isset($_GET['action']) AND $_GET['action'] == 'update') {
                        $halaman = "ongkos_kirim_edit";
                    } else {
                        $halaman = "ongkos_kirim";
                    }
                break;
                case 'karyawan':
                    if (isset($_GET['action']) AND $_GET['action'] == 'update') {
                        $halaman = "karyawan_edit";
                    } else {
                        $halaman = "karyawan";
                    }
                break;
                case 'buku_tamu':
                    $halaman = "buku_tamu";
                break;
                case 'pelanggan':
                    $halaman = "pelanggan";
                break;
                case 'lap_pernota':
                    $halaman = "lap_pernota";
                break;
                case 'lap_perperiode':
                    $halaman = "lap_perperiode";
                break;
                case 'lap_barang_permerk':
                    $halaman = "lap_barang_permerk";
                break;
                case 'lap_order_terkirim':
                    $halaman = "lap_order_terkirim";
                break;
                case 'lap_order_belum_terkirim':
                    $halaman = "lap_order_belum_terkirim";
                break;
                case 'bukti_pembayaran':
                    $halaman = "bukti_pembayaran";
                break;
                case 'lap_barang_terlaris':
                    $halaman = "lap_barang_terlaris";
                break;
                case 'lap_konfirmasi':
                    $halaman = "lap_konfirmasi";
                break;
                default: $halaman = "home"; break;
            }
            include 'halaman/' . $halaman . '.php';
            ?>
        </div>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>