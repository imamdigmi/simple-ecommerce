<div class="panel panel-info">
    <div class="panel-heading"><h3 class="text-center">Keranjang Belanja</h3></div>
    <div class="panel-body">
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Sub Total</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($_SESSION['barang'])): ?>
                    <?php $no = 1; ?>
                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION['barang'] as $key => $val): ?>
                        <?php if ($query = $koneksi->query("SELECT * FROM barang WHERE id_barang=$key")): ?>
                            <?php while ($order = $query->fetch_assoc()): ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$order['nama_barang']?></td>
                                    <td><?=number_format($val)?></td>
                                    <td><?=number_format($order['harga'])?></td>
                                    <td><?=number_format($order['harga'] * $val)?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="?halaman=cart&action=plus&id_barang=<?=$key?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-plus"></i></a>
                                            <a href="?halaman=cart&action=min&id_barang=<?=$key?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-minus"></i></a>
                                            <a href="?halaman=cart&action=del&id_barang=<?=$key?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $total += $order['harga'] * $val ?>
                            <?php endwhile ?>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endif ?>
                <?php if ($total == 0): ?>
                    <tr>
                        <th colspan="6">
                            <center>
                                <h4>Keranjang kosong!</h4>
                                <a href="?halaman=home" class="btn btn-primary">&laquo; Kembali Berbelanja</a>
                            </center>
                        </th>
                    </tr>
                <?php else: ?>
                    <tr>
                        <th>TOTAL BAYAR</th>
                        <td colspan="5"><div class="pull-right"><strong>Rp.<?=number_format($total,2,",",".")?>,-</strong></div></td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <td class="btn-group">
            <a href="?halaman=home" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i> Lanjut Belanja</a>
            <a href="?halaman=checkout&total=<?=$total?>" class="btn btn-primary pull-right">Bayar <i class="glyphicon glyphicon-chevron-right"></i></a>
        </td>
    </div>
</div>
