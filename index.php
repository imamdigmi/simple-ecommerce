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
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Daftar Produk</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Keranjang Belanja</a></li>
                            </ul>
                        </li>
                        <li><a href="?halaman=pendaftaran">Pendaftaran</a></li>
                        <li><a href="?halaman=login">Member Area</a></li>
                        <li><a href="?halaman=buku-tamu">Buku Tamu</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="row">
              <?php
                switch ($_GET['halaman']) {
                    case 'buku-tamu': $halaman = "buku-tamu.php"; break;
                    case 'pendaftaran': $halaman = "pendaftaran.php"; break;
                    case 'login': $halaman = "login.php"; break;
                    default: $halaman = "home.php"; break;
                }
                include "halaman/" . $halaman;
              ?>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>