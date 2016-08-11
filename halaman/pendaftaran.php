<?php 
if (isset($_POST['_form']) AND $_POST['_form'] == 'true') {
    $password = md5($_POST['password']);
    $sql = "INSERT INTO `pelanggan` VALUES (NULL, '$_POST[nama]', '$_POST[email]', '$_POST[telpon]', '$_POST[alamat]', '$password')";
    if ($koneksi->query($sql)) {
        echo "
            <script>
                alert('Pendaftaran Berhasil!');
                window.location='?halaman=pendaftaran';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Pendaftaran Gagal!');
                window.location='?halaman=pendaftaran';
            </script>
        ";
    }
}
?>
<div class="panel panel-info">
    <div class="panel-heading"><h3 class="text-center">Pendaftaran Pelanggan</h3></div>
    <div class="panel-body">
        <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama">Telpon / HP</label>
                <input type="text" name="telpon" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama">Alamat</label>
                <textarea name="alamat" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-info btn-block">Simpan</button>
            <input type="hidden" name="_form" value="true">
        </form>
    </div>
</div>