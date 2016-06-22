<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">DAFTAR ORDER TERKIRIM</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengorder</th>
                        <th>Total Bayar</th>
                        <th>Tanggal Order</th>
                        <th>Alamat Pengiriman</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($query = $koneksi->query("SELECT * FROM `order` o LEFT JOIN order_detail d ON o.id_order=d.id_order LEFT JOIN pelanggan p ON o.id_pelanggan=p.id_pelanggan WHERE o.status_kirim='sudah' GROUP BY o.id_order")): ?>
                        <?php $no = 1; ?>
                        <?php while($tamu = $query->fetch_array()): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$tamu['nama']?></td>
                                <td>Rp.<?=number_format($tamu['total_bayar'])?>,-</td>
                                <td><?=$tamu['tgl_order']?></td>
                                <td><?=$tamu['alamat_pengiriman']?></td>
                            </tr>
                        <?php endwhile ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer hidden-print ">
            <a onClick="window.print();return false" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i></a>
        </div>
    </div>
</div>