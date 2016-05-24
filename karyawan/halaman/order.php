<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">DAFTAR ORDER</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>Barang</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0; $i<6; $i++): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo "XXXXXXXX"; ?></td>
                        <td><?php echo "XXXXXXXXXXX"; ?></td>
                        <td><?php echo "Rp.XXX,XXX.XX,-"; ?></td>
                        <td><span class="label label-warning">Belum Konfirmasi</span></td>
                    </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
