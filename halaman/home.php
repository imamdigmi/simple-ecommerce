<form action="" method="POST">
    <div class="row">
        <?php if($query = $koneksi->query("SELECT * FROM barang")): ?>
            <?php while($barang = $query->fetch_array()): ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="barang/<?=$barang['gambar']?>" style="height: 190px; width: 250px;">
                        <div class="caption text-center">
                            <h4><?=ucwords($barang['nama_barang'])?></h4>
                            <h5>
                                Rp. <?=$barang['harga']?> ,-
                                <div class="btn-group">
                                    <button class="btn btn-default btn-xs" disabled="on">Stok</button>
                                    <button class="btn btn-info btn-xs" disabled="on"><?=$barang['stok']?></button>
                                </div>
                            </h5>
                            <p>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary btn-sm" role="button">Order</a>
                                    <a href="?halaman=detail_barang&id=<?=$barang['id_barang']?>" class="btn btn-info btn-sm" role="button">Detail</a>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        <?php endif ?>
    </div>
</form>
