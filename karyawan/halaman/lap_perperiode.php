<div class="col-md-3">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">PERIODE</h3></div>
        <div class="panel-body">
            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                <div class="form-group">
                    <label for="tgl_merk">AWAL</label>
                    <input type="text" name="awal" class="form-control" placeholder="tulis bulan - tanggal (ex: 00-00)">
                </div>
                <div class="form-group">
                    <label for="tgl_merk">AKHIR</label>
                    <input type="text" name="akhir" class="form-control" placeholder="tulis bulan - tanggal (ex: 00-00)">
                </div>
                <button type="submit" class="btn btn-info btn-block">Lihat</button>
                <input type="hidden" name="_form" value="true">
            </form>
        </div>
    </div>
</div>
<div class="col-md-9">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">LAPORAN ORDER PERPERIODE</h3></div>
        <div class="panel-body">
        <?php if (isset($_POST['_form']) AND $_POST['_form'] == 'true'): ?>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>ID ORDER</th>
                        <th>NAMA PELANGGAN</th>
                        <th>TANGGAL ORDER</th>
                        <th>TANGGAL JATUH TEMPO</th>
                        <th>ALAMAT PENGIRIMAN</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                <?php $qry = "SELECT * FROM `order` o LEFT JOIN pelanggan p ON o.id_pelanggan=p.id_pelanggan WHERE o.tgl_order BETWEEN '2016-$_POST[awal]' AND '2016-$_POST[akhir]'"; ?>
                <?php if ($query = $koneksi->query($qry)): ?>
                    <?php if ($query->num_rows): ?>
                        <?php while ($order = $query->fetch_assoc()): ?>
                            <tr>
                                <td><?=$order['id_order']?></td>
                                <td><?=$order['nama']?></td>
                                <td><?=$order['tgl_order']?></td>
                                <td><?=$order['tgl_tempo_order']?></td>
                                <td><?=$order['alamat_pengiriman']?></td>
                                <td><b>Rp.<?=$order['total_bayar']?>,-</b></td>
                            </tr>
                        <?php endwhile ?>
                    <?php endif ?>
                <?php endif ?>
                </tbody>
            </table>
        <?php else: ?>
        <h3>PERIODE BELUM DIPILIH...</h3>
        <?php endif ?>
        </div>
    </div>
</div>