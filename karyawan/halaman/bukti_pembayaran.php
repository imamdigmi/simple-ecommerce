<?php 
if (isset($_POST['_form']) AND $_POST['_form'] == 'true') {
    $koneksi->query("UPDATE `order` SET status_konfirmasi='sudah' WHERE id_order=$_POST[_id]");
    $sql = "INSERT INTO konfirmasi VALUES(NULL, $_POST[_id], NOW(), '". date('Y-m-d', strtotime('+1 week')) ."')";
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
<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">BUKTI PEMBAYARAN</h3></div>
        <div class="panel-body">
            <?php if($query = $koneksi->query("SELECT * FROM `order` WHERE id_order=$_GET[id]")): ?>
                <?php while($bukti = $query->fetch_array()): ?>
                    <div class="thumbnail">
                        <img src="../bukti/<?=$bukti['bukti_pembayaran']?>" style="height: 590px; width: 550px;">
                        <div class="caption text-center">
                            <h5>Rp. <?=$bukti['total_bayar']?> ,-</h5>
                            <p>
                                <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" class="form-inline">
                                    <input type="hidden" name="_id" value="<?=$bukti['id_order']?>">
                                    <input type="hidden" name="_form" value="true">
                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                </form>
                            </p>
                        </div>
                    </div>
                <?php endwhile ?>
            <?php endif ?>
        </div>
    </div>
</div>