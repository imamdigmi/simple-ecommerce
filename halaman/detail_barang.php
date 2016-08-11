<div class="panel panel-info">
    <div class="panel-heading"><h3 class="text-center">Detail Barang</h3></div>
    <div class="panel-body">
    <?php if ($query = $koneksi->query("SELECT * FROM `barang` WHERE id_barang=$_GET[id]")): ?>
        <?php while($barang = $query->fetch_assoc()): ?>
            <div class="thumbnail">
                <img src="barang/<?=$barang['gambar']?>" style="width: 805px;">
                <div class="caption text-center">
                    <h2><?=ucwords($barang['nama_barang'])?></h2>
                    <h3>Rp. <?=$barang['harga']?> ,-</h3>
                    <h4>Stok : <?=$barang['stok']?></h4>
                    <p>
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary btn-sm" role="button">Order</a>
                        </div>
                    </p>
                </div>
            </div>
        <?php endwhile ?>
    <?php endif ?>
    </div>
</div>
