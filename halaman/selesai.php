<div class="panel panel-info">
    <div class="panel-heading"><h3 class="text-center">Order Berhasil</h3></div>
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Pelanggan</th>
                    <td>: <?=$_SESSION['nama']?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>: <?=$_SESSION['email']?></td>
                </tr>
                <tr>
                    <th>Total Bayar</th>
                    <td>: Rp.<?=number_format($_SESSION['order']['total_bayar'])?>,-</td>
                </tr>
                <tr>
                    <th>Kota - Tarif</th>
                    <td>: <?=$_SESSION['order']['kota']?> - Rp.<?=number_format($_SESSION['order']['tarif'])?>,-</td>
                </tr>
                <tr>
                    <th>Detail Alamat Pengiriman</th>
                    <td>: <?=$_SESSION['order']['alamat_pengiriman']?></td>
                </tr>
            </thead>
        </table>
        <hr>
        <h3>Detail</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; $no = 1;?>
                <?php if ($query = $koneksi->query("SELECT o.*, b.* FROM order_detail o LEFT JOIN barang b ON o.id_barang=b.id_barang WHERE id_order=".$_SESSION['order']['id_order'])): ?>
                    <?php while ($detail = $query->fetch_assoc()): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$detail['nama_barang']?></td>
                            <td><?=$detail['jumlah']?></td>
                            <td><?=number_format($detail['harga']*$detail['jumlah'])?></td>
                        </tr>
                        <?php $total += $detail['harga']; ?>
                    <?php endwhile ?>
                <?php endif ?>
                <tr>
                    <th colspan="3">TOTAL</th>
                    <td><strong>Rp.<?=number_format($_SESSION['order']['total'])?>,-</strong></td>
                </tr>
            </tbody>
        </table>
        <hr>
        <h3>Terimakasih</h3>
        <p>
            Transaksi pembelian anda telah berhasil<br>
            Silahkan anda membayar tagihan anda dengan cara transfer via Bank BRI di nomor Rekening : <br>
            <strong>(0986-01-025805-53-8 a/n TOKO UNI)</strong> untuk menyelesaikan pembayaran.
        </p>
        <p>
            Jika anda sudah melakukan transfer silahkan anda melakukan konfirmasi pembayaran dengan mengunjungi halaman profil akun anda lalu tekan tombol <i><b>Konfirmasi</b></i>.
        </p>
    </div>
    <div class="panel-footer">
        <a href="?halaman=profile" class="btn btn-primary btn-sm">Lihat Daftar Order</a>
    </div>
</div>
