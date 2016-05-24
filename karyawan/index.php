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
                    <a class="navbar-brand" href="#">UNI SOLO</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="?halaman=pelanggan">Daftar Pelanggan</a></li>
                                <li><a href="?halaman=order">Daftar Order</a></li>
                                <li><a href="?halaman=merk">Daftar Merk</a></li>
                                <li><a href="?halaman=barang">Daftar Barang</a></li>
                                <li><a href="?halaman=ongkos-kirim">Daftar Ongkos Kirim</a></li>
                                <li><a href="?halaman=buku-tamu">Daftar Buku Tamu</a></li>
                                <li><a href="?halaman=konfirmasi-pembelian">Daftar Konfirmasi Pembelian</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="?halaman=karyawan">Daftar Karyawan</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="?halaman=lap-pernota">Laporan Pernota</a></li>
                                <li><a href="?halaman=lap-perperiode">Laporan Perperiode</a></li>
                                <li><a href="?halaman=lap-terlaris">Laporan Barang Terlaris</a></li>
                            </ul>
                        </li>
                        <li><a href="logout.php">Keluar</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="row">
              <?php
                switch ($_GET['halaman']) {
                    case 'pelanggan': $halaman = "pelanggan.php"; break;
                    case 'order': $halaman = "order.php"; break;
                    case 'merk': $halaman = "merk.php"; break;
                    case 'barang': $halaman = "barang.php"; break;
                    case 'buku-tamu': $halaman = "buku-tamu.php"; break;
                    case 'ongkos-kirim': $halaman = "ongkos-kirim.php"; break;
                    case 'konfirmasi-pembelian': $halaman = "konfirmasi-pembelian.php"; break;
                    case 'karyawan': $halaman = "karyawan.php"; break;
                    case 'lap-pernota': $halaman = "lap-pernota.php"; break;
                    case 'lap-perperiode': $halaman = "lap-perperiode.php"; break;
                    case 'lap-terlaris': $halaman = "lap-terlaris.php"; break;
                    default: $halaman = "home.php"; break;
                }
                include "halaman/" . $halaman;
              ?>
        </div>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>