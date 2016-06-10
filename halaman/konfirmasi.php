<?php 
if (isset($_POST['_form']) AND $_POST['_form'] == 'true') {
    $file_ext = strtolower(end(explode('.', $_FILES['bukti']['name'])));
    $gambar = date('dmYHis').'.'.$file_ext;
    move_uploaded_file($_FILES['bukti']['tmp_name'], 'bukti/'.$gambar);
    $sql = "UPDATE `order` SET bukti_pembayaran='$gambar' WHERE id_order=$_POST[_id_order]";
    if ($koneksi->query($sql)) {
        echo "
            <script>
                alert('Konfirmasi Berhasil!');
                window.location='?halaman=home';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Konfirmasi Gagal!');
                window.location='?halaman=home';
            </script>
        ";
    }
}
?>
<div class="panel panel-info">
    <div class="panel-heading"><h3 class="text-center">Konfirmasi Pembayaran</h3></div>
    <div class="panel-body">
        <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="bukti">Bukti Pembayaran</label>
                <input type="file" name="bukti" class="form-control">
            </div>
            <button type="submit" class="btn btn-info btn-block">Konfirmasi</button>
            <input type="hidden" name="_form" value="true">
            <input type="hidden" name="_id_order" value="<?=$_GET['id_order']?>">
        </form>
    </div>
</div>
