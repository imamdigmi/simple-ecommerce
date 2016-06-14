<?php
if (isset($_GET['action']) AND $_GET['action'] == 'kirim') {
    if ($koneksi->query("UPDATE `order` SET status_kirim='sudah' WHERE id_order=$_GET[id]")) {
        echo "
            <script>
                alert('Kirim barang Berhasil!');
                window.location='?halaman=home';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Kirim barang Gagal!');
                window.location='?halaman=home';
            </script>
        ";
    }
}
?>
<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">DAFTAR ORDER</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status Konfirmasi</th>
                        <th>Status Pengiriman</th>
                        <th>Alamat Pengiriman</th>
                        <th>Total Bayar</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sql = "SELECT o.*, p.* FROM `order` o LEFT JOIN pelanggan p ON o.id_pelanggan=p.id_pelanggan"; ?>
                    <?php if($query = $koneksi->query($sql)): ?>
                        <?php $no = 1; ?>
                        <?php while($data = $query->fetch_array()): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data['nama']?></td>
                            <td><?=$data['status_konfirmasi']?></td>
                            <td><?=$data['status_kirim']?></td>
                            <td><?=$data['alamat_pengiriman']?></td>
                            <td>Rp. <?=$data['total_bayar']?>,-</td>
                            <td>
                                <div class="btn-group">
                                    <a href="?halaman=bukti_pembayaran&id=<?=$data['id_order']?>" class="btn btn-info btn-xs">Lihat Bukti</a>
                                    <a href="?action=kirim&id=<?=$data['id_order']?>" class="btn btn-info btn-xs">Kirim Barang</a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
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
    </div>
</div>
<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">DAFTAR BARANG TERLARIS</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Merk</th>
                        <th>Nama Barang</th>
                        <th>Total Pembeli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sql = "SELECT m.*, b.*, o.* FROM barang b JOIN merk m ON m.id_merk=b.id_merk JOIN order_detail o ON o.id_barang=b.id_barang"; ?>
                    <?php if($query = $koneksi->query($sql)): ?>
                        <?php $no = 1; ?>
                        <?php while($data = $query->fetch_array()): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data['nama_merk']?></td>
                            <td><?=$data['nama_barang']?></td>
                            <td><?=$data['jumlah']?></td>
                        </tr>
                        <?php endwhile ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>