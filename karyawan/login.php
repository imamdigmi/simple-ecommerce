<?php
require_once "../config.php";
if (isset($_POST['on']) AND $_POST['on'] == 'true') {
    $sql = "SELECT * FROM karyawan WHERE email='$_POST[email]' AND password='" . md5($_POST['password']) . "'";
    if ($query = $koneksi->query($sql)) {
        if ($query->num_rows) {
            session_start();
            while ($data = $query->fetch_array()) {
                $_SESSION['is_karyawan'] = true;
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['email'] = $data['email'];
            }
            header('location: index.php');
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        body {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="text-center">LOGIN KARYAWAN</h3></div>
                <div class="panel-body">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                        <br>
                        <p class="text-center">Copyright &copy; 2016 - UNI SOLO</p>
                        <input type="hidden" name="on" value="true">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>
</html>