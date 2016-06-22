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
                    <?php $sql = "SELECT m.nama_merk, b.nama_barang, o.jumlah
                                  FROM barang b 
                                    JOIN merk m ON m.id_merk=b.id_merk 
                                    JOIN order_detail o ON o.id_barang=b.id_barang
                                  GROUP BY b.id_barang
                                  ORDER BY o.jumlah DESC"; ?>
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
        <div class="panel-footer hidden-print ">
            <a onClick="window.print();return false" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i></a>
        </div>
    </div>
</div>