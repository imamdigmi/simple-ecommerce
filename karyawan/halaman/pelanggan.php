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
                    <?php for($i=1; $i<6; $i++): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo "XXXXXXXX"; ?></td>
                        <td><?php echo "XXXXXXXXXXX"; ?></td>
                        <td><?php echo "XXXXXXXXX"; ?></td>
                        <td><?php echo "XXXXXXXXXXXXXXX"; ?></td>
                    </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
