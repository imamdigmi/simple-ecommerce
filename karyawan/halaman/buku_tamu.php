<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">DAFTAR BUKU TAMU</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($query = $koneksi->query("SELECT * FROM `buku_tamu`")): ?>
                        <?php $no = 1; ?>
                        <?php while($tamu = $query->fetch_array()): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?=$tamu['nama']?></td>
                                <td><?=$tamu['email']?></td>
                                <td><?=$tamu['pesan']?></td>
                            </tr>
                        <?php endwhile ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>