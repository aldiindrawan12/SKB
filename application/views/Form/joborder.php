<div class="container">
    <form action="<?=base_url("index.php/form/insert_JO")?>" method="POST" class="row">
        <div class="col-md-5">
            <label class="form-label" for="Customer">Customer</label>
            <select name="Customer" id="Customer" class="form-control custom-select" required>
                <option class="font-w700" disabled="disabled" selected value="">Customer</option>
                <?php foreach($customer as $value){?>
                    <option value="<?=$value["customer_id"]?>"><?=$value["customer_name"]?></option>
                <?php } ?>
            </select>
            <label for="Muatan" class="form-label">Muatan</label>
            <input autocomplete="off" type="text" class="form-control" id="Muatan" name="Muatan" required>
        </div>
        <div class="col-md-5">
            <label for="Keterangan" class="form-label">Keterangan/Catatan</label>
            <textarea class="form-control" id="Keterangan" rows="3"></textarea>
        </div>
        <div class="col-md-5">
            <label class="form-label" for="Asal">Asal</label>
            <select name="Asal" id="Asal" class="form-control custom-select" required>
                <option class="font-w700" disabled="disabled" selected value="">Asal Pengiriman</option>
                <option value="Sumatera Selatan">Sumatera Selatan</option>
                <option value="Jakarta">Jakarta</option>
                <option value="Aceh">Aceh</option>
                <option value="Aceh">Lampung</option>
            </select>
        </div>
        <div class="col-md-5">
            <label class="form-label" for="Tujuan">Tujuan</label>
            <select name="Tujuan" id="Tujuan" class="form-control custom-select" required>
                <option class="font-w700" disabled="disabled" selected value="">Tujuan Pengiriman</option>
                <option value="Sumatera Selatan">Sumatera Selatan</option>
                <option value="Jakarta">Jakarta</option>
                <option value="Aceh">Aceh</option>
                <option value="Aceh">Lampung</option>
            </select>
        </div>
        <div class="col-md-5">
            <label class="form-label" for="Kendaraan">Kendaraan</label>
            <select name="Kendaraan" id="Kendaraan" class="form-control custom-select" required>
                <option class="font-w700" disabled="disabled" selected value="">Kendaraan Pengiriman</option>
                <?php foreach($mobil as $value){
                    if($value["status_jalan"]!="Jalan"){?>
                    <option value="<?=$value["mobil_no"]?>"><?=$value["mobil_no"]."  ||  ".$value["mobil_max_load"]." Ton  ||  ".$value["mobil_jenis"]?></option>
                <?php }
                } ?>
            </select>
        </div>
        <div class="col-md-5">
            <label class="form-label" for="Supir">Supir</label>
            <select name="Supir" id="Supir" class="form-control custom-select" required>
                <option class="font-w700" disabled="disabled" selected value="">Supir Pengiriman</option>
                <?php foreach($supir as $value){
                    if($value["status_jalan"]!="Jalan"){?>
                    <option value="<?=$value["supir_id"]?>"><?=$value["supir_name"]?></option>
                <?php }
                } ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="Uang" class="form-label">Uang Jalan</label>
            <input autocomplete="off" type="number" class="form-control" id="Uang" name="Uang" required>
        </div>
        <div class="col-md-6">
            <label for="Terbilang" class="form-label">Terbilang</label>
            <input autocomplete="off" type="text" class="form-control" id="Terbilang" name="Terbilang" required>
        </div>
        <div class="col-md-3 mt-5">
            <button type="submit" class="btn btn-primary mb-3">Simpan</button>
            <button type="reset" class="btn btn-warning mb-3">Reset</button>
        </div>
    </form>
</div>