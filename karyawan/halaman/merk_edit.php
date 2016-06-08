<?php
if (isset($_POST['form']) AND $_POST['form'] == 'true') {
    $sql = "UPDATE `merk` SET nama_merk='" . ucwords($_POST['nama_merk']) . "' WHERE id_merk=$_POST[id_merk]";
    if ($koneksi->query($sql)) {
        echo "
            <script>
                alert('Berhasil diinput!');
                window.location='?halaman=barang';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal diinput!');
                window.location='?halaman=barang';
            </script>
        ";
    }
}

if ($_GET['action'] === 'delete') {
    $koneksi->query("DELETE FROM `merk` WHERE id_merk=$_GET[id]");
    echo "
        <script>
            alert('Berhasil dihapus!');
            window.location='?halaman=merk';
        </script>
    ";
}
?>
<div class="col-md-4">
    <div class="panel panel-warning">
        <div class="panel-heading"><h3 class="text-center">UPDATE MERK</h3></div>
        <div class="panel-body">
            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                <?php if ($query = $koneksi->query("SELECT * FROM `merk` WHERE id_merk=$_GET[id]")): ?>
                    <?php while ($merk = $query->fetch_array()): ?>
                        <div class="form-group">
                            <label for="nama_merk">Nama Merk</label>
                            <input type="text" name="nama_merk" class="form-control" value="<?=$merk['nama_merk']?>">
                        </div>
                        <button type="submit" class="btn btn-warning btn-block">Update</button>
                        <input type="hidden" name="form" value="true">
                        <input type="hidden" name="id_merk" value="<?=$merk['id_merk']?>">
                    <?php endwhile ?>
                <?php endif ?>
            </form>
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">DAFTAR MERK</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Merk</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($query = $koneksi->query("SELECT * FROM `merk`")): ?>
                        <?php $no = 1; ?>
                        <?php while($merk = $query->fetch_array()): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?=$merk['nama_merk']?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="?halaman=merk&action=update&id=<?=$merk['id_merk']?>" class="btn btn-warning btn-xs">Edit</a>
                                    <a href="?halaman=merk&action=delete&id=<?=$merk['id_merk']?>" class="btn btn-danger btn-xs">Hapus</a>
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