<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">DAFTAR ORDER</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Total Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sql = "SELECT `order`.*, `pelanggan`.nama AS pelanggan_nama FROM `order` LEFT JOIN `pelanggan` ON `order`.`id_order`=`pelanggan`.`id_pelanggan`"; ?>
                    <?php if($query = $koneksi->query($sql)): ?>
                        <?php $no = 1; ?>
                        <?php while($data = $query->fetch_array()): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data['pelanggan_nama']?></td>
                            <td><?=$data['status_konfirmasi']?></td>
                            <td>Rp. <?=$data['harga']?>,-</td>
                        </tr>
                        <?php endwhile ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">DAFTAR KONFIRMASI PEMBELIAN</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>Email</th>
                        <th>Total Bayar</th>
                        <th>Tanggal Order</th>
                        <th>Bukti Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sql = "SELECT p.*, o.* FROM `order` o LEFT JOIN pelanggan p ON o.id_pelanggan=p.id_pelanggan" ?>
                    <?php if ($query = $koneksi->query($sql)): ?>
                        <?php $no = 1; ?>
                        <?php while($konfirmasi = $query->fetch_assoc()): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$konfirmasi['nama']?></td>
                            <td><?=$konfirmasi['email']?></td>
                            <td>Rp.<?=$konfirmasi['total_bayar']?>,-</td>
                            <td><?=$konfirmasi['tanggal_order']?></td>
                            <td><a href="?halaman=buti_pembayaran&id=<?=$konfirmasi['id_konfirmasi']?>" class="btn btn-info">Lihat</a></td>
                        </tr>
                        <?php endwhile ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">DAFTAR BARANG TERLARIS</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Pembeli</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sql = "SELECT * FROM `barang` LEFT JOIN `order` ON `barang`.`id_barang`=`order`.`id_order`"; ?>
                    <?php if($query = $koneksi->query($sql)): ?>
                        <?php $no = 1; ?>
                        <?php while($data = $query->fetch_array()): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data['pelanggan_nama']?></td>
                            <td><?=$data['status_konfirmasi']?></td>
                            <td>Rp. <?=$data['harga']?>,-</td>
                        </tr>
                        <?php endwhile ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>