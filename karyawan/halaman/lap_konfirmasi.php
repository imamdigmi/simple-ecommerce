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
                    </tr>
                </thead>
                <tbody>
                    <?php $sql = "SELECT * FROM konfirmasi k LEFT JOIN `order` o ON k.id_order=o.id_order LEFT JOIN pelanggan p ON p.id_pelanggan=o.id_pelanggan" ?>
                    <?php if ($query = $koneksi->query($sql)): ?>
                        <?php $no = 1; ?>
                        <?php while($konfirmasi = $query->fetch_assoc()): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$konfirmasi['nama']?></td>
                            <td><?=$konfirmasi['email']?></td>
                            <td>Rp.<?=$konfirmasi['total_bayar']?>,-</td>
                            <td><?=$konfirmasi['tgl_order']?></td>
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