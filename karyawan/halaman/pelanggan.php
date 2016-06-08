<div class="col-md-12">
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
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($query = $koneksi->query("SELECT * FROM pelanggan")): ?>
                    <?php $no = 1; ?>
                    <?php while($pelanggan = $query->fetch_assoc()): ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$pelanggan['nama']?></td>
                        <td><?=$pelanggan['email']?></td>
                        <td><?=$pelanggan['telpon']?></td>
                        <td><?=$pelanggan['alamat']?></td>
                    </tr>
                    <?php endwhile ?>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
