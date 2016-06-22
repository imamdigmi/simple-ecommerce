<?php 
if (isset($_POST['_form']) AND $_POST['_form'] == 'true') {
    $qry = "SELECT * FROM `order` o LEFT JOIN pelanggan p ON o.id_pelanggan=p.id_pelanggan WHERE o.tgl_order BETWEEN '2016-$_POST[awal]' AND '2016-$_POST[akhir]'";
    if ($query = $koneksi->query($qry)) {
        if ($query->num_rows){
            $total = 0;
        }
    }
}
?>
<div class="col-md-3 hidden-print">
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
        <div class="panel-heading"><h3 class="text-center">LAPORAN ORDER PERPERIODE : <?=(isset($total)) ? '2016-'.$_POST['awal'].' s/d 2016-'.$_POST['akhir'] : '...'?></h3></div>
        <div class="panel-body">
        <?php if (isset($total)): ?>
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
                    <?php while ($data = $query->fetch_assoc()): ?>
                        <tr>
                            <td><?=$data['id_order']?></td>
                            <td><?=$data['nama']?></td>
                            <td><?=$data['tgl_order']?></td>
                            <td><?=$data['tgl_tempo_order']?></td>
                            <td><?=$data['alamat_pengiriman']?></td>
                            <td>Rp.<?=number_format($data['total_bayar'])?>,-</td>
                        </tr>
                        <?php $total += $data['total_bayar'] ?>
                    <?php endwhile ?>
                    <tr>
                        <th colspan="5">TOTAL PENJUALAN</th>
                        <td><b>Rp.<?=number_format($total)?>,-</b></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <h3>PERIODE BELUM DIPILIH...</h3>
        <?php endif ?>
        </div>
        <div class="panel-footer hidden-print ">
            <a onClick="window.print();return false" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i></a>
        </div>
    </div>
</div>