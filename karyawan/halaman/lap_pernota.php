<div class="col-md-3">
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
        <div class="panel-heading"><h3 class="text-center">LAPORAN ORDER PERNOTA</h3></div>
        <div class="panel-body">
        <?php if (isset($_POST['_form']) AND $_POST['_form'] == 'true'): ?>
            <table class="table table-condensed">
                <?php $qry = "SELECT p.*, o.* FROM `order` o LEFT JOIN pelanggan p ON o.id_pelanggan=p.id_pelanggan WHERE id_order=$_POST[id_order]"; ?>
                <?php if ($query = $koneksi->query($qry)): ?>
                    <?php if ($query->num_rows): ?>
                        <?php while ($order = $query->fetch_assoc()): ?>
                            <tbody>
                                <tr>
                                    <th>ID ORDER</th>
                                    <td><?=$order['id_order']?></td>
                                </tr>
                                <tr>
                                    <th>NAMA PELANGGAN</th>
                                    <td><?=$order['nama']?></td>
                                </tr>
                                <tr>
                                    <th>TANGGAL ORDER</th>
                                    <td><?=$order['tgl_order']?></td>
                                </tr>
                                <tr>
                                    <th>TANGGAL JATUH TEMPO</th>
                                    <td><?=$order['tgl_tempo_order']?></td>
                                </tr>
                                <tr>
                                    <th>ALAMAT PENGIRIMAN</th>
                                    <td><?=$order['alamat_pengiriman']?></td>
                                </tr>
                                <tr>
                                    <td><b>TOTAL</b></td>
                                    <td><b>Rp.<?=$order['total_bayar']?>,-</b></td>
                                </tr>
                            </tbody>
                        <?php endwhile ?>
                    <?php endif ?>
                <?php endif ?>
            </table>
        <?php else: ?>
        <h3>ID BELUM DIPILIH...</h3>
        <?php endif ?>
        </div>
    </div>
</div>