<div class="panel panel-info">
    <div class="panel-heading"><h3 class="text-center">Profile</h3></div>
    <div class="panel-body">
        <?php if (isset($_SESSION['is_pelanggan'])): ?>
            <?php if ($query = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan=$_SESSION[id_pelanggan]")): ?>
                <?php while ($data = $query->fetch_assoc()): ?>
                    <form>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input disabled="on" type="text" name="nama" class="form-control" value="<?=$data['nama']?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input disabled="on" type="email" name="email" class="form-control" value="<?=$data['email']?>">
                        </div>
                        <div class="form-group">
                            <label for="nama">Telpon / HP</label>
                            <input disabled="on" type="text" name="telpon" class="form-control" value="<?=$data['telpon']?>">
                        </div>
                        <div class="form-group">
                            <label for="nama">Alamat</label>
                            <input disabled="on" type="text" name="alamat" class="form-control" value="<?=$data['alamat']?>">
                        </div>
                    </form>
                <?php endwhile ?>
            <?php endif ?>
            <?php if ($query = $koneksi->query("SELECT * FROM `order` WHERE id_pelanggan=$_SESSION[id_pelanggan]")): ?>
                <?php $no = 1; ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Total Bayar</th>
                            <th>Status Konfirmasi</th>
                            <th>Tanggal Order</th>
                            <th>Tanggal Tempo Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = $query->fetch_assoc()): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td>Rp.<?=number_format($data['total_bayar'])?>,-</td>
                                <td><?=$data['status_konfirmasi']?></td>
                                <td><?=$data['tgl_order']?></td>
                                <td><?=$data['tgl_tempo_order']?></td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            <?php endif ?>
        <?php endif ?>
    </div>
</div>