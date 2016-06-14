<?php
if (isset($_POST['_form']) AND $_POST['_form'] == 'true') {
    $sql = "UPDATE `ongkos_kirim` SET `kota`='$_POST[kota]',`tarif`='$_POST[tarif]' WHERE `id_ongkos_kirim`=$_POST[_id_ongkos_kirim]";
    if ($koneksi->query($sql)) {
        echo "
            <script>
                alert('Berhasil diedit!');
                window.location='?halaman=ongkos_kirim';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal diedit!');
                window.location='?halaman=ongkos_kirim';
            </script>
        ";
    }
}

if ($_GET['action'] === 'delete') {
    $koneksi->query("DELETE FROM `ongkos_irim` WHERE id_ongkos_irim=$_GET[id]");
    echo "
        <script>
            alert('Berhasil dihapus!');
            window.location='?halaman=ongkos_irim';
        </script>
    ";
}
?>
<div class="col-md-6">
    <div class="panel panel-warning">
        <div class="panel-heading"><h3 class="text-center">EDIT ONGKOS KIRIM</h3></div>
        <div class="panel-body">
            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                <?php if ($query = $koneksi->query("SELECT * FROM `ongkos_kirim` WHERE id_ongkos_kirim=$_GET[id]")): ?>
                    <?php while ($ongkos_kirim = $query->fetch_array()): ?>
                        <div class="form-group">
                            <label for="kota">Nama Kota</label>
                            <input type="text" name="kota" class="form-control" value="<?=$ongkos_kirim['kota']?>">
                        </div>
                        <div class="form-group">
                            <label for="tarif">Tarif</label>
                            <input type="text" name="tarif" class="form-control" value="<?=$ongkos_kirim['tarif']?>">
                        </div>
                        <button type="submit" class="btn btn-warning btn-block">Update</button>
                        <input type="hidden" name="_id_ongkos_kirim" value="<?=$ongkos_kirim['id_ongkos_kirim']?>">
                    <?php endwhile ?>
                <?php endif ?>
                <input type="hidden" name="_form" value="true">
            </form>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">DAFTAR ONGKOS KIRIM</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kota</th>
                        <th>Tarif</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($query = $koneksi->query("SELECT * FROM ongkos_kirim")): ?>
                    <?php $no = 1; ?>
                    <?php while($ongkos_kirim = $query->fetch_assoc()): ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$ongkos_kirim['kota'] ?></td>
                        <td>Rp. <?=$ongkos_kirim['tarif'] ?>,-</td>
                        <td>
                            <div class="btn-group">
                                <a href="?halaman=ongkos_kirim&action=update&id=<?=$ongkos_kirim['id_ongkos_kirim']?>" class="btn btn-warning btn-xs">Edit</a>
                                <a href="?halaman=ongkos_kirim&action=delete&id=<?=$ongkos_kirim['id_ongkos_kirim']?>" class="btn btn-danger btn-xs">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile ?>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>