<div class="panel panel-info">
    <div class="panel-heading"><h3 class="text-center">Order</h3></div>
    <div class="panel-body">
        <form action="POST">
            <div class="form-group">
                <label for="kota">Kota</label>
                <select name="kota" class="form-control">
                    <option value="">XXX</option>
                    <option value="">XXXX</option>
                    <option value="">XXXXXX</option>
                    <option value="">XXXX</option>
                    <option value="">XXX</option>
                </select>
            </div>
            <div class="form-group">
                <label for="total_bayar">Total Bayar</label>
                <input type="text" name="total_bayar" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama">Alamat Pengiriman</label>
                <textarea name="alamat" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="tgl_tempo">Tanggal Jatuh Tempo</label>
                <input type="text" name="tgl_tempo" class="form-control" disabled="on" value="XX-XX-XXXX">
            </div>
            <button type="submit" class="btn btn-info btn-block">Simpan</button>
        </form>
    </div>
</div>