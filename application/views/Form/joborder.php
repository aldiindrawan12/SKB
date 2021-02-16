
<div class="container">
    <a href="" class="btn btn-secondary btn-icon-split mb-5" data-toggle='modal' data-target='#popup-customer'>
        <span class="icon text-white-100">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Customer Baru</span>
    </a>
    <form action="<?=base_url("index.php/form/insert_JO")?>" method="POST" class="row">
        <div class="col-md-5">
            <label class="form-label" for="Customer">Customer</label>
            <select name="Customer" id="Customer" class="form-control selectpicker" data-live-search="true" required>
                <?php if(count($customer_by_name)==0){?>
                    <option class="font-w700" disabled="disabled" selected value="">Customer</option>
                <?php }else{?>
                    <option class="font-w700" selected value="<?=$customer_by_name["customer_id"]?>"><?=$customer_by_name["customer_name"]?></option>
                <?php }?>
                <?php foreach($customer as $value){?>
                    <option value="<?=$value["customer_id"]?>"><?=$value["customer_name"]?></option>
                <?php } ?>
            </select>
            <label for="Muatan" class="form-label">Muatan</label>
            <input autocomplete="off" type="text" class="form-control" id="Muatan" name="Muatan" required>
        </div>
        <div class="col-md-5">
            <label for="Keterangan" class="form-label">Keterangan/Catatan</label>
            <textarea class="form-control" name="Keterangan" id="Keterangan" rows="3"></textarea>
        </div>
        <div class="col-md-5">
            <label class="form-label" for="Asal">Asal</label>
            <select name="Asal" id="Asal" class="form-control selectpicker" data-live-search="true" required>
                <option class="font-w700" disabled="disabled" selected value="">Asal Pengiriman</option>
                <option value="Sumatera Selatan">Sumatera Selatan</option>
                <option value="Jakarta">Jakarta</option>
                <option value="Aceh">Aceh</option>
                <option value="Lampung">Lampung</option>
            </select>
        </div>
        <div class="col-md-5">
            <label class="form-label" for="Tujuan">Tujuan</label>
            <select name="Tujuan" id="Tujuan" class="form-control selectpicker" data-live-search="true" required>
                <option class="font-w700" disabled="disabled" selected value="">Tujuan Pengiriman</option>
                <option value="Sumatera Selatan">Sumatera Selatan</option>
                <option value="Jakarta">Jakarta</option>
                <option value="Aceh">Aceh</option>
                <option value="Lampung">Lampung</option>
            </select>
        </div>
        <div class="col-md-5">
            <label class="form-label" for="Kendaraan">Kendaraan</label>
            <select name="Kendaraan" id="Kendaraan" class="form-control selectpicker" data-live-search="true" required>
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
            <select name="Supir" id="Supir" class="form-control selectpicker" data-live-search="true" required>
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
            <input autocomplete="off" type="text" class="form-control" id="Uang" name="Uang" required onkeyup="terbilang()">
        </div>
        <div class="col-md-6">
            <label for="Terbilang" class="form-label">Terbilang</label>
            <input autocomplete="off" type="text" class="form-control" id="Terbilang" name="Terbilang" required readonly>
        </div>
        <div class="col-md-3 mt-5">
            <button type="submit" class="btn btn-primary mb-3">Simpan Dan Cetak JO</button>
            <button type="reset" class="btn btn-warning mb-3">Reset</button>
        </div>
    </form>
</div>

<div class="modal fade" id="popup-customer" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-dark">
                <h5 class="block-title">Customer Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="font-size-sm m-3 text-justify">
                <form action="<?= base_url("index.php/form/insert_customer")?>" method="POST">
                    <div class="form-group">
                        <label for="Customer" class="form-label">Customer</label>
                        <input autocomplete="off" type="text" class="form-control" id="Customer" name="Customer" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function terbilang(){
        var uang = $('#Uang').val();
        $( '#Uang' ).mask('000.000.000', {reverse: true});
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('index.php/form/generate_terbilang_fix/') ?>"+uang,
            dataType: "text",
            success: function(data) {
                $('#Terbilang').val(data);
            }
        });
    }
</script>