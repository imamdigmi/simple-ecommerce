<?php 
if (isset($_POST['_form']) AND $_POST['_form'] == 'true') {
    $qry = "SELECT p.*, o.*, k.* FROM `order` o LEFT JOIN pelanggan p ON o.id_pelanggan=p.id_pelanggan LEFT JOIN ongkos_kirim k ON o.id_ongkos_kirim=k.id_ongkos_kirim WHERE id_order=$_POST[id_order]";
    if ($query = $koneksi->query($qry)) {
        if ($query->num_rows) {
            $data = $query->fetch_assoc();
            $query1 = $koneksi->query("SELECT o.*, b.* FROM order_detail o LEFT JOIN barang b ON o.id_barang=b.id_barang WHERE id_order=$_POST[id_order]");
            $no=1;
        }   
    }
}
?>
<div class="col-md-3 hidden-print">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">PILIH ORDER</h3></div>
        <div class="panel-body">
            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                <div class="form-group">
                    <label for="id_merk">ID ORDER</label>
                    <select name="id_order" class="form-control">
                        <?php $sql = "SELECT p.*, o.* FROM `order` o LEFT JOIN pelanggan p ON o.id_pelanggan=p.id_pelanggan"; ?>
                        <?php if ($query = $koneksi->query($sql)): ?>
                            <?php while ($order = $query->fetch_assoc()): ?>
                                <option value="<?=$order['id_order']?>"><?=$order['id_order']?> - <?=$order['nama']?></option>
                            <?php endwhile ?>
                        <?php endif ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-info btn-block">Lihat</button>
                <input type="hidden" name="_form" value="true">
            </form>
        </div>
    </div>
</div>
<div class="col-md-9">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">LAPORAN ORDER PERNOTA : <?=(isset($data)) ? $data['id_order'] .' a/n '.$data['nama']: '...'?></h3></div>
        <div class="panel-body">
        <?php if (isset($data)): ?>
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td><?=$data['id_order']?></td>
                    </tr>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <td><?=$data['nama']?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Order</th>
                        <td><?=$data['tgl_order']?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Jatuh Tempo</th>
                        <td><?=$data['tgl_tempo_order']?></td>
                    </tr>
                    <tr>
                        <th>Alamat Pengiriman</th>
                        <td><?=$data['alamat_pengiriman']?></td>
                    </tr>
                    <tr>
                        <th>Biaya Ongkos Kirim</th>
                        <td>Rp.<?=number_format($data['tarif'])?>,-</td>
                    </tr>
                    <tr>
                        <td><b>TOTAL</b></td>
                        <td><b>Rp.<?=number_format($data['total_bayar'])?>,-</b></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h4>Detail Order</h4>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php while ($detail = $query1->fetch_assoc()): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$detail['nama_barang']?></td>
                            <td><?=$detail['jumlah']?></td>
                            <td><?=number_format($detail['harga'])?></td>
                        </tr>
                        <?php $total += $detail['harga']; ?>
                    <?php endwhile ?>
                    <tr>
                        <th colspan="3">TOTAL</th>
                        <td><strong>Rp.<?=number_format($total)?>,-</strong></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <h3>ID BELUM DIPILIH...</h3>
        <?php endif ?>
        </div>
        <div class="panel-footer hidden-print ">
            <a onClick="window.print();return false" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i></a>
        </div>
    </div>
</div>