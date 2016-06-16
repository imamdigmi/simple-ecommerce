<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Daftar Order</h3>
        </div>
        <div class="panel-body">
            <?php if (isset($_SESSION['barang'])): ?>
                <table class="table table-condensed">
                <?php foreach ($_SESSION['barang'] as $key => $val): ?>
                    <?php if ($query = $koneksi->query("SELECT * FROM barang WHERE id_barang=$key")): ?>
                        <?php while ($order = $query->fetch_assoc()): ?>
                            <tr>
                                <td><?=$order['nama_barang']?></td>
                                <td><?=number_format($val)?></td>
                                <td><?=number_format($order['harga'])?></td>
                            </tr>
                        <?php endwhile ?>
                    <?php endif ?>
                <?php endforeach ?>
                <tr>
                    <td colspan="3"><a href="?halaman=cart" class="btn btn-primary btn-xs pull-right">Detail <i class="glyphicon glyphicon-chevron-right"></i></a></td>
                </tr>
                </table>
            <?php else: ?>
                <h4>Belum ada order...</h4>
            <?php endif ?>
        </div>
    </div>
</div>