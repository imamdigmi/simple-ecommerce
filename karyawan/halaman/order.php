<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">DAFTAR ORDER</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>Tanggal Order</th>
                        <th>Jatuh Tempo</th>
                        <th>Total Bayar</th>
                        <th>Alamat Pengiriman</th>
                        <th>Status Konfirmasi</th>
                        <th>Status Kirim</th>
                    </tr>
                </thead>
                <tbody>
                <?php $sql = "SELECT p.*, o.* FROM `order` o LEFT JOIN pelanggan p ON o.id_pelanggan=p.id_pelanggan" ?>
                <?php if ($query = $koneksi->query($sql)): ?>
                    <?php $no = 1; ?>
                    <?php while($order = $query->fetch_assoc()): ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$order['nama']?></td>
                        <td><?=$order['tgl_order']?></td>
                        <td><?=$order['tgl_jatuh_tempo']?></td>
                        <td>Rp.<?=$order['total_bayar']?>,-</td>
                        <td><?=$order['alamat_pengiriman']?></td>
                        <td><span class="label label-<?=($order['status_konfirmasi'] == 'sudah') ? 'success' : 'warning'?>"><?=($order['status_konfirmasi'] == 'sudah') ? 'Sudah' : 'Belum'?></span></td>
                        <td><span class="label label-<?=($order['status_kirim'] == 'sudah') ? 'success' : 'warning'?>"><?=($order['status_kirim'] == 'sudah') ? 'Sudah' : 'Belum'?></span></td>
                    </tr>
                    <?php endwhile ?>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
