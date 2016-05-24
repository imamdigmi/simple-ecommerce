<div class="col-md-6">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"><h3 class="text-center">DAFTAR ORDER TERBARU</h3></div>
                <div class="panel-body">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Total Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i=1; $i<9; $i++): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo "XXXXXXXX"; ?></td>
                                <td><?php echo "XXXXXXXXXXX"; ?></td>
                                <td><?php echo "XX"; ?></td>
                                <td><?php echo "Rp. XXX.XXX.XX,-"; ?></td>
                            </tr>
                            <?php endfor ?>
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
                                <th>Nama Barang</th>
                                <th>Jumlah Pembeli</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i=1; $i<5; $i++): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo "XXXXXXXXXX"; ?></td>
                                <td><?php echo "XX"; ?></td>
                                <td><?php echo "XX-XX-XXXX"; ?></td>
                            </tr>
                            <?php endfor ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">DAFTAR PELANGGAN</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telp / Hp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=1; $i<6; $i++): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo "XXXXXXXX"; ?></td>
                        <td><?php echo "XXXXXXXXXXX"; ?></td>
                        <td><?php echo "XXXXXXXXX"; ?></td>
                    </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </div>
    </div>
</div>