<?php 
if (isset($_POST['_form']) AND $_POST['_form'] == 'true') {
    $sql = "UPDATE `karyawan` SET nama='$_POST[nama]', email='$_POST[email]'";
    if ($_POST['password'] !== '') {
        $password = md5($_POST['password']);
        $sql .= ", password='$password'";
    }
    $sql .= " WHERE id_karyawan=$_POST[_id]";
    if ($koneksi->query($sql)) {
        echo "
            <script>
                alert('Berhasil diupdate!');
                window.location='?halaman=karyawan';
            </script>
        ";
    }
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
    $koneksi->query("DELETE FROM `karyawan` WHERE id_karyawan=$_GET[id]");
    echo "
        <script>
            alert('Berhasil dihapus!');
            window.location='?halaman=karyawan';
        </script>
    ";
}
?>
<div class="col-md-4">
    <div class="panel panel-warning">
        <div class="panel-heading"><h3 class="text-center">UPDATE KARYAWAN</h3></div>
        <div class="panel-body">
            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                <?php if ($query = $koneksi->query("SELECT * FROM `karyawan` WHERE id_karyawan=$_GET[id]")): ?>
                    <?php while ($karyawan = $query->fetch_array()): ?>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="<?=$karyawan['nama']?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="<?=$karyawan['email']?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block" style="color: #D9534F;">*) Kosongkan jika tidak diganti</span>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block">Update</button>
                        <input type="hidden" name="_id" value="<?=$karyawan['id_karyawan']?>">
                    <?php endwhile ?>
                <?php endif ?>
                <input type="hidden" name="_form" value="true">
            </form>
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">DAFTAR KARYAWAN</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php if ($query = $koneksi->query("SELECT * FROM karyawan")): ?>
                        <?php while($karyawan = $query->fetch_assoc()): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$karyawan['nama']?></td>
                            <td><?=$karyawan['email']?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="?halaman=karyawan&action=update&id=<?=$karyawan['id_karyawan']?>" class="btn btn-warning btn-xs">Edit</a>
                                    <a href="?halaman=karyawan&action=delete&id=<?=$karyawan['id_karyawan']?>" class="btn btn-danger btn-xs">Hapus</a>
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