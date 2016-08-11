<?php 
if (isset($_POST['_form']) AND $_POST['_form'] == 'true') {
    $sql = "INSERT INTO `buku_tamu` VALUES(NULL, '$_POST[nama]', '$_POST[email]', '$_POST[pesan]', NOW())";
    if ($koneksi->query($sql)) {
        echo "
            <script>
                alert('Berhasil!');
                window.location='?halaman=home';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal!');
                window.location='?halaman=home';
            </script>
        ";
    }
}
?>
<div class="panel panel-info">
    <div class="panel-heading"><h3 class="text-center">Buku Tamu</h3></div>
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
                <label for="nama">Pesan</label>
                <textarea name="pesan" rows="15" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-info btn-block">Simpan</button>
            <input type="hidden" name="_form" value="true">
        </form>
    </div>
</div>