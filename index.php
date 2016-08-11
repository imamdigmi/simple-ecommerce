<?php
session_start();
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNI Solo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                        <li><a href="?halaman=home">Home <span class="sr-only">(current)</span></a></li>
                        <?php if (!isset($_SESSION['is_pelanggan'])): ?>
                            <li><a href="?halaman=pendaftaran">Pendaftaran</a></li>
                        <?php endif ?>
                        <li><a href="?halaman=buku_tamu">Buku Tamu</a></li>
                        <?php if (isset($_SESSION['is_pelanggan'])): ?>
                            <li><a href="?halaman=profile">Profil</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        <?php endif ?>
                        <?php if (!isset($_SESSION['is_pelanggan'])): ?>
                            <li><a href="login.php">Login</a></li>
                        <?php endif ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="row">
            <div class="col-md-9">
              <?php
                switch ($halaman) {
                    case 'detail_barang': $halaman = "detail_barang"; break;
                    case 'detail_order': $halaman = "detail_order"; break;
                    case 'buku_tamu': $halaman = "buku_tamu"; break;
                    case 'pendaftaran': $halaman = "pendaftaran"; break;
                    case 'cart': $halaman = "cart"; break;
                    case 'checkout': $halaman = "checkout"; break;
                    case 'selesai': $halaman = "selesai"; break;
                    case 'konfirmasi': $halaman = "konfirmasi"; break;
                    case 'profile': $halaman = "profile"; break;
                    default: $halaman = "home"; break;
                }
                include "halaman/" . $halaman . ".php";
              ?>
            </div>
             <?php include "side_bar.php"; ?>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>