<div class="col-md-9">
    <form action="" method="POST">
        <?php for($i=1; $i<4; $i++): ?>
        <div class="row">
            <?php for($k=1; $k<5; $k++): ?>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="img/produk.jpg">
                    <div class="caption text-center">
                        <h4>Nama Produk</h4>
                        <p><a href="#" class="btn btn-primary" role="button">Order</a></p>
                    </div>
                </div>
            </div>
            <?php endfor ?>
        </div>
        <?php endfor ?>
    </form>
</div>    
<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Daftar Order</h3>
        </div>
        <div class="panel-body">
            Belum ada order...
        </div>
    </div>
</div>    
