<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">DAFTAR ORDER TERKIRIM</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jumlah Barang</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($query = $koneksi->query("SELECT * FROM `order` o LEFT JOIN order_detail d ON o.id_order=d.id_order WHERE o.status_kirim='sudah'")): ?>
                        <?php $no = 1; ?>
                        <?php while($tamu = $query->fetch_array()): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$tamu['jumlah']?></td>
                                <td><?=$tamu['total_bayar']?></td>
                                <td><?=$tamu['tgl_order']?></td>
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
        <div class="panel-heading"><h3 class="text-center">DAFTAR ORDER BELUM TERKIRIM</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jumlah Barang</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($query = $koneksi->query("SELECT * FROM `order` o LEFT JOIN order_detail d ON o.id_order=d.id_order WHERE o.status_kirim='belum'")): ?>
                        <?php $no = 1; ?>
                        <?php while($tamu = $query->fetch_array()): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$tamu['nama']?></td>
                                <td><?=$tamu['email']?></td>
                                <td><?=$tamu['pesan']?></td>
                            </tr>
                        <?php endwhile ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>