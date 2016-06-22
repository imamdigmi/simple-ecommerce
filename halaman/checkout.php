<?php
if (!isset($_SESSION['is_pelanggan'])) {
    echo "
        <script>
            alert('Harus Login Dulu!');
            window.location='login.php?ref=detail_order';
        </script>
    ";
}

if (isset($_POST['_form']) AND $_POST['_form'] == 'true') {
    $query = $koneksi->query("SELECT * FROM ongkos_kirim WHERE id_ongkos_kirim=$_POST[id_ongkos_kirim]");
    $ongkir = $query->fetch_assoc();
    $total_bayar = $_POST['_total'] + $ongkir['tarif'];
    $sql = "INSERT INTO `order` VALUES(
            NULL,
            '$_SESSION[id_pelanggan]',
            '$_POST[id_ongkos_kirim]',
            '$total_bayar',
            'belum',
            '$_POST[alamat_pengiriman]',
            '$_POST[_tgl_order]',
            '$_POST[_tgl_tempo_order]',
            'belum',
            NULL)";
    if ($koneksi->query($sql)) {
        $query = $koneksi->query("SELECT MAX(id_order) as id_order FROM `order`");
        $order = $query->fetch_assoc();
        foreach ($_SESSION['barang'] as $key => $val) {
            if ($query = $koneksi->query("SELECT * FROM barang WHERE id_barang=$key")) {
                while ($barang = $query->fetch_assoc()) {
                    $sql = "INSERT INTO order_detail VALUES(NULL, $order[id_order], $barang[id_barang], $val, $barang[harga])";
                    $koneksi->query($sql);
                }
            }
        }
        unset($_SESSION['barang']);
        $_SESSION['order']['id_order'] = $order['id_order'];
        $_SESSION['order']['total_bayar'] = $total_bayar;
        $_SESSION['order']['total'] = $_POST['_total'];
        $_SESSION['order']['alamat_pengiriman'] = $_POST['alamat_pengiriman'];
        $_SESSION['order']['kota'] = $ongkir['kota'];
        $_SESSION['order']['tarif'] = $ongkir['tarif'];
        echo "
            <script>
                alert('Oder berhasil!');
                window.location='?halaman=selesai';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal transaksi order!');
                window.location='?halaman=checkout';
            </script>
        ";
    }
}
?>
<div class="panel panel-info">
    <div class="panel-heading"><h3 class="text-center">Order</h3></div>
    <div class="panel-body">
        <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
            <div class="form-group">
                <label for="id_ongkos_kirim">Kota</label>
                <select name="id_ongkos_kirim" class="form-control">
                    <option value="">---</option>
                    <?php if ($query = $koneksi->query("SELECT * FROM ongkos_kirim")): ?>
                        <?php while ($ongkir = $query->fetch_assoc()): ?>
                            <option value="<?=$ongkir['id_ongkos_kirim']?>"><?=$ongkir['kota']?></option>
                        <?php endwhile ?>
                    <?php endif ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Alamat Pengiriman</label>
                <textarea name="alamat_pengiriman" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Tanggal Jatuh Tempo</label>
                <input type="text" class="form-control" disabled="on" value="<?=date('d-m-Y', strtotime('+1 week'))?>">
            </div>
            <button type="submit" class="btn btn-info btn-block">Bayar!</button>
            <input type="hidden" name="_form" value="true">
            <input type="hidden" name="_total" value="<?=$_GET['total']?>">
            <input type="hidden" name="_tgl_order" value="<?=date('Y-m-d')?>">
            <input type="hidden" name="_tgl_tempo_order" value="<?=date('Y-m-d', strtotime('+1 week'))?>">
        </form>
    </div>
</div>