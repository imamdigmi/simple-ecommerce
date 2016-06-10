<?php
if (isset($_POST['_form']) AND $_POST['_form'] == 'true') {
    require_once "config.php";
    $sql = "SELECT * FROM pelanggan WHERE email='$_POST[email]' AND password='" . md5($_POST['password']) . "'";
    if ($query = $koneksi->query($sql)) {
        if ($query->num_rows) {
            session_start();
            while ($data = $query->fetch_array()) {
                $_SESSION['is_pelanggan'] = true;
                $_SESSION['id_pelanggan'] = $data['id_pelanggan'];
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['email'] = $data['email'];
            }
            if (isset($_GET['ref'])) {
                $halaman = '?halaman=' . $_GET['ref'];
            } else {
                $halaman = '';
            }
            header('location: index.php' . $halaman);
        } else {
            echo "Email / Password tidak sesuai!";
        }
    } else {
        echo "Query error!";
    }
}
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
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading"><h3 class="text-center">LOGIN PELANGGAN</h3></div>
                    <div class="panel-body">
                        <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" autofocus="on">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-info btn-block">Login</button>
                            <p class="text-center">Belum punya akun? <a href="?halaman=pendaftaran">Daftar</a></p>
                            <input type="hidden" name="_form" value="true">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>