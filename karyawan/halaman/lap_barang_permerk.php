<?php 
if (isset($_POST['_merk']) AND $_POST['_merk'] == 'true') {
    if ($query = $koneksi->query("SELECT b.*, m.nama_merk FROM barang b LEFT JOIN merk m ON m.id_merk=b.id_merk WHERE b.id_merk=$_POST[id_merk]")) {
        if ($query->num_rows) {
            $barang = $query->fetch_assoc();
        }   
    }
}
?>
<div class="col-md-3 hidden-print">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">PILIH MERK</h3></div>
        <div class="panel-body">
            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                <div class="form-group">
                    <label for="id_merk">NAMA MERK</label>
                    <select name="id_merk" class="form-control">
                        <option value="">----</option>
                        <?php if ($query = $koneksi->query("SELECT * FROM merk")): ?>
                            <?php while ($merk = $query->fetch_assoc()): ?>
                                <option value="<?=$merk['id_merk']?>"><?=$merk['nama_merk']?></option>
                            <?php endwhile ?>
                        <?php endif ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-info btn-block">Lihat</button>
                <input type="hidden" name="_merk" value="true">
            </form>
        </div>
    </div>
</div>
<div class="col-md-9">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">LAPORAN BARANG PERMERK : <?=(isset($barang)) ? $barang['nama_merk'] :'...'?></h3></div>
        <div class="panel-body">
        <?php if (isset($barang)): ?>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>ID BARANG</th>
                        <th>NAMA BARANG</th>
                        <th>HARGA</th>
                        <th>WARNA</th>
                        <th>JENIS LENGAN</th>
                        <th>STOK</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$barang['id_barang']?></td>
                        <td><?=$barang['nama_barang']?></td>
                        <td><?=$barang['harga']?></td>
                        <td><?=$barang['warna']?></td>
                        <td><?=$barang['jenis_lengan']?></td>
                        <td><?=$barang['stok']?></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <h3>MERK BELUM DIPILIH...</h3>
        <?php endif ?>
        </div>
        <div class="panel-footer hidden-print ">
            <a onClick="window.print();return false" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i></a>
        </div>
    </div>
</div>