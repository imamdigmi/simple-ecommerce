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
        <h3>Terimakasih</h3>
        <p>
            Transaksi pembelian anda telah berhasil<br>
            Silahkan anda membayar tagihan anda dengan cara transfer via Bank BRI di nomor Rekening : <br>
            <strong>(0986-01-025805-53-8 a/n TOKO UNI)</strong> untuk menyelesaikan pembayaran.
        </p>
        <p>
            Jika anda sudah melakukan transfer silahkan anda melakukan konfirmasi pembayaran dengan menekan tombol <i><b>Konfirmasi</b></i> dibawah ini.
        </p>
    </div>
    <div class="panel-footer">
        <a href="?halaman=konfirmasi&id_order=<?=$_SESSION['order']['id_order']?>" class="btn btn-primary btn-sm">Konfirmasi</a>
    </div>
</div>
